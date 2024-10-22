<?php
require 'functions/connect.php';

$tipe_kamar = $conn->query("SELECT * FROM tipe_kamar");

$fasilitas_array;
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kost 24K</title>
  <!--
        For more customization options, we would advise
        you to build your TailwindCSS from the source.
        https://tailwindcss.com/docs/installation
    -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- flowbite -->
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
  <!-- Small CSS to Hide elements at 1520px size -->
  <style>
    @media (max-width: 1520px) {
      .left-svg {
        display: none;
      }
    }

    /* small css for the mobile nav close */
    #nav-mobile-btn.close span:first-child {
      transform: rotate(45deg);
      top: 4px;
      position: relative;
      background: #a0aec0;
    }

    #nav-mobile-btn.close span:nth-child(2) {
      transform: rotate(-45deg);
      margin-top: 0px;
      background: #a0aec0;
    }
  </style>
</head>

<body class="overflow-x-hidden antialiased relative">
  <!-- Header Section -->
  <header class="relative z-50 w-full h-24">
    <div class="container flex items-center justify-center h-full max-w-6xl px-8 mx-auto sm:justify-between xl:px-0">
      <a href="#" class="relative flex items-center inline-block h-5 h-full font-black leading-none">
        <svg class="w-auto h-6 text-indigo-600 fill-current" viewBox="0 0 194 116" xmlns="http://www.w3.org/2000/svg">
          <g fill-rule="evenodd">
            <path d="M96.869 0L30 116h104l-9.88-17.134H59.64l47.109-81.736zM0 116h19.831L77 17.135 67.088 0z" />
            <path d="M87 68.732l9.926 17.143 29.893-51.59L174.15 116H194L126.817 0z" />
          </g>
        </svg>
        <span class="ml-3 text-xl text-gray-800">Kost 24K<span class="text-pink-500">.</span></span>
      </a>

      <nav
        id="nav"
        class="absolute top-0 left-0 z-50 flex flex-col items-center justify-between hidden w-full h-64 pt-5 mt-24 text-sm text-gray-800 bg-white border-t border-gray-200 md:w-auto md:flex-row md:h-24 lg:text-base md:bg-transparent md:mt-0 md:border-none md:py-0 md:flex md:relative">
        <a href="#home" class="ml-0 mr-0 font-bold duration-100 md:ml-12 md:mr-3 lg:mr-8 transition-color hover:text-indigo-600">Beranda</a>
        <a href="#keunggulan" class="mr-0 font-bold duration-100 md:mr-3 lg:mr-8 transition-color hover:text-indigo-600">keunggulan</a>
        <a href="#kamar" class="mr-0 font-bold duration-100 md:mr-3 lg:mr-8 transition-color hover:text-indigo-600">Kamar & Harga</a>
        <a href="#testimoni" class="font-bold duration-100 transition-color hover:text-indigo-600">Testimoni</a>
        <div class="flex flex-col block w-full font-medium border-t border-gray-200 md:hidden">
          <a href="login.php" class="w-full py-2 font-bold text-center text-pink-500">Login</a>
          <a href="register.php" class="relative inline-block w-full px-5 py-3 text-sm leading-none text-center text-white bg-indigo-700 fold-bold">Get Started</a>
        </div>
      </nav>

      <div
        class="absolute left-0 flex-col items-center justify-center hidden w-full pb-8 mt-48 border-b border-gray-200 md:relative md:w-auto md:bg-transparent md:border-none md:mt-0 md:flex-row md:p-0 md:items-end md:flex md:justify-between">
        <a href="login.php" class="relative z-40 px-3 py-2 mr-0 text-sm font-bold text-pink-500 md:px-5 lg:text-white sm:mr-3 md:mt-0">Login</a>
        <a
          href="register.php"
          class="relative z-40 inline-block w-auto h-full px-5 py-3 text-sm font-bold leading-none text-white transition-all transition duration-100 duration-300 bg-indigo-700 rounded shadow-md fold-bold lg:bg-white lg:text-indigo-700 sm:w-full lg:shadow-none hover:shadow-xl">Get Started</a>
        <svg class="absolute top-0 left-0 hidden w-screen max-w-3xl -mt-64 -ml-12 lg:block" viewBox="0 0 818 815" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <defs>
            <linearGradient x1="0%" y1="0%" x2="100%" y2="100%" id="c">
              <stop stop-color="#E614F2" offset="0%" />
              <stop stop-color="#FC3832" offset="100%" />
            </linearGradient>
            <linearGradient x1="0%" y1="0%" x2="100%" y2="100%" id="f">
              <stop stop-color="#657DE9" offset="0%" />
              <stop stop-color="#1C0FD7" offset="100%" />
            </linearGradient>
            <filter x="-4.7%" y="-3.3%" width="109.3%" height="109.3%" filterUnits="objectBoundingBox" id="a">
              <feOffset dy="8" in="SourceAlpha" result="shadowOffsetOuter1" />
              <feGaussianBlur stdDeviation="8" in="shadowOffsetOuter1" result="shadowBlurOuter1" />
              <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.15 0" in="shadowBlurOuter1" />
            </filter>
            <filter x="-4.7%" y="-3.3%" width="109.3%" height="109.3%" filterUnits="objectBoundingBox" id="d">
              <feOffset dy="8" in="SourceAlpha" result="shadowOffsetOuter1" />
              <feGaussianBlur stdDeviation="8" in="shadowOffsetOuter1" result="shadowBlurOuter1" />
              <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.2 0" in="shadowBlurOuter1" />
            </filter>
            <path
              d="M160.52 108.243h497.445c17.83 0 24.296 1.856 30.814 5.342 6.519 3.486 11.635 8.602 15.12 15.12 3.487 6.52 5.344 12.985 5.344 30.815v497.445c0 17.83-1.857 24.296-5.343 30.814-3.486 6.519-8.602 11.635-15.12 15.12-6.52 3.487-12.985 5.344-30.815 5.344H160.52c-17.83 0-24.296-1.857-30.814-5.343-6.519-3.486-11.635-8.602-15.12-15.12-3.487-6.52-5.343-12.985-5.343-30.815V159.52c0-17.83 1.856-24.296 5.342-30.814 3.486-6.519 8.602-11.635 15.12-15.12 6.52-3.487 12.985-5.343 30.815-5.343z"
              id="b" />
            <path
              d="M159.107 107.829H656.55c17.83 0 24.296 1.856 30.815 5.342 6.518 3.487 11.634 8.602 15.12 15.12 3.486 6.52 5.343 12.985 5.343 30.816V656.55c0 17.83-1.857 24.296-5.343 30.815-3.486 6.518-8.602 11.634-15.12 15.12-6.519 3.486-12.985 5.343-30.815 5.343H159.107c-17.83 0-24.297-1.857-30.815-5.343-6.519-3.486-11.634-8.602-15.12-15.12-3.487-6.519-5.343-12.985-5.343-30.815V159.107c0-17.83 1.856-24.297 5.342-30.815 3.487-6.519 8.602-11.634 15.12-15.12 6.52-3.487 12.985-5.343 30.816-5.343z"
              id="e" />
          </defs>
          <g fill="none" fill-rule="evenodd" opacity=".9">
            <g transform="rotate(65 416.452 409.167)">
              <use fill="#000" filter="url(#a)" xlink:href="#b" />
              <use fill="url(#c)" xlink:href="#b" />
            </g>
            <g transform="rotate(29 421.929 414.496)">
              <use fill="#000" filter="url(#d)" xlink:href="#e" />
              <use fill="url(#f)" xlink:href="#e" />
            </g>
          </g>
        </svg>
      </div>

      <div id="nav-mobile-btn" class="absolute top-0 right-0 z-50 block w-6 mt-8 mr-10 cursor-pointer select-none md:hidden sm:mt-10">
        <span class="block w-full h-1 mt-2 duration-200 transform bg-gray-800 rounded-full sm:mt-1"></span>
        <span class="block w-full h-1 mt-1 duration-200 transform bg-gray-800 rounded-full"></span>
      </div>
    </div>
  </header>
  <!-- End Header Section-->

  <!-- BEGIN HERO SECTION -->
  <div id="#home" class="relative items-center justify-center w-full overflow-x-hidden lg:pt-40 lg:pb-40 xl:pt-40 xl:pb-64">
    <div class="container flex flex-col items-center justify-between h-full max-w-6xl px-8 mx-auto -mt-32 lg:flex-row xl:px-0">
      <div class="z-30 flex flex-col items-center w-full max-w-xl pt-48 text-center lg:items-start lg:w-1/2 lg:pt-20 xl:pt-40 lg:text-left">
        <h1 class="relative mb-4 text-3xl font-black leading-tight text-gray-900 sm:text-6xl xl:mb-8">Pilih tempat tinggal terbaik anda disini.</h1>
        <p class="pr-0 mb-8 text-base text-gray-600 sm:text-lg xl:text-xl lg:pr-20">Kamu masih bingung mencari kamar kost yang murah namun nyaman? Kost 24K adalah solusi terbaik untuk kamu.</p>
        <a href="#kamar" class="relative self-start inline-block w-auto px-8 py-4 mx-auto mt-0 text-base font-bold text-white bg-indigo-600 border-t border-gray-200 rounded-md shadow-xl sm:mt-1 fold-bold lg:mx-0">pesan sekarang!</a>
        <!-- Integrates with section -->
        <div class="flex-col hidden mt-12 sm:flex lg:mt-24">
          <p class="mb-4 text-sm font-medium tracking-widest text-gray-500 uppercase">Terintegrasikan dengan</p>
          <div class="flex">
            <img src="src/logos/Logo Mamikos-Green.png" alt="Logo Mami kos" class="w-28 grayscale hover:grayscale-0" />
          </div>
        </div>
        <svg class="absolute left-0 max-w-md mt-24 -ml-64 left-svg" viewBox="0 0 423 423" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <defs>
            <linearGradient x1="100%" y1="0%" x2="4.48%" y2="0%" id="linearGradient-1">
              <stop stop-color="#5C54DB" offset="0%" />
              <stop stop-color="#6A82E7" offset="100%" />
            </linearGradient>
            <filter x="-9.3%" y="-6.7%" width="118.7%" height="118.7%" filterUnits="objectBoundingBox" id="filter-3">
              <feOffset dy="8" in="SourceAlpha" result="shadowOffsetOuter1" />
              <feGaussianBlur stdDeviation="8" in="shadowOffsetOuter1" result="shadowBlurOuter1" />
              <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0" in="shadowBlurOuter1" />
            </filter>
            <rect id="path-2" x="63" y="504" width="300" height="300" rx="40" />
          </defs>
          <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" opacity=".9">
            <g id="Desktop-HD" transform="translate(-39 -531)">
              <g id="Hero" transform="translate(43 83)">
                <g id="Rectangle-6" transform="rotate(45 213 654)">
                  <use fill="#000" filter="url(#filter-3)" xlink:href="#path-2" />
                  <use fill="url(#linearGradient-1)" xlink:href="#path-2" />
                </g>
              </g>
            </g>
          </g>
        </svg>
      </div>
      <div class="relative z-50 flex flex-col items-end justify-center w-full h-full lg:w-1/2 ms:pl-10">
        <div class="container relative left-0 w-full max-w-4xl lg:absolute xl:max-w-6xl lg:w-screen">
          <img src="https://www.griyasatria.co.id/wp-content/uploads/2021/05/rumah-kost.png" alt="kost 24k" class="w-full h-full mt-20 mb-20 ml-0 lg:mt-24 xl:mt-40 lg:mb-0 lg:h-full lg:-ml-12 rounded-lg" />
        </div>
      </div>
    </div>
  </div>
  <!-- HERO SECTION END -->

  <!-- BEGIN FEATURES SECTION -->
  <div id="keunggulan" class="relative w-full px-8 py-10 border-t border-gray-200 md:py-16 lg:py-24 xl:py-40 xl:px-0">
    <div class="container flex flex-col items-center justify-between h-full max-w-6xl mx-auto">
      <h2 class="my-5 text-base font-medium tracking-tight text-indigo-500 uppercase">Keunggulan</h2>
      <h3 class="max-w-2xl px-5 mt-2 text-3xl font-black leading-tight text-center text-gray-900 sm:mt-0 sm:px-0 sm:text-6xl">Kamu bertanya apa sih yang menarik dari Kost 24K?</h3>
      <div class="flex flex-col w-full mt-0 lg:flex-row sm:mt-10 lg:mt-20">
        <div class="w-full max-w-md p-4 mx-auto mb-0 sm:mb-16 lg:mb-0 lg:w-1/3">
          <div class="relative flex flex-col items-center justify-center w-full h-full p-20 mr-5 rounded-lg">
            <svg class="absolute w-full h-full text-gray-100 fill-current" viewBox="0 0 377 340" xmlns="http://www.w3.org/2000/svg">
              <g>
                <g>
                  <path
                    d="M342.8 3.7c24.7 14 18.1 75 22.1 124s18.6 85.8 8.7 114.2c-9.9 28.4-44.4 48.3-76.4 62.4-32 14.1-61.6 22.4-95.9 28.9-34.3 6.5-73.3 11.1-95.5-6.2-22.2-17.2-27.6-56.5-47.2-96C38.9 191.4 5 151.5.9 108.2-3.1 64.8 22.7 18 61.8 8.7c39.2-9.2 91.7 19 146 16.6 54.2-2.4 110.3-35.6 135-21.6z" />
                </g>
              </g>
            </svg>
            <!-- FEATURE Icon 1 -->
            <img src="src/logos/toilet.png" alt="toilet" class="z-10" />
            <h4 class="relative mt-6 text-lg font-bold text-center">Toilet pribadi untuk setiap kamar</h4>
            <p class="relative mt-2 text-base text-center text-gray-600">Kami menyediakan toilet pribadi yang nyaman untuk setiap kamar.</p>
            <a href="#_" class="relative flex mt-2 text-sm font-medium text-indigo-500 underline">Learn More</a>
          </div>
        </div>

        <div class="w-full max-w-md p-4 mx-auto mb-0 sm:mb-16 lg:mb-0 lg:w-1/3">
          <div class="relative flex flex-col items-center justify-center w-full h-full p-20 mr-5 rounded-lg">
            <svg class="absolute w-full h-full text-gray-100 fill-current" viewBox="0 0 358 372" xmlns="http://www.w3.org/2000/svg">
              <g>
                <g>
                  <path
                    d="M315.7 6.5c30.2 15.1 42.6 61.8 41.5 102.5-1.1 40.6-15.7 75.2-24.3 114.8-8.7 39.7-11.3 84.3-34.3 107.2-23 22.9-66.3 23.9-114.5 30.7-48.2 6.7-101.3 19.1-123.2-4.1-21.8-23.2-12.5-82.1-21.6-130.2C30.2 179.3 2.6 141.9.7 102c-2-39.9 21.7-82.2 57.4-95.6 35.7-13.5 83.3 2.1 131.2 1.7 47.9-.4 96.1-16.8 126.4-1.6z" />
                </g>
              </g>
            </svg>
            <!-- FEATURE Icon 2 -->
            <img src="src/logos/security.png" alt="security" class="z-10" />
            <h4 class="relative mt-6 text-lg font-bold text-center">Akses Keamanan 24 Jam</h4>
            <p class="relative mt-2 text-base text-center text-gray-600">Keamanan adalah prioritas kami. rivasi dan keamanan Anda terjaga selama 24 jam penuh.</p>
            <a href="#_" class="relative flex mt-2 text-sm font-medium text-indigo-500 underline">Learn More</a>
          </div>
        </div>

        <div class="w-full max-w-md p-4 mx-auto mb-16 lg:mb-0 lg:w-1/3">
          <div class="relative flex flex-col items-center justify-center w-full h-full p-20 mr-5 rounded-lg">
            <svg class="absolute w-full h-full text-gray-100 fill-current" viewBox="0 0 378 410" xmlns="http://www.w3.org/2000/svg">
              <g>
                <g>
                  <path
                    d="M305.9 14.4c23.8 24.6 16.3 84.9 26.6 135.1 10.4 50.2 38.6 90.3 43.7 137.8 5.1 47.5-12.8 102.4-50.7 117.4-37.9 15.1-95.7-9.8-151.7-12.2-56.1-2.5-110.3 17.6-130-3.4-19.7-20.9-4.7-82.9-11.5-131.2C25.5 209.5-3 174.7 1.2 147c4.2-27.7 41-48.3 75-69.6C110.1 56.1 141 34.1 184 17.5c43.1-16.6 98.1-27.7 121.9-3.1z" />
                </g>
              </g>
            </svg>
            <!-- FEATURE Icon 3 -->
            <img src="src/logos/kitchen.png" alt="kitchen" class="z-10" />
            <h4 class="relative mt-6 text-lg font-bold text-center">Dapur Bersama yang Modern</h4>
            <p class="relative mt-2 text-base text-center text-gray-600">Nikmati fasilitas dapur bersama dengan peralatan lengkap dan modern.</p>
            <a href="#_" class="relative flex mt-2 text-sm font-medium text-indigo-500 underline">Learn More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END FEATURES SECTION -->

  <!-- Pricing Section -->
  <div id="kamar" class="relative px-8 py-10 bg-white border-t border-gray-200 md:py-16 lg:py-24 xl:py-40 xl:px-0">
    <div id="pricing" class="container flex flex-col items-center h-full max-w-6xl mx-auto">
      <h2 class="my-5 text-base font-medium tracking-tight text-indigo-500 uppercase">Kamar & Harga</h2>
      <h3 class="w-full max-w-2xl px-5 px-8 mt-2 text-2xl font-black leading-tight text-center text-gray-900 sm:mt-0 sm:px-0 sm:text-6xl md:px-0">Anda tertarik dengan Kost 24K?</h3>
      <p class="my-6 text-xl font-medium text-gray-500 max-w-2xl text-center">Kami menyediakan beberapa tipe kamar yang bisa anda sesuaikan dengan kebutuhan.</p>

      <div class="max-w-full mx-auto md:max-w-6xl sm:px-8">
        <div class="relative flex flex-col items-center block sm:flex-row gap-3">

          <!-- type room -->
          <?php while ($tipe = $tipe_kamar->fetch_assoc()) { ?>
            <div
              class="relative z-0 max-w-sm my-8 border border-gray-200 rounded-lg w-fit sm:my-5">
              <div class="overflow-hidden text-black bg-white border-t border-gray-100 rounded-lg shadow-xl">
                <div
                  class="block max-w-sm px-8 mx-auto mt-5 text-sm text-left text-black sm:text-md lg:px-6">
                  <h3 class="p-3 text-lg font-bold tracking-wide text-center uppercase"><?= $tipe['nama_tipe'] ?><span
                      class="ml-2 font-light">Kost</span></h3>
                  <h4
                    class="flex items-center justify-center pb-6 text-4xl font-bold text-center text-gray-900">
                    <span class="mr-1 -ml-2 text-lg text-gray-700">Rp </span>
                    <?= number_format($tipe['harga'], 0, ',', '.') ?>
                  </h4>
                  <p class="text-sm text-gray-600"><?= $tipe['deskripsi'] ?>
                  </p>
                </div>

                <?php $fasilitas_array = explode(',', $tipe['fasilitas']); ?>
                <div class="flex flex-wrap px-6 mt-8">
                  <ul>
                    <?php foreach ($fasilitas_array as $fasilitas_item) : ?>
                      <li class="flex items-center">
                        <div class="p-2 text-green-500 rounded-full fill-current ">
                          <svg class="w-6 h-6 align-middle" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                          </svg>
                        </div>
                        <span class="ml-3 text-lg text-gray-700"><?= $fasilitas_item ?></span>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
                <div class="flex items-center block p-8 uppercase">
                  <button type="button" data-modal-target="crud-<?= $tipe['id'] ?>" data-modal-toggle="crud-<?= $tipe['id'] ?>"
                    class="block w-full px-6 py-4 mt-3 text-lg font-semibold text-center text-white bg-gray-900 rounded shadow-sm hover:bg-green-600">Pesan kamar</butt>
                </div>
              </div>
            </div>

            <!-- modal -->
            <div id="crud-<?= $tipe['id'] ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
              <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                  <!-- Modal header -->
                  <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                    <h3 class="text-lg font-semibold text-gray-900">
                      Pesan Kamar Tipe <?= $tipe['nama_tipe'] ?>
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-toggle="crud-<?= $tipe['id'] ?>">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                      </svg>
                      <span class="sr-only">Close modal</span>
                    </button>
                  </div>
                  <!-- Modal body -->
                  <form class="p-4 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                      <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type product name" required="">
                      </div>
                      <div class="col-span-2 sm:col-span-1">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
                        <input type="number" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="$2999" required="">
                      </div>
                      <div class="col-span-2 sm:col-span-1">
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                        <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                          <option selected="">Select category</option>
                          <option value="TV">TV/Monitors</option>
                          <option value="PC">PC</option>
                          <option value="GA">Gaming/Console</option>
                          <option value="PH">Phones</option>
                        </select>
                      </div>
                      <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Product Description</label>
                        <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write product description here"></textarea>
                      </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                      <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                      </svg>
                      Add new product
                    </button>
                  </form>
                </div>
              </div>
            </div>
          <?php }; ?>
        </div>
      </div>
    </div>
  </div>
  <!-- End Pricing Section -->

  <!-- Start Testimonials -->
  <div id="testimoni" class="flex items-center justify-center w-full px-8 py-10 border-t border-gray-200 md:py-16 lg:py-24 xl:py-40 xl:px-0">
    <div class="max-w-6xl mx-auto">
      <div class="flex-col items-center">
        <div class="flex flex-col items-center justify-center w-full h-full max-w-2xl pr-8 mx-auto text-center">
          <p class="my-5 text-base font-medium tracking-tight text-indigo-500 uppercase">Testimoni dari para penyewa</p>
          <h2 class="text-4xl font-extrabold leading-10 tracking-tight text-gray-900 sm:text-5xl sm:leading-none md:text-6xl lg:text-5xl xl:text-6xl">Testimonials</h2>
          <p class="my-6 text-xl font-medium text-gray-500">Lihat berbagai testimoni dari para penyewa yang telah menggunakan Kost 24K.</p>
        </div>
        <div class="flex flex-col items-center justify-center max-w-2xl py-8 mx-auto xl:flex-row xl:max-w-full">
          <div class="w-full xl:w-1/2 xl:pr-8">
            <blockquote class="flex flex-col-reverse items-center justify-between w-full col-span-1 p-6 text-center transition-all duration-200 bg-gray-100 rounded-lg md:flex-row md:text-left hover:bg-white hover:shadow ease">
              <div class="flex flex-col pr-8">
                <div class="relative pl-12">
                  <svg class="absolute left-0 w-10 h-10 text-indigo-500 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 125">
                    <path
                      d="M30.7 42c0 6.1 12.6 7 12.6 22 0 11-7.9 19.2-18.9 19.2C12.7 83.1 5 72.6 5 61.5c0-19.2 18-44.6 29.2-44.6 2.8 0 7.9 2 7.9 5.4S30.7 31.6 30.7 42zM82.4 42c0 6.1 12.6 7 12.6 22 0 11-7.9 19.2-18.9 19.2-11.8 0-19.5-10.5-19.5-21.6 0-19.2 18-44.6 29.2-44.6 2.8 0 7.9 2 7.9 5.4S82.4 31.6 82.4 42z" />
                  </svg>
                  <p class="mt-2 text-base text-gray-600">I'm loving these templates! Very nice features and layouts.</p>
                </div>

                <h3 class="pl-12 mt-3 text-base font-medium leading-5 text-gray-800 truncate">Sandra Walton <span class="mt-1 text-sm leading-5 text-gray-500 truncate">- CEO SomeCompany</span></h3>
                <p class="mt-1 text-sm leading-5 text-gray-500 truncate"></p>
              </div>
              <img
                class="flex-shrink-0 object-cover w-24 h-24 mb-5 bg-gray-300 rounded-full md:mb-0"
                src="https://images.unsplash.com/photo-1544725176-7c40e5a71c5e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2694&q=80"
                alt="" />
            </blockquote>
            <blockquote
              class="flex flex-col-reverse items-center justify-between w-full col-span-1 p-6 mt-16 mb-16 text-center transition-all duration-200 bg-gray-100 rounded-lg md:flex-row md:text-left hover:bg-white hover:shadow ease xl:mb-0">
              <div class="flex flex-col pr-10">
                <div class="relative pl-12">
                  <svg class="absolute left-0 w-10 h-10 text-indigo-500 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 125">
                    <path
                      d="M30.7 42c0 6.1 12.6 7 12.6 22 0 11-7.9 19.2-18.9 19.2C12.7 83.1 5 72.6 5 61.5c0-19.2 18-44.6 29.2-44.6 2.8 0 7.9 2 7.9 5.4S30.7 31.6 30.7 42zM82.4 42c0 6.1 12.6 7 12.6 22 0 11-7.9 19.2-18.9 19.2-11.8 0-19.5-10.5-19.5-21.6 0-19.2 18-44.6 29.2-44.6 2.8 0 7.9 2 7.9 5.4S82.4 31.6 82.4 42z" />
                  </svg>
                  <p class="mt-2 text-base text-gray-600">Really digging this service. Now I can quickly bootstrap any project.</p>
                </div>
                <h3 class="pl-12 mt-3 text-base font-medium leading-5 text-gray-800 truncate">Kenny Jones <span class="mt-1 text-sm leading-5 text-gray-500 truncate">- CEO SomeCompany</span></h3>
                <p class="mt-1 text-sm leading-5 text-gray-500 truncate"></p>
              </div>
              <img
                class="flex-shrink-0 object-cover w-24 h-24 mb-5 bg-gray-300 rounded-full md:mb-0"
                src="https://images.unsplash.com/photo-1546820389-44d77e1f3b31?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1400&q=80"
                alt="" />
            </blockquote>
          </div>
          <div class="w-full xl:w-1/2 xl:pl-8">
            <blockquote class="flex flex-col-reverse items-center justify-between w-full col-span-1 p-6 text-center transition-all duration-200 bg-gray-100 rounded-lg md:flex-row md:text-left hover:bg-white hover:shadow ease">
              <div class="flex flex-col pr-10">
                <div class="relative pl-12">
                  <svg class="absolute left-0 w-10 h-10 text-indigo-500 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 125">
                    <path
                      d="M30.7 42c0 6.1 12.6 7 12.6 22 0 11-7.9 19.2-18.9 19.2C12.7 83.1 5 72.6 5 61.5c0-19.2 18-44.6 29.2-44.6 2.8 0 7.9 2 7.9 5.4S30.7 31.6 30.7 42zM82.4 42c0 6.1 12.6 7 12.6 22 0 11-7.9 19.2-18.9 19.2-11.8 0-19.5-10.5-19.5-21.6 0-19.2 18-44.6 29.2-44.6 2.8 0 7.9 2 7.9 5.4S82.4 31.6 82.4 42z" />
                  </svg>
                  <p class="mt-2 text-base text-gray-600">Extremely helpful in every single project we have released.</p>
                </div>

                <h3 class="pl-12 mt-3 text-base font-medium leading-5 text-gray-800 truncate">
                  Mike Smith
                  <span class="mt-1 text-sm leading-5 text-gray-500 truncate">- CEO SomeCompany</span>
                </h3>
                <p class="mt-1 text-sm leading-5 text-gray-500 truncate"></p>
              </div>
              <img
                class="flex-shrink-0 object-cover w-24 h-24 mb-5 bg-gray-300 rounded-full md:mb-0"
                src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1700&q=80"
                alt="" />
            </blockquote>
            <blockquote class="flex flex-col-reverse items-center justify-between w-full col-span-1 p-6 mt-16 text-center transition-all duration-200 bg-gray-100 rounded-lg md:flex-row md:text-left hover:bg-white hover:shadow ease">
              <div class="flex flex-col pr-10">
                <div class="relative pl-12">
                  <svg class="absolute left-0 w-10 h-10 text-indigo-500 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 125">
                    <path
                      d="M30.7 42c0 6.1 12.6 7 12.6 22 0 11-7.9 19.2-18.9 19.2C12.7 83.1 5 72.6 5 61.5c0-19.2 18-44.6 29.2-44.6 2.8 0 7.9 2 7.9 5.4S30.7 31.6 30.7 42zM82.4 42c0 6.1 12.6 7 12.6 22 0 11-7.9 19.2-18.9 19.2-11.8 0-19.5-10.5-19.5-21.6 0-19.2 18-44.6 29.2-44.6 2.8 0 7.9 2 7.9 5.4S82.4 31.6 82.4 42z" />
                  </svg>
                  <p class="mt-2 text-base text-gray-600">Finally a quick and easy system I can use for any type of project.</p>
                </div>

                <h3 class="pl-12 mt-3 text-base font-medium leading-5 text-gray-800 truncate">Molly Sanchez <span class="mt-1 text-sm leading-5 text-gray-500 truncate">- CEO SomeCompany</span></h3>
                <p class="mt-1 text-sm leading-5 text-gray-500 truncate"></p>
              </div>
              <img
                class="flex-shrink-0 object-cover w-24 h-24 mb-5 bg-gray-300 rounded-full md:mb-0"
                src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2700&q=80"
                alt="" />
            </blockquote>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Testimonials-->

  <!-- kontak -->
  <div id="kontak" class="bg-gray-100 w-full px-8 py-10 border-t border-gray-200 md:py-16 lg:py-24 xl:py-40 xl:px-0">
    <div class="flex flex-col items-center justify-center w-full h-full max-w-2xl pr-8 mx-auto text-center">
      <h2 class="text-4xl font-extrabold leading-10 tracking-tight text-gray-900 sm:text-5xl sm:leading-none md:text-6xl lg:text-5xl xl:text-6xl">Kontak dan Lokasi</h2>
      <p class="my-6 text-xl font-medium text-gray-500">Hubungi kami segera dan lakukan pemesanan. Anda dapat menghubungi kami melalui kontak yang tersedia.</p>
    </div>

    <div class="flex flex-col md:flex-row items-center justify-center w-full h-full gap-10 px-8 py-12 mx-auto text-center">
      <div class="md:w-1/3 space-y-4">
        <p class="text-lg font-semibold text-gray-700">Kontak: +628123456789</p>
        <p class="text-lg font-semibold text-gray-700">Email: 6KlVj@example.com</p>
        <a href="mailto:6KlVj@example.com" class="inline-block px-6 py-3 bg-indigo-600 text-white font-medium rounded-lg shadow-lg hover:bg-indigo-800 transition duration-300"> Hubungi Kami </a>
      </div>
      <div class="md:w-2/3">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15928.389271262062!2d98.65174919509269!3d3.565069319262247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303131d6e3d2b367%3A0xc5edba7e577329d2!2sPoliteknik%20Negeri%20Medan!5e0!3m2!1sid!2sid!4v1729523320610!5m2!1sid!2sid"
          width="600"
          height="450"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
          class="w-full h-96 rounded-lg shadow-lg"></iframe>
      </div>
    </div>
  </div>
  <!-- end kontak -->

  <footer class="px-4 pt-12 pb-8 text-white bg-white border-t border-gray-200">
    <div class="container flex flex-col justify-between max-w-6xl px-4 mx-auto overflow-hidden lg:flex-row">
      <div class="w-full pl-12 mr-4 text-left lg:w-1/4 sm:text-center sm:pl-0 lg:text-left">
        <a href="/" class="flex justify-start block text-left sm:text-center lg:text-left sm:justify-center lg:justify-start">
          <span class="flex items-start sm:items-center">
            <svg class="w-auto h-6 text-gray-800 fill-current" viewBox="0 0 194 116" xmlns="http://www.w3.org/2000/svg">
              <g fill-rule="evenodd">
                <path d="M96.869 0L30 116h104l-9.88-17.134H59.64l47.109-81.736zM0 116h19.831L77 17.135 67.088 0z"></path>
                <path d="M87 68.732l9.926 17.143 29.893-51.59L174.15 116H194L126.817 0z"></path>
              </g>
            </svg>
          </span>
        </a>
        <p class="mt-6 mr-4 text-base text-gray-500">Kost 24K | Kost terbaik di Indonesia.</p>
      </div>
      <div class="block w-full pl-10 mt-6 text-sm lg:w-3/4 sm:flex lg:mt-0">
        <ul class="flex flex-col w-full p-0 font-medium text-left text-gray-700 list-none">
          <li class="inline-block px-3 py-2 mt-5 font-bold tracking-wide text-gray-800 uppercase md:mt-0">Data tambahan</li>
          <li><a href="" class="inline-block px-3 py-2 text-gray-500 no-underline hover:text-gray-600">Lokasi</a></li>
          <li><a href="#_" class="inline-block px-3 py-2 text-gray-500 no-underline hover:text-gray-600">Kontak</a></li>
          <li><a href="#_" class="inline-block px-3 py-2 text-gray-500 no-underline hover:text-gray-600">FAQ</a></li>
        </ul>
        <ul class="flex flex-col w-full p-0 font-medium text-left text-gray-700 list-none">
          <li class="inline-block px-3 py-2 mt-5 font-bold tracking-wide text-gray-800 uppercase md:mt-0">Aturan dan persyaratan</li>
          <li><a href="#_" class="inline-block px-3 py-2 text-gray-500 no-underline hover:text-gray-600">Privacy</a></li>
          <li><a href="#_" class="inline-block px-3 py-2 text-gray-500 no-underline hover:text-gray-600">Terms of Service</a></li>
        </ul>
      </div>
    </div>
    <div class="pt-4 pt-6 mt-10 text-center text-gray-500 border-t border-gray-100">© 2020 Kost 24K. All rights reserved.</div>
  </footer>

  <a href="#" class="fixed bottom-10 right-10 p-4 rounded-full text-white bg-indigo-500 z-[9999]">
    <img width="30" height="30" src="https://img.icons8.com/ios/50/chevron-up.png" alt="upper" title="kembali ke atas" />
  </a>

  <!-- a little JS for the mobile nav button -->
  <script>
    if (document.getElementById("nav-mobile-btn")) {
      document.getElementById("nav-mobile-btn").addEventListener("click", function() {
        if (this.classList.contains("close")) {
          document.getElementById("nav").classList.add("hidden");
          this.classList.remove("close");
        } else {
          document.getElementById("nav").classList.remove("hidden");
          this.classList.add("close");
        }
      });
    }
  </script>
  <!-- flowbite -->
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>