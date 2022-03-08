<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="title" content="Lapakcode | Jual Beli Produk Digital Indonesia">
        <meta name="description" content="Lapakcode adalah platform jual beli produk digital yang mengedepankan karya mahasiswa sebagai produk unggulan kami">
        <meta name="keywords" content="lapakcode, jual produk digital, produk digital, script murah, lapakcode.com, asset digital, produk mahasiswa">
        <meta name="robots" content="index, follow">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="revisit-after" content="1 days">
        <meta name="author" content="lapakcode">
   <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.2/tailwind.min.css"
    />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js"
      defer
    ></script>
    <title>@yield('title')</title>

    {{-- Style --}}
    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')
 <style>
        @import url("https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500;600;700&display=swap"); /* @font-face {                font-family: AirbnbCereal;                src: url(font-family/AirbnbCereal-Book.ttf);            } */
        .font-be-vietnam {
          /* font-family: AirbnbCereal; */
          font-family: "Be Vietnam Pro", sans-serif;
        }
        :root {
          --dark-1: #08090d;
          --dark-2: #001d01;
          --champ-green: #0ddb93;
          --tile-grey: #939ea3;
          --border-grey: #304454;
        }
        .bg-dark-1 {
          background-color: var(--dark-1);
        }
        .bg-champ-green {
          background-color: var(--champ-green);
        }
        .text-dark-1 {
          color: var(--dark-1);
        }
        .text-dark-2 {
          color: var(--dark-2);
        }
        .text-tile-grey {
          color: var(--tile-grey);
        }
      </style>
  </head>

  <body>
    {{-- Navbar --}}
    @include('includes.navbar')

    {{-- Page Content --}}
    @yield('content')

    {{-- Footer --}}
    @include('includes.footer')

    {{-- Script --}}
    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
  </body>
</html>
