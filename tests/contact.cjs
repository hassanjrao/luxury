const {request}=require('playwright');
const assert=require('assert').strict;
(async()=>{
 const base=process.env.CONTACT_TEST_BASE_URL||'http://127.0.0.1:8101';
 if(!['localhost','127.0.0.1','[::1]'].includes(new URL(base).hostname))throw new Error('Contact delivery fixture tests require a local server.');
 const client=await request.newContext({baseURL:base});
 const submit=async fields=>{
  const response=await client.post('/contact.php',{form:{name:'Audit test',phone:'5550101234',email:'audit@example.com',message:'simulate-success',page:'index.php',...fields},maxRedirects:0});
  assert.equal(response.status(),303);return response.headers().location;
 };
 let location=await submit({});assert.equal(location,'index.php?mailsend#contact-status');console.log('PASS delivery success redirect');
 for(const message of ['simulate-error','simulate-throw']){
  location=await submit({message});assert.equal(location,'index.php?contacterror#contact-errors');
  const html=await (await client.get('/'+location)).text();
  assert(html.includes('Your message could not be sent'));assert(html.includes(message));assert(!html.includes('Simulated private mail error'));console.log('PASS safe error recovery',message);
 }
 location=await submit({name:'<img src=x>',email:'invalid'});
 const html=await (await client.get('/'+location)).text();assert(html.includes('aria-invalid="true"'));assert(html.includes('&lt;img src=x&gt;'));console.log('PASS server validation and escaped field values');
 location=await submit({page:'https://example.com',email:'invalid'});assert.equal(location,'index.php?contacterror#contact-errors');console.log('PASS redirects remain on public pages');
 await client.dispose();
})().catch(error=>{console.error(error);process.exitCode=1;});
