<?php require_once __DIR__ . "/includes/contact-state.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>

  <title>Modern Luxury Builders</title>
  <style>
    .swiper-slide img {
      width: 100%;
      /* height: 100%; */
      object-fit: cover;
    }

    .swiper-slide {
      cursor: pointer;
    }

    /* Lightbox styles */


    /* Smaller arrow button styles */
    .swiper-button-next,
    .swiper-button-prev {
      width: 24px;
      /* Adjust width */
      height: 24px;
      /* Adjust height */
      background: rgba(0, 0, 0, 0.5);
      /* Optional: change background */
      border-radius: 50%;
      /* Optional: make it round */
    }

    .swiper-button-next::after,
    .swiper-button-prev::after {
      font-size: 16px;
      /* Adjust arrow icon size */
    }

    /* Styling for Swiper slides */
    .swiper-slide {
      width: auto;
      cursor: pointer;
    }

    .swiper-slide img {
      width: 100%;
      /* height: 100%; */
      object-fit: cover;
      border: 4px solid black;
    }



    /* Styling for Swiper slides */
    .swiper-slide {
      width: auto;
      cursor: pointer;
    }

    .swiper-slide img {
      width: 100%;
      /* height: 100%; */
      object-fit: cover;
      border: 4px solid black;
    }

    .swiper-slide {
      cursor: pointer;
      padding: 10px;
    }

    .swiper-wrapper {
      display: flex;
    }

    /* Navigation arrows styling */
    .swiper-button-next,
    .swiper-button-prev {
      background: rgba(0, 0, 0, 0.5);
      width: 24px;
      height: 24px;
      border-radius: 50%;
    }

    .swiper-button-next::after,
    .swiper-button-prev::after {
      font-size: 16px;
      color: white;
    }

    .title {
      transition: transform 0.1s ease-out;
    }

    .moving-left {
      transform: translateX(-50vw);
      /* Adjust as needed for movement */
    }

    /* Additional class to add background color when navbar sticks */
    .bg-dark {
      background-color: black;
      transition: background-color 0.3s ease;
    }

    .text-stroke {
      -webkit-text-stroke: 1px white;
      /* White border around the text */
      color: transparent;
      /* Transparent text */
    }
  </style>
  <link rel="stylesheet" href="./accessibility.css">
</head>

<body class="bg-gray-100 w-full h-full mx-auto">
  <?php require __DIR__ . "/includes/header.php"; ?>
