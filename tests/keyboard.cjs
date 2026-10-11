const {chromium}=require('playwright');
const assert=require('assert').strict;
const path=require('path');
const {base,root,local,prepare,audit,save}=require('./browser.cjs');
(async()=>{
 const browser=await chromium.launch({executablePath:process.env.CHROME_PATH||'C:/Program Files/Google/Chrome/Application/chrome.exe',headless:true});
 const page=await browser.newPage({viewport:{width:1280,height:720}});await prepare(page);
 page.setDefaultNavigationTimeout(60000);
 const checks=[];
 const check=(name)=>{checks.push({name,passed:true});console.log('PASS',name);};
 const openAudit=async name=>{const result=await audit(page);checks.push({name,...result});assert.equal(result.violations.length,0,JSON.stringify(result.violations));console.log('PASS',name);};
 try {
  await page.goto(base+'/',{waitUntil:'domcontentloaded'});await page.waitForTimeout(1500);
  await page.keyboard.press('Tab');assert.equal(await page.evaluate(()=>document.activeElement.className),'skip-link');
  await page.keyboard.press('Enter');assert.equal(await page.evaluate(()=>document.activeElement.id),'main-content');check('Skip link focuses main content');
  const menu=page.locator('#menuButton');await menu.focus();await page.keyboard.press('Enter');assert.equal(await menu.getAttribute('aria-expanded'),'true');
  await page.keyboard.press('Tab');assert.equal(await page.evaluate(()=>document.activeElement.textContent),'Projects');
  await page.keyboard.press('Escape');assert.equal(await menu.getAttribute('aria-expanded'),'false');assert.equal(await page.evaluate(()=>document.activeElement.id),'menuButton');
  await page.keyboard.press('Space');await page.keyboard.press('Tab');await page.keyboard.press('Enter');
  assert.equal(await page.evaluate(()=>document.activeElement.id),'project');assert.equal(await menu.getAttribute('aria-expanded'),'false');check('Menu opens with Enter/Space, closes with Escape and focuses section links');
  const link=page.locator('.swiper').first().locator('.swiper-slide:not([inert]) a').first();
  await link.focus();await page.keyboard.press('Enter');const dialog=page.locator('dialog[open]');assert.equal(await dialog.count(),1);
  assert.equal(await page.evaluate(()=>document.activeElement.textContent),'Close gallery');
  const original=await dialog.locator('[data-caption]').textContent();await page.keyboard.press('ArrowRight');assert.notEqual(await dialog.locator('[data-caption]').textContent(),original);
  await page.keyboard.press('ArrowLeft');assert.equal(await dialog.locator('[data-caption]').textContent(),original);
  await page.keyboard.press('Shift+Tab');assert.equal(await page.evaluate(()=>document.activeElement.textContent),'Next photo');
  await page.keyboard.press('Tab');assert.equal(await page.evaluate(()=>document.activeElement.textContent),'Close gallery');
  await openAudit('Open gallery dialog accessibility');await page.keyboard.press('Escape');assert.equal(await page.locator('dialog[open]').count(),0);assert(await link.evaluate(el=>el===document.activeElement));check('Gallery keyboard controls, focus containment and focus restoration');
  const next=page.locator('.swiper').first().locator('.swiper-button-next');const before=await page.locator('.swiper').first().evaluate(el=>el.swiper.activeIndex);
  await next.focus();await page.keyboard.press('Enter');await page.waitForTimeout(400);
  assert.equal(await page.locator('.swiper').first().evaluate(el=>el.swiper.activeIndex),before+1);
  assert.equal(await page.locator('.swiper').first().locator('.swiper-slide:not([inert])').count(),1);check('Carousel controls work from the keyboard and hide off-screen slides from focus');
  await page.setViewportSize({width:375,height:812});await menu.focus();await page.keyboard.press('Space');await openAudit('Expanded mobile navigation accessibility');
  assert(await page.locator('#dropdown').evaluate(el=>el.getBoundingClientRect().right<=innerWidth));
  await page.screenshot({path:path.join(root,'.audit-artifacts',local?'mobile-menu.png':'live-mobile-menu.png')});await page.keyboard.press('Escape');check('Mobile navigation stays within viewport');
  await page.locator('#contact-form button').click();assert.equal(await page.evaluate(()=>document.activeElement.id),'name');
  assert.equal(await page.locator('#name').getAttribute('aria-invalid'),'true');assert.equal(await page.locator('#name').getAttribute('aria-describedby'),'name-error');
  await page.locator('#name').fill('Accessibility audit');assert.equal(await page.locator('#name').getAttribute('aria-invalid'),null);check('Required-field errors are associated and clear after correction');
  // Invalid data exercises the real validation handler without delivering mail.
  await page.locator('#phone').fill('5550101234');await page.locator('#email').fill('invalid');await page.locator('#message').fill('Accessibility validation test; no email should be delivered.');
  await page.locator('#contact-form').evaluate(form=>form.noValidate=true);
  await Promise.all([page.waitForURL(/contacterror/,{waitUntil:'domcontentloaded'}),page.locator('#contact-form').evaluate(form=>HTMLFormElement.prototype.submit.call(form))]);
  await page.waitForFunction(()=>document.activeElement.id==='contact-errors');assert.equal(await page.locator('#email').getAttribute('aria-invalid'),'true');assert.equal(await page.locator('#name').inputValue(),'Accessibility audit');
  await openAudit('Server form validation error accessibility');check('Server validation announces errors and preserves entered values');
  if(local){
   await page.locator('#email').fill('audit@example.com');
   await Promise.all([page.waitForNavigation({waitUntil:'domcontentloaded'}),page.locator('#contact-form button').click()]);
   assert((await page.locator('#contact-errors').textContent()).includes('Your message could not be sent'));assert.equal(await page.locator('#email').inputValue(),'audit@example.com');check('Delivery failure is accessible and keeps the message');
  }
  await page.goto(base+'/?mailsend#contact-status',{waitUntil:'domcontentloaded'});await page.waitForFunction(()=>document.activeElement.id==='contact-status');await openAudit('Success message accessibility');check('Success message receives focus');
  await page.emulateMedia({reducedMotion:'reduce'});await page.goto(base+'/',{waitUntil:'domcontentloaded'});await page.waitForTimeout(1500);
  assert(await page.locator('iframe').first().evaluate(el=>new URL(el.src).searchParams.get('autoplay')==='0'));
  assert.equal(await page.locator('video[autoplay]').count(),0);assert.equal(await page.locator('.swiper').first().evaluate(el=>el.swiper.params.speed),0);check('Media does not autoplay and carousel honors reduced motion');
  await page.setViewportSize({width:320,height:800});assert(await page.evaluate(()=>document.documentElement.scrollWidth<=innerWidth+1));check('Homepage reflows at 320 CSS pixels');
 } catch(error){checks.push({name:'Test failure',error:error.message});throw error;}
 finally {save('keyboard-report',{checks});await browser.close();}
})().catch(error=>{console.error(error);process.exitCode=1;});
