<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="./assets/libs/flickity/dist/flickity.min.css" defer>
    <link rel="stylesheet" defer href="./assets/libs/flickity-fade/flickity-fade.css">
    <link rel="stylesheet" defer href="./assets/libs/aos/dist/aos.css">
    <link rel="stylesheet" defer href="./assets/libs/jarallax/dist/jarallax.css">
    <link rel="stylesheet" defer href="./assets/libs/highlightjs/styles/vs2015.css">
    <link rel="stylesheet" defer href="./assets/libs/@fancyapps/fancybox/dist/jquery.fancybox.min.css">
    <link href="{{ URL::asset('assets/css/icon.css')}}" rel="stylesheet" type="text/css" defer>

    <!-- Theme CSS -->
    <link rel="stylesheet" href="./assets/css/themes.min.css">
    <link rel="stylesheet" href="./assets/css/custom.css">

    <link rel="icon" href="/assets/images/niaga-icon.png" type="image/x-icon">
    <link rel="shortcut icon" href="/assets/images/niaga-icon.png" type="image/x-icon">
    <meta name="csrf-token" conten="{{ csrf_token() }}" />
    <title>Niagahoster</title>

    @laravelPWA
  </head>
  <body>


    @include('layouts.navigation')

    @yield('content')
     <!-- FOOTER
    ================================================== -->
    @include('layouts.footer')
    @yield('scripts')
  
    </body>
  </html>
   