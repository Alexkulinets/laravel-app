<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('dist/src/app.css') }}"/>
    <link rel="icon" href="{{ asset('Sphere_litle.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css"/>
    <title>S P H E R E</title>
</head>
<body>
    <header id="header" class="header active-page">
      <div class="header-container">
        <div id="burger-menu" class="burger-menu">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <div class="nav-logo-container">
          <div class="nav-filter-container">
            <a href="{{ route('home') }}" class="logo">
              <img class="logo-image" src="Sphere_litle.svg" alt="">
            </a>
          </div>
          <a class="cart-route-position" href="{{ route('cart') }}">
            <img class="cart-route-button" src="./dist/img/cart.svg" alt="">
          </a>
          <nav id="navmenu" class="navmenu">
              <div class="register-login-section nav">
                <a class="btn-getstarted login" href="{{ route('home') }}">Login</a>
                <a class="btn-getstarted register" href="{{ route('home') }}">Sign Up Now</a>
              </div>
              <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('pricing') }}">Pricing</a></li>
                <li class="dropdown"><a href="{{ route('home') }}#events"><span>Events</span><i class="bi bi-chevron-down toggle-dropdown"></i></a></li>
                <li><a href="{{ route('home') }}#contact">Contact</a></li>
              </ul>
              <div class="close-btn">×</div>
          </nav>
          </div>
        </div>
      </div>
    </header>

    
    @yield('content')


    <footer class="footer" id="contact">
      <div class="footer-container">
        <div class="footer-section first">
          <a href="{{route('home')}}" class="logo">
            <img class="elips" src="./dist/img/Elips.svg" alt="">
            <img src="Sphere_big.svg" alt="">
          </a> 
          <h3 class="first-section text">
            Lorem ipsum dolor sit amet consectetur. Eleifend nec morbi tellus vitae leo nunc.
          </h3>
        </div>
        <div class="footer-section second">
          <div class="footer-second-box">
            <h1 class="second-box-name">Company</h1>
            <div class="second-box-text">About Us</div>
            <div class="second-box-text">Products Digital</div>
            <div class="second-box-text">Customer Reviews</div>
          </div>
          <div class="footer-second-box">
            <h1 class="second-box-name">Information</h1>
            <div class="second-box-text">Help Center</div>
            <div class="second-box-text">Payment Methods</div>
            <div class="second-box-text">Return & Refund</div>
          </div>
          <div class="footer-second-box contact">
            <h1 class="second-box-name">Contact</h1>
            <div class="second-box-text info"><img src="./dist/img/Telephone.svg" alt="">(+1) 123-456-789</div>
            <div class="second-box-text info"><img src="./dist/img/Mail.svg" alt="">alex05alex03@gmail.com</div>
          </div>
        </div>
      </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="module" src="{{ asset('dist/js/app.js') }}" ></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>
</body>
</html>



