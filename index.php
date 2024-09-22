<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Modern Luxury Building</title>
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
    .lightbox {
      position: fixed;
      z-index: 100;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.8);
      display: flex;
      align-items: center;
      justify-content: center;
      visibility: hidden;
      opacity: 0;
      transition: visibility 0s, opacity 0.5s;
    }

    .inspiration-lightbox-close {}

    .lightbox img {
      width: 80%;
      max-width: 1000px;
      height: auto;
      border-radius: 10px;
    }

    .lightbox.active {
      visibility: visible;
      opacity: 1;
    }

    .lightbox-close {
      position: absolute;
      top: 20px;
      right: 20px;
      font-size: 2rem;
      color: white;
      cursor: pointer;
    }

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

    /* Lightbox styles */
    .lightbox {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.8);
      display: flex;
      align-items: center;
      justify-content: center;
      visibility: hidden;
      opacity: 0;
      transition: visibility 0s, opacity 0.5s;
    }

    .lightbox img {
      width: 80%;
      max-width: 1000px;
      height: auto;
      border-radius: 10px;
    }

    .lightbox.active {
      visibility: visible;
      opacity: 1;
    }

    .lightbox-close {
      position: absolute;
      top: 20px;
      right: 20px;
      font-size: 2rem;
      color: white;
      cursor: pointer;
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

    /* Lightbox styles */
    .lightbox {
      position: fixed;
      z-index: 100;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.8);
      display: flex;
      align-items: center;
      justify-content: center;
      visibility: hidden;
      opacity: 0;
      transition: visibility 0s, opacity 0.5s;
    }

    .lightbox img {
      width: 80%;
      max-width: 1000px;
      height: auto;
      border-radius: 10px;
    }

    .lightbox.active {
      visibility: visible;
      opacity: 1;
      transition: opacity 0.3s ease;
    }

    /* .lightbox-close {
        position: absolute;
        top: 20px;
        right: 20px;
        font-size: 2rem;
        color: white;
        cursor: pointer;
      } */

    /* Close button */
    .lightbox-close {
      position: absolute;
      top: 20px;
      right: 20px;
      font-size: 2rem;
      color: white;
      cursor: pointer;
      z-index: 10;
      /* Ensure close button is above the image */
    }

    /* Fade-out effect for smooth closing */
    .lightbox img,
    .lightbox-close {
      transition: opacity 0.3s ease;
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
</head>

<body class="bg-gray-100 w-full h-full mx-auto">
  <nav class="h-16 md:w-full w-full mx-auto flex items-center justify-between sticky top-0 z-10 px-4">
    <h1 class="uppercase font-bold md:text-2xl w-full text-xs" id="topBar">

      <a onclick="scrollToTop()" class="cursor-pointer">Modern Luxury Builders</a>
    </h1>
    <div class="flex gap-4 items-center justify-center" id="menu">
      <a href="https://www.tiktok.com/explore">
        <img src="./images/tiktok-icon-free-png.webp" alt="" class="w-10 h-10 mx-auto" /></a>
      <div class="h-10 w-16 bg-black mx-auto cursor-pointer relative" id="menuButton">
        <img src="./images/menu.png" alt="" class="h-8 w-10 mx-auto pt-2" />
      </div>
      <div id="dropdown" class="absolute top-4 right-0 hidden bg-black rounded-lg shadow-lg mt-16 w-40" tabindex="0">
        <ul class="flex flex-col text-white text-center">
          <li class="py-1 hover:bg-white hover:text-black cursor-pointer">
            <a onclick="scrollToElement('project')" class=""> Projects</a>
          </li>
          <li class="py-1 hover:bg-white hover:text-black cursor-pointer">
            <a onclick="scrollToElement('inspiration')" class="">Inspiration</a>
          </li>
          <li class="py-1 hover:bg-white hover:text-black cursor-pointer">
            <a onclick="scrollToElement('productSec')" class="">Products</a>
          </li>
          <li class="py-1 hover:bg-white hover:text-black cursor-pointer">
            <a onclick="scrollToElement('aboutus')" class="">About</a>
          </li>
          <li class="py-1 hover:bg-white hover:text-black cursor-pointer">
            <a onclick="scrollToElement('contact')" class="">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="mt-4 relative" id="top">
    <!-- <img src="./images/0.0039.JPG" alt="" class="h-full w-full mx-auto" /> -->
    <video width="100%" height="100%" muted autoplay loop>
      <source src="./videos/herosection.mp4" type="video/mp4" />
      Your browser does not support the video tag.
    </video>
    <h1 id="animatedTitle"
      class="title text-stroke w-full px-4 uppercase font-bold tracking-wider text-xl sm:text-3xl md:text-5xl lg:text-6xl xl:text-8xl absolute text-center md:bottom-24 bottom-5">
      Modern Luxury Builders
    </h1>
  </div>
  <div id="project"></div>
  <div class="w-[80%] text-start mt-5 mx-auto">
    <h2 class="text-black font-bold text-xl">Modern Luxury Builders</h2>
    <p>
      We specialize in designing and building the most modern and luxurious homes in Southern California. Our designs merge cutting-edge designs with unparalleled elegance, delivering living spaces that are both stunning and functional. We are dedicated to crafting homes that epitomize sophistication, comfort, and innovation, creating residences that not only meet but exceed the highest standards of luxury and style. 
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
      <p class="italic text-xl">Villa Fabulosa</p>
    </div>
    <div class="w-[90%] mx-auto">
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          <!-- Slide 1 -->
          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0001.jpg" alt="Villa Fabulosa 1" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0001.jpg" />
          </div>
          <!-- Slide 2 -->
          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0002.png" alt="Villa Fabulosa 2" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0002.png" />
          </div>
          <!-- Slide 3 -->
          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0002a.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0002a.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0003.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0003.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0004.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0004.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0005.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0005.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0006.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0006.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0007.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0007.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0008.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0008.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0009.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0009.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0010.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0010.JPG" />
          </div>


          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0011.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0011.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0012.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0012.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0013.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0013.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0014.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0014.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0015.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0015.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0016.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0016.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0016.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0016.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0017.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0017.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0018.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0018.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0019.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0019.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0020.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0020.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0021.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0021.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0022.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0022.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0023.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0023.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0024.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0024.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0024.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0024.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0025.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0025.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0026.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0026.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0027.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0027.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0028.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0028.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0029.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0029.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0030.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0030.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0031.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0031.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0032.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0032.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0033.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0033.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0034.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0034.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0035.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0035.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0035a.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0035a.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0036.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0036.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0037.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0037.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0037a.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0037a.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0037b.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0037b.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0037c.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0037c.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0038.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0038.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0039.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0039.JPG" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-fabulosa/0.0040.JPG" alt="Villa Fabulosa 3" class="w-full h-[600px] object-cover"
              data-large="./images/villa-fabulosa/0.0040.JPG" />
          </div>


        </div>
        <!-- Swiper Navigation -->
        <div class="swiper-button-next flex items-center justify-center hover:bg-gray-700"></div>
        <div class="swiper-button-prev flex items-center justify-center hover:bg-gray-700"></div>
      </div>
    </div>

    <div class="w-[80%] mx-auto text-start mt-5">
      <h1 class="text-black font-bold text-xl">
        An Architectural Masterpiece
      </h1>
      <p>
        Our latest project, Villa Fabulosa, continues our tradition of blending luxury with innovation.  Inspired by the chic allure of Ibiza-style homes, this magnificent home offers unparalleled luxury, amenities, and entertainment areas.  This exquisite home very quickly became the talk of the town and the premier short-term rental destination in Temecula Wine Country. It offers guests an unmatched luxury experience. Villa Fabulosa is a cornerstone in our mission to redefine sophisticated living across Southern California.

      </p>
    </div>


    <div class="w-1/2 mx-auto mt-10">
      <video width="720" height="480" controls>
        <source src="./images/villa-fabulosa/video.mp4" type="video/mp4" />
      </video>
    </div>


    <div class="w-[90%] mx-auto mt-12">
      <p class="italic text-black text-xl">Villa Fantastica</p>
      <div class="swiper mySwiper shadow-lg">
        <div class="swiper-wrapper">
          <!-- Slide 1 -->
          <div class="swiper-slide">
            <img src="./images/villa-vista/1.jpg" alt="Villa Fabulosa 1" class="w-full h-96 object-cover"
              data-large="./images/villa-vista/1.jpg" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-vista/2.jpg" alt="Villa Fabulosa 1" class="w-full h-96 object-cover"
              data-large="./images/villa-vista/2.jpg" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-vista/3.jpg" alt="Villa Fabulosa 1" class="w-full h-96 object-cover"
              data-large="./images/villa-vista/3.jpg" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-vista/4.jpg" alt="Villa Fabulosa 1" class="w-full h-96 object-cover"
              data-large="./images/villa-vista/4.jpg" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-vista/5.jpg" alt="Villa Fabulosa 1" class="w-full h-96 object-cover"
              data-large="./images/villa-vista/5.jpg" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-vista/6.jpg" alt="Villa Fabulosa 1" class="w-full h-96 object-cover"
              data-large="./images/villa-vista/6.jpg" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-vista/7.jpg" alt="Villa Fabulosa 1" class="w-full h-96 object-cover"
              data-large="./images/villa-vista/7.jpg" />
          </div>

          <div class="swiper-slide">
            <img src="./images/villa-vista/8.jpg" alt="Villa Fabulosa 1" class="w-full h-96 object-cover"
              data-large="./images/villa-vista/8.jpg" />
          </div>


          <div class="swiper-slide">
            <img src="./images/villa-vista/10.jpg" alt="Villa Fabulosa 1" class="w-full h-96 object-cover"
              data-large="./images/villa-vista/10.jpg" />
          </div>


          <div class="swiper-slide">
            <img src="./images/villa-vista/11.jpg" alt="Villa Fabulosa 1" class="w-full h-96 object-cover"
              data-large="./images/villa-vista/11.jpg" />
          </div>


          <div class="swiper-slide">
            <img src="./images/villa-vista/12.jpg" alt="Villa Fabulosa 1" class="w-full h-96 object-cover"
              data-large="./images/villa-vista/12.jpg" />
          </div>


          <div class="swiper-slide">
            <img src="./images/villa-vista/13.jpg" alt="Villa Fabulosa 1" class="w-full h-96 object-cover"
              data-large="./images/villa-vista/13.jpg" />
          </div>


          <div class="swiper-slide">
            <img src="./images/villa-vista/14.jpg" alt="Villa Fabulosa 1" class="w-full h-96 object-cover"
              data-large="./images/villa-vista/14.jpg" />
          </div>





        </div>
        <!-- Swiper Navigation -->
        <div class="swiper-button-next flex items-center justify-center hover:bg-gray-700"></div>
        <div class="swiper-button-prev flex items-center justify-center hover:bg-gray-700"></div>
      </div>
    </div>

    <div class="w-1/2 mx-auto mt-10">
      <video width="720" height="480" controls>
        <source src="./videos/video-esc.mp4" type="video/mp4" />
      </video>
    </div>

    <div id="inspiration"></div>

    <div class="w-[90%] mx-auto px-12 mt-12">
      <h1 class="text-black font-bold text-xl">
        Indulge in the Essence of Modern Elegance

      </h1>
      <p>
        Our upcoming project, Villa Fantastica, will set a new standard of luxury living. Set to break ground in November 2024, this stunning home will feature breathtaking 360-degree views, six large bedrooms, 5.5 baths, a spacious kitchen with a large pantry, a four-car garage, two decks, and a third-story bar with a spacious rooftop. Additionally, it will include a private theater for an exceptional entertainment experience. 

      </p>
    </div>

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
          <div class="swiper-slide">
            <img src="./images/inspiration/1.jpg" alt="Villa Fabulosa 1" class="w-full h-64 object-cover"
              data-large="./images/inspiration/1.jpg" />
          </div>
          <!-- Slide 2 -->
          <div class="swiper-slide">
            <img src="./images/inspiration/2.jpg" alt="Villa Fabulosa 2" class="w-full h-64 object-cover"
              data-large="./images/inspiration/2.jpg" />
          </div>
          <!-- Slide 3 -->
          <div class="swiper-slide">
            <img src="./images/inspiration/3.jpg" alt="Villa Fabulosa 3" class="w-full h-64 object-cover"
              data-large="./images/inspiration/3.jpg" />
          </div>
          <!-- Slide 3 -->
          <div class="swiper-slide">
            <img src="./images/inspiration/4.png" alt="Villa Fabulosa 3" class="w-full h-64 object-cover"
              data-large="./images/inspiration/4.png" />
          </div>

          <div class="swiper-slide">
            <img src="./images/inspiration/5.png" alt="Villa Fabulosa 3" class="w-full h-64 object-cover"
              data-large="./images/inspiration/5.png" />
          </div>

          <div class="swiper-slide">
            <img src="./images/inspiration/6.png" alt="Villa Fabulosa 3" class="w-full h-64 object-cover"
              data-large="./images/inspiration/6.png" />
          </div>

          <div class="swiper-slide">
            <img src="./images/inspiration/7.png" alt="Villa Fabulosa 3" class="w-full h-64 object-cover"
              data-large="./images/inspiration/7.png" />
          </div>

          <div class="swiper-slide">
            <img src="./images/inspiration/8.jpg" alt="Villa Fabulosa 3" class="w-full h-64 object-cover"
              data-large="./images/inspiration/8.jpg" />
          </div>

          <div class="swiper-slide">
            <img src="./images/inspiration/9.jpg" alt="Villa Fabulosa 3" class="w-full h-64 object-cover"
              data-large="./images/inspiration/9.jpg" />
          </div>

          <div class="swiper-slide">
            <img src="./images/inspiration/10.jpg" alt="Villa Fabulosa 3" class="w-full h-64 object-cover"
              data-large="./images/inspiration/10.jpg" />
          </div>


        </div>

        <!-- Swiper Navigation -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

        <div id="productSec"></div>
      </div>
    </div>


    <!-- Lightbox Modal for Inspiration Section -->
    <!-- <div class="lightbox inspiration-lightbox" id="inspiration-lightbox ">
        <span
          class="inspiration-lightbox-close"
          onclick="closeInspirationLightbox()"
          >&times;</span
        >
        <img id="inspiration-lightbox-image" src="" alt="Large view" />
      </div> -->

    <!-- Container for Product Section -->
    <div class="container mx-auto px-4 py-12" id="products">
      <!-- Title Section -->
      <h1 class="md:text-3xl text-xl font-bold text-center mb-8" id="productsHeading">

      </h1>
      <div class="w-[90%] mx-auto">
        <div class="flex items-center my-6">
          <div class="flex-grow border-t-4 border-black"></div>
          <h2 class="md:text-3xl mx-4 text-center text-xl font-bold my-8">
            OUR PRODUCTS
          </h2>
          <div class="flex-grow border-t-4 border-black"></div>
        </div>
      </div>

      <!-- Image Section with VR Link -->
      <div class="mb-8">
        <a href="https://vr.justeasy.cn/view/1c7d2n05f98072e0-1725530309.html" target="_blank">
          <img src="./images/image.png" alt="VR Preview" class="w-full h-98 object-cover shadow-lg" />
        </a>
      </div>

      <!-- Product Description Section -->
      <div class="text-lg mb-6">
        <p>
          At <strong>Modern Luxury Builders</strong>, we are committed to
          delivering exceptional value by sourcing hundreds of products
          directly from manufacturers all over the world. This direct
          procurement approach not only ensures the highest quality but also
          enables us to pass significant savings directly to you. By cutting
          out the middleman, we save you tens, or even hundreds, of dollars on
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
    <div class="w-full">
      <img src="./images/ss1.png" alt="About Us Image" class="w-full h-auto object-cover" />
    </div>

    <!-- About Us Paragraph -->
    <div class="container mx-auto px-4 py-8">
      <h2 class="text-black font-bold text-xl">Our Mission</h2>
      <p class="text-lg mb-8 leading-relaxed">
        Modern Luxury Builders is redefining luxury living with a unique and unparalleled approach to designing and constructing exquisite homes.  What sets us apart is our partnership with leading international architects, designers, and manufacturers to seamlessly integrate innovative design concepts and cutting-edge technologies and products from around the world.   This global collaboration ensures that each home we create is not only a masterpiece of modern luxury but also a testament to the highest standards of design and craftsmanship from around the globe.


      </p>
    </div>

    <!-- Image on Left and Text on Right -->
    <div class="container mx-auto px-4 py-8">
      <div class="flex flex-col md:flex-row items-center">
        <!-- Left Image -->
        <img src="./images/about/2.jpg" alt="Alex Lluch"
          class="w-80 h-96 object-cover mb-4 md:mb-0 md:mr-8 rounded-lg shadow-lg" />
        <!-- Right Text -->
        <p class="text-lg leading-relaxed">
          Alex Lluch is a very successful investor and real estate professional. He owns Real Estate in California, Georgia, North Carolina, and Florida. He is a realtor in the state of California. He is also a best-selling author who has written and published over 300 best-selling books, including The Ultimate Home Buying Guide & Organizer, The Ultimate Home Selling Guide & Organizer, The Ultimate Home Journal & Organizer, the Very Best Home Improvement Guide & Document Organizer, Home Buying Made Easy, Home Selling Made Easy. His books have sold over 5,000,000 copies. Mr. Lluch is a renowned home designer, interior decorator, and home builder. He has also designed, built, decorated, and managed the two most popular short-term rentals in Temecula Wine Country.
        </p>
      </div>
    </div>

    <!-- Text on Left and Image on Right -->
    <div class="container mx-auto px-4 py-8">
      <div class="flex flex-col md:flex-row-reverse items-center">
        <!-- Right Image -->
        <img src="./images/about/1.JPG" alt="Alexander Lluch"
          class="w-80 h-96 object-cover mb-4 md:mb-0 md:ml-8 rounded-lg shadow-lg" />
        <!-- Left Text -->
        <p class="text-lg leading-relaxed">
          Alexander Lluch, a UCLA economics graduate, brings a wealth of
          experience to the field of real estate development, having spent
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

        <!-- email sent message -->
        <?php if(isset($_GET['mailsend'])) { ?>
        <div class="text-green-500 text-center bg-green-100 border border-green-200 px-4 py-3 rounded relative"
          role="alert">
          <strong class="font-bold">Message sent successfully!</strong>
          <span class="block sm:inline">We will get back to you shortly.</span>
        </div>
        <?php } ?>

        <h2 class="text-center text-gray-600 mb-8">
          Send us a message using the form below and someone from our team
          will get back to you shortly.
        </h2>

        <form id="contact-form" action="./contact.php" method="POST">
          <!-- Name Input -->
          <div class="mb-4">
            <input type="text" name="name" id="name" placeholder="Name"
            
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
              required />
          </div>

          <!-- Phone and Email Input (Side by Side) -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <input type="tel" name="phone" id="phone" placeholder="Phone Number"
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
              required />
            <input type="email" name="email" id="email" placeholder="Email Address"
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
              required />
          </div>

          <!-- Dropdown (General Inquiry) -->
          
          <!-- Message Input -->
          <div class="mb-6">
            <textarea name="message" id="message" placeholder="Message" rows="5"
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-600"
              required></textarea>
          </div>

          <!-- Submit Button -->
          <div class="text-center">
            <button type="submit"
            name="submit"
              class="bg-blue-900 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-950 transition duration-300">
              SUBMIT
            </button>
          </div>
        </form>
      </div>
    </div>

    <footer class="mt-10 text-center text-gray-600 mb-4">
      <p class="text-sm mb-2">Related Links:</p>
      <ul class="flex flex-wrap justify-center space-y-2 md:space-y-0 md:flex-nowrap md:space-x-4 text-sm">
          <li class="w-full md:w-auto">
              <a href="./Custom_Home_Design_and_Construction_Services.html" class="block text-indigo-600 hover:underline">
                  Custom Home Design and Construction Services
              </a>
          </li>
          <li class="w-full md:w-auto">
              <a href="./Exclusive_Home_Building_Contractors_in_California.html" class="block text-indigo-600 hover:underline">
                  Exclusive Home Building Contractors in California
              </a>
          </li>
          <li class="w-full md:w-auto">
              <a href="./Expert_Luxury_HomeBuilders_and_Designers.html" class="block text-indigo-600 hover:underline">
                  Expert Luxury Home Builders and Designers
              </a>
          </li>
          <li class="w-full md:w-auto">
              <a href="./High_End_Residential_Architects_and_Builders.html" class="block text-indigo-600 hover:underline">
                  High-End Residential Architects and Builders
              </a>
          </li>
          <li class="w-full md:w-auto">
              <a href="./Innovative_Home_Design_and_Building_Solutions.html" class="block text-indigo-600 hover:underline">
                  Innovative Home Design and Building Solutions
              </a>
          </li>
          <li class="w-full md:w-auto">
              <a href="./Luxury_Home_Designers_Southern_California.html" class="block text-indigo-600 hover:underline">
                  Luxury Home Designers in Southern California
              </a>
          </li>
          <li class="w-full md:w-auto">
              <a href="./Modern_Luxury_Home_Building.html" class="block text-indigo-600 hover:underline">
                  Modern Luxury Home Building
              </a>
          </li>
          <li class="w-full md:w-auto">
              <a href="./Modern_Luxury_Home_Renovations_and_Design.html" class="block text-indigo-600 hover:underline">
                  Modern Luxury Home Renovations and Design
              </a>
          </li>
          <li class="w-full md:w-auto">
              <a href="./Premium_Home_Design_and_Construction_Experts.html" class="block text-indigo-600 hover:underline">
                  Premium Home Design and Construction Experts
              </a>
          </li>
          <li class="w-full md:w-auto">
              <a href="./Southern_California_Luxury_Home_Contractors.html" class="block text-indigo-600 hover:underline">
                  Southern California Luxury Home Contractors
              </a>
          </li>
      </ul>
  </footer>
  
  </div>

  <!-- Lightbox Modal -->
  <div class="lightbox" id="lightbox">
    <span class="lightbox-close" onclick="closeLightbox()">&times;</span>
    <img id="lightbox-image" src="" alt="Large view" />
  </div>

  <!-- Swiper.js JS -->
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

  <script src="./script.js"></script>

  <!-- JavaScript to handle Swiper and Lightbox -->
  <script>
    // Initialize Swiper
    var swiper = new Swiper(".mySwiper", {
      loop: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      spaceBetween: 30,
      slidesPerView: 1, // Display one image at a time
    });

    // Lightbox functionality

    document.querySelectorAll(".swiper-slide img").forEach((img) => {
      img.addEventListener("click", function () {
        const lightbox = document.getElementById("lightbox");
        const lightboxImage = document.getElementById("lightbox-image");
        lightboxImage.src = this.getAttribute("data-large");
        lightbox.classList.add("active");
      });
    });

    function closeLightbox() {
      const lightbox = document.getElementById("lightbox");
      lightbox.classList.remove("active");
    }

    function closeLightbox() {
      const lightbox = document.getElementById("lightbox");
      const lightboxImage = document.getElementById("lightbox-image");
      lightboxImage.src = ""; // Reset the image source to remove the image from the modal
      console.log("lightboxImage", lightboxImage.src);

      lightbox.classList.remove("active"); // Close the modal
    }

    
    // Initialize Swiper
    var inspirationSwiper = new Swiper(".inspirationSwiper", {
      loop: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      spaceBetween: 30,
      breakpoints: {
        // When the window width is >= 640px (small screen)
        640: {
          slidesPerView: 1, // Display 1 image at a time
        },
        // When the window width is >= 768px (medium screen)
        768: {
          slidesPerView: 2, // Display 2 images at a time
        },
        // When the window width is >= 1024px (large screen)
        1024: {
          slidesPerView: 3, // Display 3 images at a time
        },
      },
    });

    // Lightbox functionality.
    document.querySelectorAll(".swiper-slide img").forEach((img) => {
      img.addEventListener("click", function () {
        const lightbox = document.getElementById("inspiration-lightbox");
        const lightboxImage = document.getElementById(
          "inspiration-lightbox-image"
        );
        lightboxImage.src = this.getAttribute("data-large");
        lightbox.classList.add("active");
      });
    });

    function closeInspirationLightbox() {
      const lightbox = document.getElementById("inspiration-lightbox");
      lightbox.classList.remove("active");
    }

    

    const title = document.getElementById("animatedTitle");

    window.addEventListener("scroll", () => {
      // Calculate scroll position as a percentage of the viewport height
      const scrollTop = window.scrollY;
      const windowHeight = window.innerHeight;
      const scrollPercentage = scrollTop / windowHeight;

      // Move the title horizontally based on scroll percentage
      const moveAmount = scrollPercentage * 100; // Adjust the multiplier to control the distance
      title.style.transform = `translateX(-${moveAmount}vw)`;
    });

    function scrollToTop() {
      window.scrollTo({
        top: 0,
        behavior: 'smooth' // This makes the scroll smooth
      });
    }

  </script>
</body>

</html>