<main id="main-content" tabindex="-1">

  <div class="mt-0 relative" id="top">
    <!-- <img src="./images/0.0039.JPG" alt="" class="h-full w-full mx-auto" /> -->
    <div class="w-full h-full">
      <!-- <iframe src="https://player.vimeo.com/video/1012601556?autoplay=1&muted=1&loop=1&background=1"
        width="100%" height="100%"
        frameborder="0"
        allow="autoplay; fullscreen; picture-in-picture"
        allowfullscreen
        class="w-full h-full object-cover">
      </iframe> -->
      <div style="padding:56.25% 0 0 0;position:relative;">
        <iframe title="Modern Luxury Builders property tour" allowfullscreen src="https://player.vimeo.com/video/1012601556?h=2cbd00e806&amp;autoplay=0&amp;loop=0&amp;background=0&amp;dnt=1"
          frameborder="0" allow="autoplay; fullscreen; picture-in-picture;" style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>

      </div>

      <!-- <script src="https://player.vimeo.com/api/player.js"></script> -->

    </div>
    <p aria-hidden="true" id="animatedTitle"
      class="hero-title title w-full uppercase font-bold tracking-wider text-xl sm:text-6xl md:text-5xl lg:text-6xl xl:text-8xl absolute text-center md:bottom-24 bottom-5 ">
      Modern Luxury Builders
    </p>
  </div>
  <div id="project"></div>
  <div class="w-[80%] text-start mt-5 mx-auto">
    <h1 class="text-black font-bold text-xl">Modern Luxury Builders</h1>
    <p>
      We specialize in designing and building the most modern and luxurious homes in Southern California. Our designs seamlessly blend modern innovation with timeless elegance, creating living spaces that are as breathtaking as they are practical. We are dedicated to crafting homes that epitomize sophistication, comfort, and innovation, creating residences that not only meet but exceed the highest standards of luxury and style.
    </p>
  </div>
  <div class="w-full mx-auto mt-12">
    <!-- Page Title -->
    <!-- Swiper Image Gallery -->
    <div class="w-[90%] mx-auto">
      <div class="flex items-center my-6">
        <div class="flex-grow border-t-4 border-black"></div>
        <h2 class="md:text-3xl mx-4 text-xl font-bold my-8 text-center tracking-tight">
          OUR PROJECTS
        </h2>
        <div class="flex-grow border-t-4 border-black"></div>
      </div>
      <h3 class="italic font-bold text-4xl">Villa Fabulosa</h3>
    </div>

    <?php

    // get all images from the directory images/villa-fabulosa

    $fabulosaImages = glob('./images/villa-fabulosa/*.{jpg,png,jpeg,JPG}', GLOB_BRACE);
    $vistaImages = glob('./images/villa-vista/*.{jpg,png,jpeg,JPG}', GLOB_BRACE);
    require_once __DIR__ . '/includes/gallery-descriptions.php';
    $inspirationImages = glob('./images/inspiration/*.{jpg,png,jpeg,JPG}', GLOB_BRACE);

    ?>

    <div class="w-[90%] mx-auto">
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">

          <?php

          foreach ($fabulosaImages as $ind => $image) {

          ?>
            <!-- Slide 1 -->
            <div class="swiper-slide">

              <a href="<?php echo $image ?>" data-lightbox="image-fabulosa">
                <img src="<?php echo $image ?>" alt="<?= contactEscape(galleryDescription($image)) ?>" loading="lazy" class="w-full h-[300px] sm:h-[400px] md:h-[500px] lg:h-[600px] object-cover" />
              </a>
            </div>

          <?php } ?>




        </div>
        <!-- Swiper Navigation -->
        <div class="swiper-button-next flex items-center justify-center hover:bg-gray-700"></div>
        <div class="swiper-button-prev flex items-center justify-center hover:bg-gray-700"></div>
      </div>
    </div>

    <div class="w-[80%] mx-auto text-start mt-5">
      <h4 class="text-black font-bold text-xl">
        An Architectural Masterpiece
      </h4>
      <p>
        Our latest project, Villa Fabulosa, continues our tradition of blending luxury with innovation. Inspired by the chic allure of Ibiza-style homes, this magnificent home offers unparalleled luxury, amenities, and entertainment areas. This exquisite home very quickly became the talk of the town and the premier short-term rental destination in Temecula Wine Country. It offers guests an unmatched luxury experience. Villa Fabulosa is a cornerstone in our mission to redefine sophisticated living across Southern California.

      </p>
    </div>



    <div class="w-[90%] flex flex-col md:flex-row mx-auto mt-10 gap-6 items-center md:items-start">

  <!-- Video -->
  <div class="w-full md:w-1/2 flex aspect-video">
    <video aria-label="Villa Fabulosa property tour" preload="none" id="videoFab" class="w-full h-full rounded-lg shadow-md object-cover" controls poster="./images/thumb.png">
      <source src="./images/villa-fabulosa/video.mp4" type="video/mp4" />
    </video>
  </div>

  <!-- Image with Text Overlay -->
  <div class="w-full md:w-1/2 flex aspect-video relative overflow-hidden rounded-lg shadow-md">
    <a href="https://www.youtube.com/watch?v=xwmYm-XCr_o" target="_blank" rel="noopener" class="w-full h-full">
      <img src="./images/villa-fabulosa/0.0004.JPG" alt="" class="w-full h-full object-cover" />

      <!-- Text overlay -->
      <div class="absolute inset-0 flex flex-col justify-between p-6 text-white award-overlay rounded-lg">
        <div>
          <p class="text-xl font-semibold">Voted Top Ten Vacation Rental in the U.S.</p>
          <p class="text-lg">by Expedia Group and VRBO</p>
        </div>
        <div class="text-right text-base font-medium">
          Watch the announcement →
        </div>
      </div>

    </a>
  </div>

