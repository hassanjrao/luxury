(() => {
  'use strict';
  const reducedMotion = matchMedia('(prefers-reduced-motion: reduce)');
  const menuButton = document.getElementById('menuButton');
  const dropdown = document.getElementById('dropdown');
  const menu = document.getElementById('menu');
  const setMenu = open => {
    dropdown.hidden = !open;
    dropdown.classList.toggle('hidden', !open);
    menuButton.setAttribute('aria-expanded', String(open));
  };
  menuButton.addEventListener('click', () => setMenu(dropdown.hidden));
  menu.addEventListener('keydown', event => {
    if (event.key === 'Escape' && !dropdown.hidden) {
      event.preventDefault(); setMenu(false); menuButton.focus();
    }
  });
  document.addEventListener('click', event => {
    if (!menu.contains(event.target)) setMenu(false);
  });
  menu.addEventListener('focusout', () => {
    setTimeout(() => { if (!menu.contains(document.activeElement)) setMenu(false); }, 0);
  });
  document.querySelectorAll('a[href]').forEach(link => {
    link.addEventListener('click', event => {
      const url = new URL(link.href);
      const home = path => path === '/' || path.endsWith('/index.php');
      if (!url.hash || url.origin !== location.origin || !(url.pathname === location.pathname || (home(url.pathname) && home(location.pathname)))) return;
      const target = document.getElementById(decodeURIComponent(url.hash.slice(1)));
      if (!target) return;
      event.preventDefault();
      if (dropdown.contains(link)) setMenu(false);
      target.setAttribute('tabindex', '-1');
      target.setAttribute('data-anchor-focus', '');
      target.focus({preventScroll:true});
      target.scrollIntoView({behavior:reducedMotion.matches ? 'instant' : 'smooth',block:'start'});
      history.replaceState(null, '', url.hash);
    });
  });
  const navbar = document.querySelector('.site-navigation');
  const updateNavbar = () => navbar.classList.toggle('is-scrolled', scrollY > 0);
  addEventListener('scroll', updateNavbar, {passive:true}); updateNavbar();
  const form = document.getElementById('contact-form');
  if (form) {
    const fields = [...form.querySelectorAll('input[required],textarea[required]')];
    const validate = field => {
      const id = field.id + '-error';
      let message = document.getElementById(id);
      if (field.validity.valid) {
        field.removeAttribute('aria-invalid'); field.removeAttribute('aria-describedby');
        if (message) message.remove();
        return true;
      }
      if (!message) { message = document.createElement('p'); message.id = id; message.className = 'field-error'; field.after(message); }
      const label = form.querySelector(`label[for="${field.id}"]`).textContent.replace(' (required)', '').toLowerCase();
      message.textContent = field.validity.valueMissing ? `Enter your ${label}.` : field.validity.typeMismatch ? 'Enter a valid email address, such as name@example.com.' : field.validationMessage;
      field.setAttribute('aria-invalid','true');field.setAttribute('aria-describedby',id);
      return false;
    };
    fields.forEach(field => {
      field.addEventListener('invalid', () => validate(field));
      field.addEventListener('input', () => { if (field.hasAttribute('aria-invalid')) validate(field); });
    });
    form.addEventListener('submit', event => {
      const invalid = fields.filter(field => !validate(field));
      if (invalid.length) { event.preventDefault(); invalid[0].focus(); }
    });
  }
  const status = document.getElementById('contact-errors') || document.getElementById('contact-status');
  if (status) {
    const focusStatus = () => requestAnimationFrame(() => status.focus());
    if (document.readyState === 'complete') focusStatus();
    else addEventListener('load', focusStatus, {once:true});
  }
  const galleryLinks = [...document.querySelectorAll('[data-lightbox]')];
  if (galleryLinks.length) {
    const dialog = document.createElement('dialog');
    dialog.className='photo-dialog';dialog.setAttribute('aria-labelledby','photo-dialog-title');
    dialog.innerHTML='<div class="dialog-controls"><h2 id="photo-dialog-title">Photo gallery</h2><button type="button" data-close autofocus>Close gallery</button></div><img alt=""><p data-caption role="status" aria-live="polite" aria-atomic="true"></p><div class="dialog-controls"><button type="button" data-previous>Previous photo</button><button type="button" data-next>Next photo</button></div>';
    document.body.append(dialog);
    const photo=dialog.querySelector('img');const caption=dialog.querySelector('[data-caption]');
    let group=[],index=0,opener=null,previousOverflow='';
    const showPhoto=()=>{
      const image=group[index].querySelector('img');
      photo.alt=image.alt;photo.src=group[index].href;
      caption.textContent=`Photo ${index+1} of ${group.length}. ${image.alt}`;
    };
    const advance=step=>{index=(index+step+group.length)%group.length;showPhoto();};
    galleryLinks.forEach(link=>link.addEventListener('click',event=>{
      if (event.ctrlKey || event.metaKey || event.shiftKey || event.altKey) return;
      event.preventDefault();opener=link;group=galleryLinks.filter(item=>item.dataset.lightbox===link.dataset.lightbox);index=group.indexOf(link);
      showPhoto();previousOverflow=document.body.style.overflow;document.body.style.overflow='hidden';dialog.showModal();
    }));
    photo.addEventListener('error',()=>{caption.textContent='This photo could not be loaded. Try another photo or close the gallery.';});
    dialog.querySelector('[data-close]').addEventListener('click',()=>dialog.close());
    dialog.querySelector('[data-previous]').addEventListener('click',()=>advance(-1));
    dialog.querySelector('[data-next]').addEventListener('click',()=>advance(1));
    dialog.addEventListener('click',event=>{if(event.target===dialog){const rect=dialog.getBoundingClientRect();if(event.clientX<rect.left||event.clientX>rect.right||event.clientY<rect.top||event.clientY>rect.bottom)dialog.close();}});
    dialog.addEventListener('close',()=>{document.body.style.overflow=previousOverflow;if(opener&&opener.isConnected)opener.focus();});
    dialog.addEventListener('keydown',event=>{
      if(event.key==='ArrowRight'){event.preventDefault();advance(1);}
      if(event.key==='ArrowLeft'){event.preventDefault();advance(-1);}
      if(event.key==='Tab'){
        const controls=[...dialog.querySelectorAll('button')];const first=controls[0],last=controls[controls.length-1];
        if(event.shiftKey&&document.activeElement===first){event.preventDefault();last.focus();}
        else if(!event.shiftKey&&document.activeElement===last){event.preventDefault();first.focus();}
      }
    });
  }
  const updateSlides=swiper=>{
    swiper.slides.forEach(slide=>{
      const visible=slide.classList.contains('swiper-slide-visible');
      slide.inert=!visible;
      slide.setAttribute('aria-hidden',String(!visible));
    });
  };
  if (typeof Swiper !== 'undefined') {
    document.querySelectorAll('.swiper').forEach((container,index)=>{
      const inspiration=container.classList.contains('inspirationSwiper');
      const label=inspiration?'Design inspiration':index===0?'Villa Fabulosa photos':'Villa Spectacular designs';
      container.setAttribute('role','region');container.setAttribute('aria-label',label);
      new Swiper(container,{
        loop:false,autoplay:false,speed:reducedMotion.matches?0:300,spaceBetween:30,slidesPerView:1,watchSlidesProgress:true,
        pagination:{el:container.querySelector('.swiper-pagination'),clickable:true},
        navigation:{nextEl:container.querySelector('.swiper-button-next'),prevEl:container.querySelector('.swiper-button-prev')},
        a11y:{enabled:true,containerMessage:label,prevSlideMessage:'Previous photo',nextSlideMessage:'Next photo',paginationBulletMessage:'Show photo {{index}}',slideLabelMessage:'Photo {{index}} of {{slidesLength}}'},
        breakpoints:inspiration?{768:{slidesPerView:2},1024:{slidesPerView:3}}:{},
        on:{init:swiper=>requestAnimationFrame(()=>updateSlides(swiper)),slideChangeTransitionEnd:updateSlides,resize:swiper=>requestAnimationFrame(()=>updateSlides(swiper))}
      });
    });
  }
})();
