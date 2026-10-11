<a class="skip-link" href="#main-content">Skip to main content</a>
<nav aria-label="Main navigation" class="site-navigation h-16 w-full mx-auto flex items-center justify-between sticky top-0 z-10 px-4">
  <span class="uppercase font-bold md:text-2xl text-xs" id="topBar"><a href="./index.php#top">Modern Luxury Builders</a></span>
  <div class="flex gap-4 items-center justify-center" id="menu">
    <a href="https://www.tiktok.com/@modernluxurybuilders" aria-label="Modern Luxury Builders on TikTok"><img src="./images/tiktok-icon-free-png.webp" alt="" class="w-10 h-10"></a>
    <button type="button" class="h-10 w-16 bg-black relative" id="menuButton" aria-label="Menu" aria-expanded="false" aria-controls="dropdown"><img src="./images/menu.png" alt="" class="h-8 w-10 mx-auto"></button>
    <div id="dropdown" class="absolute top-4 right-0 hidden bg-black rounded-lg shadow-lg mt-16 w-40" hidden>
      <ul class="flex flex-col text-white text-center">
        <?php foreach (['project' => 'Projects', 'inspiration' => 'Inspiration', 'productSec' => 'Products', 'aboutus' => 'About', 'contact' => 'Contact'] as $anchor => $label): ?>
        <li><a href="./index.php#<?= $anchor ?>"><?= $label ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</nav>