</div>








    <div class="w-[90%] mx-auto mt-12">
      <h3 class="italic text-black font-bold text-4xl">Villa Spectacular</h3>
      <div class="swiper mySwiper shadow-lg">
        <div class="swiper-wrapper">
          <!-- Slide 1 -->

          <?php
          foreach ($vistaImages as $ind => $image) {
          ?>


            <div class="swiper-slide">

              <a href="<?php echo $image ?>" data-lightbox="image-vista">
                <img src="<?php echo $image ?>" alt="<?= contactEscape(galleryDescription($image)) ?>" loading="lazy" class="w-full h-[300px] sm:h-[400px] md:h-[500px] lg:h-[600px] object-cover" />
              </a>
            </div>

          <?php } ?>




        </div>
        <!-- Swiper Navigation -->
        <div class="swiper-button-next flex items-center justify-center hover:bg-gray-700"></div>
        <div class="swiper-button-prev flex items-center justify-center hover:bg-gray-700"></div>
      </div>
    </div>


    <div class="w-[90%] mx-auto px-12 mt-12">
      <h4 class="text-black font-bold text-xl">
        Indulge in the Essence of Modern Elegance

      </h4>
      <p>
        Our upcoming project, Villa Spectacular, will set a new standard of luxury living. Set to break ground in November 2024, this stunning home will feature breathtaking 360-degree views, six large bedrooms, 5.5 baths, a spacious kitchen with a large pantry, a four-car garage, two decks, and a third-story bar with a spacious rooftop. Additionally, it will include a private theater for an exceptional entertainment experience.

      </p>
    </div>

    <div class="w-1/2 mx-auto mt-10">
      <video aria-label="Villa Spectacular design tour" preload="none" width="720" height="480" controls id="videoEsc" poster="./images/thumb2.png">
        <source src="./videos/video-esc.mp4" type="video/mp4" />
      </video>
    </div>

    <!-- <div style="padding:56.25% 0 0 0;position:relative;">
        <iframe src="https://player.vimeo.com/video/1014502795?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479&amp;title=0&amp;byline=0&amp;portrait=0&amp;dnt=1" frameborder="0" allow="autoplay; fullscreen; picture-in-picture; clipboard-write" style="position:absolute;top:0;left:0;width:100%;height:100%;" title="Villa Spectacular"></iframe></div>
      </div> -->

    <div id="inspiration"></div>


    <!-- Page Title -->

    <div class="w-[90%] mx-auto">
      <div class="flex items-center my-6">
        <div class="flex-grow border-t-4 border-black"></div>
        <h2 class="md:text-3xl mx-4 text-center text-xl font-bold my-8">
          OUR INSPIRATION
        </h2>
        <div class="flex-grow border-t-4 border-black"></div>
      </div>
    </div>



    <!-- Custom Swiper Image Gallery for Inspiration Section -->
    <div class="w-[90%] mx-auto p-4">

      <div class="swiper inspirationSwiper shadow-lg">
        <div class="swiper-wrapper">
          <!-- Slide 1 -->

          <?php
          foreach ($inspirationImages as $ind => $image) {
          ?>


            <div class="swiper-slide">

              <a href="<?php echo $image ?>" data-lightbox="image-inspiration">
                <img src="<?php echo $image ?>" alt="<?= contactEscape(galleryDescription($image)) ?>" loading="lazy" class="w-full h-64 object-cover" />
              </a>
            </div>

          <?php } ?>


        </div>

        <!-- Swiper Navigation -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

        <div id="productSec"></div>
      </div>
    </div>



    <!-- Container for Product Section -->
    <div class="container mx-auto px-4 py-12" id="products">
      <!-- Title Section -->

      <div class="w-[90%] mx-auto">
        <div class="flex items-center my-2">
          <div class="flex-grow border-t-4 border-black"></div>
          <h2 class="md:text-3xl mx-4 text-center text-xl font-bold my-8">
            OUR PRODUCTS
          </h2>


          <div class="flex-grow border-t-4 border-black"></div>

        </div>
      </div>
      <div class="w-[90%] mx-auto mb-4">

        <p>
          Explore over 40 curated galleries featuring a stunning collection of modern, beautifully designed products sourced from our trusted partners.</p>
      </div>

      <!-- Image Section with VR Link -->
      <div class="mb-8 w-[90%] mx-auto cursor-pointer">


        <!-- Your Image -->
        <!-- <img src="your-image-url.jpg" alt="Thumbnail" class="w-full h-auto"> -->

        <a class="relative inline-block" href="https://vr.justeasy.cn/view/1c7d2n05f98072e0-1725530309.php" target="_blank" rel="noopener">
          <img src="./images/image.png" alt="Explore the building products gallery in a virtual showroom (opens in a new tab)" class="w-full h-98 object-cover shadow-lg" />

          <!-- YouTube Play Icon -->
          <div class="absolute inset-0 flex items-center justify-center">
            <!-- SVG Play Icon for YouTube -->

            <!-- Red circle with white YouTube play icon -->
            <svg aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 68 48" width="120" height="80" class="w-26 h-26 fill-current text-red-600">
              <path d="M66.52 7.01a8.23 8.23 0 00-5.8-5.82C56.54 0 34 0 34 0s-22.54 0-26.71 1.19a8.23 8.23 0 00-5.8 5.82C0 11.2 0 24 0 24s0 12.8 1.49 16.99a8.23 8.23 0 005.8 5.82C11.46 48 34 48 34 48s22.54 0 26.71-1.19a8.23 8.23 0 005.8-5.82C68 36.8 68 24 68 24s0-12.8-1.49-16.99z" />
              <path d="M27 34V14l18 10-18 10z" class="fill-current text-white" />
            </svg>

          </div>
        </a>


      </div>

      <!-- Product Description Section -->
      <div class="text-lg mb-6 w-[80%] mx-auto">
        <p>
          At <strong>Modern Luxury Builders</strong>, we are committed to
          delivering exceptional value by sourcing hundreds of products
          directly from manufacturers all over the world. This direct
          procurement approach not only ensures the highest quality but also
          enables us to pass significant savings directly to you. By cutting
          out the middleman, we save you tens, or even hundreds of thousands of dollars on
          top-tier materials and products, making luxury more accessible and
          affordable without compromising on excellence. Mr. Lluch has
          imported millions of products from companies overseas.
        </p>

        <div id="aboutus"></div>
      </div>
    </div>

    <!-- Page Title -->

    <div class="w-[90%] mx-auto">
      <div class="flex items-center my-6">
        <div class="flex-grow border-t-4 border-black"></div>
        <h2 class="md:text-3xl mx-4 text-center text-xl font-bold my-8">
          ABOUT US
        </h2>
        <div class="flex-grow border-t-4 border-black"></div>
      </div>
    </div>

    <!-- Full-width Image -->
    <div class="w-[80%] mx-auto">
      <img src="./images/ss1.png" alt="Modern two-story house with glass walls and an infinity pool" class="w-full h-auto object-cover" />
    </div>

    <!-- About Us Paragraph -->
    <div class="container mx-auto px-4 py-8 w-[80%] mx-auto">
      <h3 class="text-black font-bold text-xl">Our Mission</h3>
      <p class="text-lg mb-8 leading-relaxed">
        Modern Luxury Builders is redefining luxury living with a unique and unparalleled approach to designing and constructing exquisite homes. What sets us apart is our partnership with leading international architects, designers, and manufacturers to seamlessly integrate innovative design concepts and cutting-edge technologies and products from around the world. This global collaboration ensures that each home we create is not only a masterpiece of modern luxury but also a testament to the highest standards of design and craftsmanship from around the globe.


      </p>
    </div>

    <!-- Image on Left and Text on Right -->
    <div class="container mx-auto px-4 py-8 w-[80%] mx-auto">
      <div class="flex flex-col md:flex-row items-center">
        <!-- Left Image -->
        <img src="./images/about/2.jpg" alt="Alex Lluch"
          class="w-80 h-96 object-cover mb-4 md:mb-0 md:mr-8 rounded-lg shadow-lg" />

        <!-- Right Text -->
        <div class="text-lg leading-relaxed">
          <h3 class="italic text-black  font-bold text-4xl py-3">Alex Lluch, President & CEO</h3>
          <p>Alex Lluch is a very successful investor and real estate professional. He is a Realtor in the state of California. He is also a best-selling author who has written and published over 300 best-selling books, including The Ultimate Home Buying Guide & Organizer, The Ultimate Home Selling Guide & Organizer, The Ultimate Home Journal & Organizer, the Very Best Home Improvement Guide & Document Organizer, Home Buying Made Easy, Home Selling Made Easy. His books have sold over 5,000,000 copies. Mr. Lluch is a renowned home designer, interior decorator, and home builder. He has also designed, built, decorated, and managed the two most popular short-term rentals in Temecula Wine Country.
          </p>
        </div>
      </div>
    </div>

    <!-- Text on Left and Image on Right -->
    <div class="container mx-auto px-4 py-8 w-[80%] mx-auto">
      <div class="flex flex-col md:flex-row-reverse items-center">
        <!-- Right Image -->
        <img src="./images/about/1.JPG" alt="Alexander Lluch"
          class="w-80 h-96 object-cover mb-4 md:mb-0 md:ml-8 rounded-lg shadow-lg" />
        <!-- Left Text -->
        <div class="text-lg leading-relaxed">
          <h3 class="italic text-black  font-bold text-4xl py-3">Alexander Lluch, Vice President</h3>
          <p>Alexander Lluch, a UCLA economics graduate, brings a wealth of
            experience to the field of Real Estate development, having spent
            years honing his expertise in home design and construction. His
            extensive hands-on experience, including the successful development
            of the prestigious Villa Fabulosa, has fueled his passion for
            creating sustainable and community-focused environments. With a deep
            understanding of both the economic and practical aspects of home
            building, Alexander is dedicated to delivering exceptional,
            high-quality residential projects that elevate the standards of
            luxury living.
          </p>
        </div>
      </div>
    </div>


    <div class="w-[90%] mx-auto mt-10">
      <div class="flex items-center">
        <div class="flex-grow border-t-4 border-black"></div>
        <h2 class="md:text-3xl mx-4 text-center text-xl font-bold my-8">
          Contact US
        </h2>
        <div class="flex-grow border-t-4 border-black"></div>
      </div>
    </div>



    <!-- Contact Form Section -->
    <div class="flex items-center justify-center" id="contact">


      <div class="w-full max-w-4xl bg-gray-100 p-8 rounded-lg shadow-lg mx-auto">

        <?php require __DIR__ . "/includes/contact-form.php"; ?>
      </div>
    </div>

  </div>
