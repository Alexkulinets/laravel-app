<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('Sphere_litle.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
    <link rel="stylesheet" href="{{ asset('dist/src/app.css') }}"/>
    <title>S P H E R E</title>
</head>
<body>
    <header id="header" class="header">
        <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="{{route('home')}}" class="logo">
            <img src="Sphere_litle.svg" alt="">
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
            <li><a href="{{route('home')}}">Home</a></li>
            <li><a href="{{route('pricing')}}">Pricing</a></li>
            <li class="dropdown"><a href="{{ route('home') }}#events"><span>Events</span><i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                    <li><a href="#">Dropdown 1</a></li>
                    <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li>
          <li><a href="{{ route('home') }}#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      <div class="register-login-section">
        <a class="btn-getstarted login" href="{{route('home')}}">Login</a>
        <a class="btn-getstarted register" href="{{route('home')}}">Sing Up Now</a>
      </div>
      <div class="cart-section" >
        <a href="{{route('home')}}" ><img class="cart-route-button" src="./dist/img/cart.svg" alt=""></a>
      </div>
    </div>
  </header>
    
    
    
    
    @yield('content')
    @if (request()->routeIs('home'))

    <div class="slider-container">
        <div class="slider-container-section">
            <div class="slider-section-name">
                What <span class="purple-span">we</span> provide?
            </div>
            <div class="slider-icons-container">
                <div class="group" aria-hidden="true">
                  <div class="main-slider-box">
                    <div class="slider-box">
                      <img src="./dist/img/PC.svg" alt="">
                    </div>
                    <h3 class="slider-box-text" style="font-size: 14px; font-weight: 400">Computer & Laptop</h3>
                  </div>
                  <div class="main-slider-box">
                    <div class="slider-box">
                      <img src="./dist/img/Phone.svg" alt="">
                    </div>
                    <h3 class="slider-box-text" style="font-size: 14px; font-weight: 400">Mobile & Phone</h3>
                  </div>
                  <div class="main-slider-box">
                    <div class="slider-box">
                      <img src="./dist/img/Camera.svg" alt="">
                    </div>
                    <h3 class="slider-box-text" style="font-size: 14px; font-weight: 400">Camera</h3>
                  </div>
                </div>
                <div class="group" aria-hidden="true">
                  <div class="main-slider-box">
                    <div class="slider-box">
                      <img src="./dist/img/TV.svg" alt="">
                    </div>
                    <h3 class="slider-box-text" style="font-size: 14px; font-weight: 400">TV & Smart Box</h3>
                  </div>
                  <div class="main-slider-box">
                    <div class="slider-box">
                      <img src="./dist/img/Printer.svg" alt="">
                    </div>
                    <h3 class="slider-box-text" style="font-size: 14px; font-weight: 400">Home Appliance</h3>
                  </div>
                  <div class="main-slider-box">
                    <div class="slider-box">
                      <img src="./dist/img/Volume.svg" alt="">
                    </div>
                    <h3 class="slider-box-text" style="font-size: 14px; font-weight: 400">Accessories</h3>
                  </div>
                </div>  
                <div class="group" aria-hidden="true">
                  <div class="main-slider-box">
                    <div class="slider-box">
                      <img src="./dist/img/PC.svg" alt="">
                    </div>
                    <h3 class="slider-box-text" style="font-size: 14px; font-weight: 400">Computer & Laptop</h3>
                  </div>
                  <div class="main-slider-box">
                    <div class="slider-box">
                      <img src="./dist/img/Phone.svg" alt="">
                    </div>
                    <h3 class="slider-box-text" style="font-size: 14px; font-weight: 400">Mobile & Phone</h3>
                  </div>
                  <div class="main-slider-box">
                    <div class="slider-box">
                      <img src="./dist/img/Camera.svg" alt="">
                    </div>
                    <h3 class="slider-box-text" style="font-size: 14px; font-weight: 400">Camera</h3>
                  </div>
                </div>
                <div class="group" aria-hidden="true">
                  <div class="main-slider-box">
                    <div class="slider-box">
                      <img src="./dist/img/TV.svg" alt="">
                    </div>
                    <h3 class="slider-box-text" style="font-size: 14px; font-weight: 400">TV & Smart Box</h3>
                  </div>
                  <div class="main-slider-box">
                    <div class="slider-box">
                      <img src="./dist/img/Printer.svg" alt="">
                    </div>
                    <h3 class="slider-box-text" style="font-size: 14px; font-weight: 400">Home Appliance</h3>
                  </div>
                  <div class="main-slider-box">
                    <div class="slider-box">
                      <img src="./dist/img/Volume.svg" alt="">
                    </div>
                    <h3 class="slider-box-text" style="font-size: 14px; font-weight: 400">Accessories</h3>
                  </div>
                </div>        
            </div>
        </div>
    </div>
    <div class="card-container" id="card">
        <div class="card-container-name">
        Todays <span class="purple-span">Best Deals</span> for you!
        </div>
        <div class="card-nav-container">
          <button class="scroll-btn left-btn">←</button>
          <button class="scroll-btn right-btn">→</button>
        </div>
        <div class="card-container-section">
            <div class="card-content">
              <div class="card">
                <a href="{{route('product')}}" class="card-section image">
                    <img class="card-product-image" src="{{asset ('https://content1.rozetka.com.ua/goods/images/big/364623744.jpg') }}" alt="">
                </a>
                <div class="card-section">
                  <a href="{{route('product')}}" class="card-section-name" style="color: #000">
                    Xiphone 14 Pro Maxe <div class="card-section-name-cost">$175.00</div>
                  </a>
                  <h3 class="card-section-description">
                    Lorem ipsum dolor sit amet consectetur. Eleifend nec morbi tellus vitae leo nunc.
                  </h3>
                  <div class="card-section-stars">
                    <div class="star-box">
                    <img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star">
                    </div>
                    <div class="amout card-section-description">(121)</div>
                  </div>
                  <div class="card-section-add">
                    <img src="./dist/img/cart.svg" alt="">
                    Add to Cart
                  </div>
                </div>
              </div>
              <div class="card">
                <a href="{{route('product')}}" id="card" class="card-section image">
                  <img class="card-product-image" src="https://content.rozetka.com.ua/goods/images/big/30873693.jpg" alt="">
                </a>
                <div class="card-section">
                  <a href="{{route('product')}}" class="card-section-name" style="color: #000">
                    Xiphone 13 Pro Maxe <div class="card-section-name-cost">$175.00</div>
                  </a>
                  <h3 class="card-section-description">
                    Lorem ipsum dolor sit amet consectetur. Eleifend nec morbi tellus vitae leo nunc.
                  </h3>
                  <div class="card-section-stars">
                    <div class="star-box">
                    <img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star">
                    </div>
                    <div class="amout card-section-description">(121)</div>
                  </div>
                  <div class="card-section-add">
                    <img src="./dist/img/cart.svg" alt="">
                    Add to Cart
                  </div>
                </div>
              </div>
              <div class="card">
                <a href="{{route('product')}}" id="card" class="card-section image">
                  <img class="card-product-image" src="https://content1.rozetka.com.ua/goods/images/big/364827001.jpg" alt="">
                </a>
                <div class="card-section">
                  <a href="{{route('product')}}" class="card-section-name" style="color: #000">
                    Xiphone 12 Pro Maxe <div class="card-section-name-cost">$175.00</div>
                  </a>
                  <h3 class="card-section-description">
                    Lorem ipsum dolor sit amet consectetur. Eleifend nec morbi tellus vitae leo nunc.
                  </h3>
                  <div class="card-section-stars">
                    <div class="star-box">
                    <img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star">
                    </div>
                    <div class="amout card-section-description">(121)</div>
                  </div>
                  <div class="card-section-add">
                    <img src="./dist/img/cart.svg" alt="">
                    Add to Cart
                  </div>
                </div>
              </div>
              <div class="card">
                <a href="{{route('product')}}" id="card" class="card-section image">
                  <img class="card-product-image" src="https://content1.rozetka.com.ua/goods/images/big/364827001.jpg" alt="">
                </a>
                <div class="card-section">
                  <a href="{{route('product')}}" class="card-section-name" style="color: #000">
                    Xiphone 11 Pro Maxe <div class="card-section-name-cost">$175.00</div>
                  </a>
                  <h3 class="card-section-description">
                    Lorem ipsum dolor sit amet consectetur. Eleifend nec morbi tellus vitae leo nunc.
                  </h3>
                  <div class="card-section-stars">
                    <div class="star-box">
                    <img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star">
                    </div>
                    <div class="amout card-section-description">(121)</div>
                  </div>
                  <div class="card-section-add">
                    <img src="./dist/img/cart.svg" alt="">
                    Add to Cart
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="recomend-section">
      <div class="recomend-section-container">
          <div class="recomend-section-container-box"></div>
          <div class="recomend-section-container-box"></div>
      </div>
      <div class="recomend-section-container">
          <div class="recomend-section-container-box lower"></div>
          <div class="recomend-section-container-box bigger"></div>
      </div>
    </div>

    @endif
    @if (request()->routeIs('product'))

    <div class="card-container" id="card">
        <div class="card-container-name">
        Specially <span class="purple-span">For </span> You
        </div>
        <div class="card-nav-container product">
          <button class="scroll-btn left-btn product">←</button>
          <button class="scroll-btn right-btn product">→</button>
        </div>
        <div class="card-container-section">
            <div class="card-content">
              <div class="card">
                <a href="{{route('product')}}" class="card-section image">
                    <img class="card-product-image" src="https://content1.rozetka.com.ua/goods/images/big/364623744.jpg" alt="">
                </a>
                <div class="card-section">
                  <a href="{{route('product')}}" class="card-section-name" style="color: #000">
                    Xiphone 14 Pro Maxe <div class="card-section-name-cost">$175.00</div>
                  </a>
                  <h3 class="card-section-description">
                    Lorem ipsum dolor sit amet consectetur. Eleifend nec morbi tellus vitae leo nunc.
                  </h3>
                  <div class="card-section-stars">
                    <div class="star-box">
                    <img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star">
                    </div>
                    <div class="amout card-section-description">(121)</div>
                  </div>
                  <div class="card-section-add">
                    <img src="./dist/img/cart.svg" alt="">
                    Add to Cart
                  </div>
                </div>
              </div>
              <div class="card">
                <a href="{{route('product')}}" id="card" class="card-section image">
                  <img class="card-product-image" src="https://content.rozetka.com.ua/goods/images/big/30873693.jpg" alt="">
                </a>
                <div class="card-section">
                  <a href="{{route('product')}}" class="card-section-name" style="color: #000">
                    Xiphone 13 Pro Maxe <div class="card-section-name-cost">$175.00</div>
                  </a>
                  <h3 class="card-section-description">
                    Lorem ipsum dolor sit amet consectetur. Eleifend nec morbi tellus vitae leo nunc.
                  </h3>
                  <div class="card-section-stars">
                    <div class="star-box">
                    <img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star">
                    </div>
                    <div class="amout card-section-description">(121)</div>
                  </div>
                  <div class="card-section-add">
                    <img src="./dist/img/cart.svg" alt="">
                    Add to Cart
                  </div>
                </div>
              </div>
              <div class="card">
                <a href="{{route('product')}}" id="card" class="card-section image">
                  <img class="card-product-image" src="https://content1.rozetka.com.ua/goods/images/big/364827001.jpg" alt="">
                </a>
                <div class="card-section">
                  <a href="{{route('product')}}" class="card-section-name" style="color: #000">
                    Xiphone 12 Pro Maxe <div class="card-section-name-cost">$175.00</div>
                  </a>
                  <h3 class="card-section-description">
                    Lorem ipsum dolor sit amet consectetur. Eleifend nec morbi tellus vitae leo nunc.
                  </h3>
                  <div class="card-section-stars">
                    <div class="star-box">
                    <img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star">
                    </div>
                    <div class="amout card-section-description">(121)</div>
                  </div>
                  <div class="card-section-add">
                    <img src="./dist/img/cart.svg" alt="">
                    Add to Cart
                  </div>
                </div>
              </div>
              <div class="card">
                <a href="{{route('product')}}" id="card" class="card-section image">
                  <img class="card-product-image" src="https://content1.rozetka.com.ua/goods/images/big/364827001.jpg" alt="">
                </a>
                <div class="card-section">
                  <a href="{{route('product')}}" class="card-section-name" style="color: #000">
                    Xiphone 11 Pro Maxe <div class="card-section-name-cost">$175.00</div>
                  </a>
                  <h3 class="card-section-description">
                    Lorem ipsum dolor sit amet consectetur. Eleifend nec morbi tellus vitae leo nunc.
                  </h3>
                  <div class="card-section-stars">
                    <div class="star-box">
                    <img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star">
                    </div>
                    <div class="amout card-section-description">(121)</div>
                  </div>
                  <div class="card-section-add">
                    <img src="./dist/img/cart.svg" alt="">
                    Add to Cart
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>

    @endif
    <!--Зробити інші секції з макета-->
    <!--Організувати базову відправку інформації покупця на пошту-->
    <!--Розібратись з зображеннями та їхньою відповідністю-->
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
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="{{ asset('dist/js/app.js') }}"></script>
    <script>
      AOS.init();
    </script>
</body>
</html>




