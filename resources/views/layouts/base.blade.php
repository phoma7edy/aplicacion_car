<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from finder.createx.studio/car-finder-home.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Aug 2022 19:19:10 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <title>Car Finder | Home</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="Finder - Directory &amp; Listings Bootstrap Template">
    <meta name="keywords" content="bootstrap, business, directory, listings, e-commerce, car dealer, city guide, real estate, job board, user account, multipurpose, ui kit, html5, css3, javascript, gallery, slider, touch">
    <meta name="author" content="Createx Studio">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Favicon and Touch Icons--> 
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/icons/logo.png') }}"> 
    <link rel="manifest" href="{{ asset('img/manifest/site.webmanifest') }}">
    <link rel="mask-icon" color="#5bbad5" href="{{ asset('img/icons/safari-pinned-tab.svg') }}">

    <meta name="msapplication-TileColor" content="#766df4">
    <meta name="theme-color" content="#ffffff">
    <!-- Page loading styles-->
    <style>
      .page-loading {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        -webkit-transition: all .4s .2s ease-in-out;
        transition: all .4s .2s ease-in-out;
        background-color: #1f1b2d;
        opacity: 0;
        visibility: hidden;
        z-index: 9999;
      }
      .page-loading.active {
        opacity: 1;
        visibility: visible;
      }
      .page-loading-inner {
        position: absolute;
        top: 50%;
        left: 0;
        width: 100%;
        text-align: center;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        -webkit-transition: opacity .2s ease-in-out;
        transition: opacity .2s ease-in-out;
        opacity: 0;
      }
      .page-loading.active > .page-loading-inner {
        opacity: 1;
      }
      .page-loading-inner > span {
        display: block;
        font-size: 1rem;
        font-weight: normal;
        color: #fff;;
      }
      .page-spinner {
        display: inline-block;
        width: 2.75rem;
        height: 2.75rem;
        margin-bottom: .75rem;
        vertical-align: text-bottom;
        border: .15em solid #9691a4;
        border-right-color: transparent;
        border-radius: 50%;
        -webkit-animation: spinner .75s linear infinite;
        animation: spinner .75s linear infinite;
      }
      @-webkit-keyframes spinner {
        100% {
          -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }
      @keyframes spinner {
        100% {
          -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }
      
    </style>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}

    <!-- Page loading scripts-->
    <script>
      (function () {
        window.onload = function () {
          var preloader = document.querySelector('.page-loading');
          preloader.classList.remove('active');
          setTimeout(function () {
            preloader.remove();
          }, 2000);
        };
      })();
      
    </script>
    <!-- Vendor Styles-->
    <link rel="stylesheet" href="{{ asset('css/vendorsAdmin/mdi/css/materialdesignicons.min.css') }}">

    <link rel="stylesheet" media="screen" href="{{ asset('css/vendor/simplebar/dist/simplebar.min.css') }}"/>
    <link rel="stylesheet" media="screen" href="{{ asset('css/vendor/tiny-slider/dist/tiny-slider.css') }}"/>
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="{{ asset('css/theme.min.css') }}">
    <!-- Google Tag Manager-->
    <script>
      (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      '../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-WKV3GT5');
    </script>

<script src="//code.tidio.co/sc87ge01mqgskhidskrncl54ogbkxsxr.js" async></script>




  </head>
  <!-- Body-->
  <body class="bg-dark">
    
    <!-- Page loading spinner-->
    <div class="page-loading active">
      <div class="page-loading-inner">
        <div class="page-spinner"></div><span>Loading...</span>
      </div>
    </div>
    <main class="page-wrapper">
    <header class="navbar navbar-expand-lg navbar-dark fixed-top" data-scroll-header>
        <div class="container">
          <a class="navbar-brand me-3 me-xl-4" href="car-finder-home.html">
            <img class="d-block" src="{{ asset('img/icons/logo.png') }}" width="80" alt="Finder">
          </a>
          <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <!-- <a class="btn btn-link btn-light btn-sm d-none d-lg-block order-lg-3" href="#signin-modal" data-bs-toggle="modal"><i class="fi-user me-2"></i>Sign in</a> -->
          <a class="btn btn-primary btn-sm ms-2 order-lg-3" href="{{route('login.register')}}"><i class="fi-login me-2"></i>Login</a>
          <a class="btn btn-success btn-sm ms-2 order-lg-3" href="{{route('login.register')}}"><i class="mdi mdi-account-plus me-2"></i>Register</a>
          {{-- <a class="btn btn-primary btn-sm ms-2 order-lg-3" href="car-finder-sell-car.html"><i class="fi-plus me-2"></i>Sell car</a> --}}
          <div class="collapse navbar-collapse order-lg-2" id="navbarNav">
            <ul class="navbar-nav navbar-nav-scroll mx-auto" style="max-height: 35rem;">

              <li class="nav-item active"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
              {{-- listas --}}
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Catalogo</a>
                <ul class="dropdown-menu dropdown-menu-dark">
                  <li><a class="dropdown-item" href="car-finder-catalog-list.html">List View</a></li>
                  <li><a class="dropdown-item" href="car-finder-catalog-grid.html">Grid View</a></li>
                  <li><a class="dropdown-item" href="car-finder-single.html">Car Single</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" role="button">Contactos</a>
              </li>            
              <li class="nav-item">
                  <a class="nav-link" href="#" role="button">Nosotros</a>
              </li>              
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" disabled>Mas</a>
                <ul class="dropdown-menu dropdown-menu-dark">
                  <li><a class="dropdown-item" href="car-finder-sell-car.html">Sell Car</a></li>
                  <li><a class="dropdown-item" href="car-finder-promotion.html">Ad Promotion Page</a></li>
                  <li><a class="dropdown-item" href="car-finder-vendor.html">Vendor Page</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
    </header>


    <section>
        @yield('contentSeccion')
    </section>

        
    

    </main>

    <footer class="footer bg-faded-light">
      <div class="border-bottom border-light py-4">
        <div class="container d-sm-flex align-items-center justify-content-between"><a class="d-inline-block" href="real-estate-home-v1.html"><img src="{{ asset('img/icons/logo.png') }}" width="116" alt="logo"></a>
          <div class="d-flex pt-3 pt-sm-0">
            <div class="dropdown ms-n3">
              <button class="btn btn-light btn-link btn-sm dropdown-toggle fw-normal py-2" type="button" data-bs-toggle="dropdown"><i class="fi-globe me-2"></i>Eng</button>
              <div class="dropdown-menu dropdown-menu-dark w-100"><a class="dropdown-item" href="#">Deutsch</a><a class="dropdown-item" href="#">English</a><a class="dropdown-item" href="#">Español</a></div>
            </div>
            {{-- <div class="dropdown">
              <button class="btn btn-light btn-link btn-sm dropdown-toggle fw-normal py-2 pe-0" type="button" data-bs-toggle="dropdown"><i class="fi-map-pin me-2"></i>New York</button>
              <div class="dropdown-menu dropdown-menu-dark dropdown-menu-sm-end" style="min-width: 7.5rem;"><a class="dropdown-item" href="#">Chicago</a><a class="dropdown-item" href="#">Dallas</a><a class="dropdown-item" href="#">Los Angeles</a><a class="dropdown-item" href="#">San Diego</a></div>
            </div> --}}
          </div>
        </div>
      </div>
      <div class="container pt-4 pb-3 pt-lg-5 pb-lg-4">
        <div class="row pt-2 pt-lg-0">
          <div class="col-lg-3 pb-2 mb-4">
            <h3 class="h5 text-light mb-2">Suscribirse para las Ofertas</h3>
            <p class="fs-sm text-light opacity-70">¡No te pierdas ninguna oferta relevante..!</p>
            <form class="form-group form-group-light w-100">
              <div class="input-group input-group-sm"><span class="input-group-text"> <i class="fi-mail"></i></span>
                <input class="form-control" type="text" placeholder="Tu email">
              </div>
              <button class="btn btn-primary btn-icon btn-sm" type="button"><i class="fi-send"></i></button>
            </form>
          </div>
          <div class="col-lg-2 col-md-3 col-sm-6 offset-xl-1 mb-2 mb-sm-4">
            <h3 class="fs-base text-light">Buying &amp; Selling</h3>
            <ul class="list-unstyled fs-sm">
              <li><a class="nav-link-light" href="#">Find a car</a></li>
              <li><a class="nav-link-light" href="#">Sell your car</a></li>
              <li><a class="nav-link-light" href="#">Car dealers</a></li>
              <li><a class="nav-link-light" href="#">Compare cars</a></li>
              <li><a class="nav-link-light" href="#">Online car appraisal</a></li>
            </ul>
          </div>
          <div class="col-lg-2 col-md-3 col-sm-6 mb-2 mb-sm-4">
            <h3 class="fs-base text-light">About</h3>
            <ul class="list-unstyled fs-sm">
              <li><a class="nav-link-light" href="#">About Finder</a></li>
              <li><a class="nav-link-light" href="#">Contact us</a></li>
              <li><a class="nav-link-light" href="#">FAQs &amp; support</a></li>
              <li><a class="nav-link-light" href="#">Mobile app</a></li>
              <li><a class="nav-link-light" href="#">Blog</a></li>
            </ul>
          </div>
          <div class="col-lg-2 col-md-3 col-sm-6 mb-2 mb-sm-4">
            <h3 class="fs-base text-light">Profile</h3>
            <ul class="list-unstyled fs-sm">
              <li><a class="nav-link-light" href="#">My account</a></li>
              <li><a class="nav-link-light" href="#">Wishlist</a></li>
              <li><a class="nav-link-light" href="#">My listings</a></li>
              <li><a class="nav-link-light" href="#">Add listing</a></li>
            </ul>
          </div>
          <div class="col-xl-2 col-lg-3 col-sm-6 col-md-3 mb-2 mb-sm-4"><a class="d-flex align-items-center text-decoration-none mb-2" href="tel:77245846"><i class="fi-device-mobile me-2"></i><span class="text-light">-77245846</span></a><a class="d-flex align-items-center text-decoration-none mb-2" href="mailto:example@email.com"><i class="fi-mail me-2"></i><span class="text-light">creando@email.com</span></a>
            <div class="d-flex flex-wrap pt-4"><a class="btn btn-icon btn-translucent-light btn-xs rounded-circle mb-2 me-2" href="#"><i class="fi-facebook"></i></a><a class="btn btn-icon btn-translucent-light btn-xs rounded-circle mb-2 me-2" href="#"><i class="fi-twitter"></i></a><a class="btn btn-icon btn-translucent-light btn-xs rounded-circle mb-2 me-2" href="#"><i class="fi-telegram"></i></a><a class="btn btn-icon btn-translucent-light btn-xs rounded-circle mb-2" href="#"><i class="fi-messenger"></i></a></div>
          </div>
        </div>
      </div>
      <div class="container d-lg-flex align-items-center justify-content-between fs-sm pb-3">
        <div class="d-flex flex-wrap justify-content-center order-lg-2 mb-3"><a class="nav-link nav-link-light fw-normal" href="#">Terms of use</a><a class="nav-link nav-link-light fw-normal" href="#">Privacy policy</a><a class="nav-link nav-link-light fw-normal" href="#">Accessibility statement</a><a class="nav-link nav-link-light fw-normal pe-0" href="#">Interest based ads</a></div>
        <p class="text-center text-lg-start order-lg-1 mb-lg-0"><span class="text-light opacity-50">&copy; All rights reserved. Made by </span><a class="nav-link-light fw-bold" href="https://createx.studio/" target="_blank" rel="noopener">Creanndo...</a></p>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>