</main>
    <footer role="contentinfo" class="mt-10 text-center text-gray-600 mb-4">
      <p class="text-sm mb-2">Related Links:</p>
      <ul class="flex flex-wrap justify-center space-y-2 md:space-y-0 md:flex-nowrap md:space-x-4 text-sm">
        <li class="w-full md:w-auto">
          <a href="./Custom_Home_Design_and_Construction_Services.php" class="block text-indigo-600 hover:underline">
            Custom Home Design and Construction Services
          </a>
        </li>
        <li class="w-full md:w-auto">
          <a href="./Exclusive_Home_Building_Contractors_in_California.php" class="block text-indigo-600 hover:underline">
            Exclusive Home Building Contractors in California
          </a>
        </li>
        <li class="w-full md:w-auto">
          <a href="./Expert_Luxury_HomeBuilders_and_Designers.php" class="block text-indigo-600 hover:underline">
            Expert Luxury Home Builders and Designers
          </a>
        </li>
        <li class="w-full md:w-auto">
          <a href="./High_End_Residential_Architects_and_Builders.php" class="block text-indigo-600 hover:underline">
            High-End Residential Architects and Builders
          </a>
        </li>
        <li class="w-full md:w-auto">
          <a href="./Innovative_Home_Design_and_Building_Solutions.php" class="block text-indigo-600 hover:underline">
            Innovative Home Design and Building Solutions
          </a>
        </li>
        <li class="w-full md:w-auto">
          <a href="./Luxury_Home_Designers_Southern_California.php" class="block text-indigo-600 hover:underline">
            Luxury Home Designers in Southern California
          </a>
        </li>
        <li class="w-full md:w-auto">
          <a href="./Modern_Luxury_Home_Building.php" class="block text-indigo-600 hover:underline">
            Modern Luxury Home Building
          </a>
        </li>
        <li class="w-full md:w-auto">
          <a href="./Modern_Luxury_Home_Renovations_and_Design.php" class="block text-indigo-600 hover:underline">
            Modern Luxury Home Renovations and Design
          </a>
        </li>
        <li class="w-full md:w-auto">
          <a href="./Premium_Home_Design_and_Construction_Experts.php" class="block text-indigo-600 hover:underline">
            Premium Home Design and Construction Experts
          </a>
        </li>
        <li class="w-full md:w-auto">
          <a href="./Southern_California_Luxury_Home_Contractors.php" class="block text-indigo-600 hover:underline">
            Southern California Luxury Home Contractors
          </a>
        </li>
      </ul>
    </footer>

  <!-- Lightbox Modal -->
  <!-- <div class="lightbox" id="lightbox">
    <span class="lightbox-close" onclick="closeLightbox()">&times;</span>
    <img id="lightbox-image" src="" alt="Large view" />
  </div> -->

  <!-- Swiper.js JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

  <script src="./accessibility.js"></script>




</body>

</html>
