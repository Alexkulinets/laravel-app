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
    @if (request()->routeIs('home'))       
    <div class="categories-container" id="categories">
        <div class="categories-section-container">
            <h1 class="categories-name">Categories</h1>
            <div class="all-categories">
                @foreach($categories as $category)
                    <x-category-item :category="$category" />
                @endforeach
            </div>
        </div>
        <div class="all-products-section-container">
            <div class="all-products-search-section">
              <a>
                <input class="search-input all-products" type="text" placeholder="Я шукаю..." id="search-input">
              </a>
            </div>
            <div class="categories products-section">
              <div class="all-products-section-lines">
                @foreach($products->whereNotIn('id', [1, 2, 3, 4]) as $product)
                    <x-categorys-products-items :product="$product" />
                @endforeach
              </div>
            </div>
        </div>
      </div>
    </div>
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
                @foreach($products->whereNotIn('id', [5, 6]) as $product)
                    <x-product-item :product="$product" />
                @endforeach
            </div>
        </div>
    </div>
    <div id="discount-popup" class="popup">
      <div class="popup-content">
        <button class="close-popup">×</button>
        <h2>Знижка на товар!</h2>
        <p>Отримайте знижку протягом наступної години!</p>
        <div class="timer" id="timer">60:00</div>
        <button class="btn-get-discount">Отримати знижку</button>
        <p id="discount-code" style="display:none;">Ваш код знижки: <span id="code"></span></p>
      </div>
    </div>



    @endif
    @if (request()->routeIs('product'))

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
                <a href="{{ route('product', ['id' => 1]) }}" class="card-section image" id="image-container-1"></a>
                <div class="card-section">
                    <a href="{{ route('product', ['id' => 1]) }}" class="card-section-name" style="color: #000">
                        <div id="text-container-1"></div>
                        <div id="cost-container-1"></div>
                    </a>
                    <h3 class="card-section-description">
                      <div id="desc-container-1"></div>                
                    </h3>
                    <div class="card-section-stars">
                        <div class="star-box">
                            <img src="./dist/img/star.svg" alt="" class="star">
                            <img src="./dist/img/star.svg" alt="" class="star">
                            <img src="./dist/img/star.svg" alt="" class="star">
                            <img src="./dist/img/star.svg" alt="" class="star">
                            <img src="./dist/img/star.svg" alt="" class="star">
                        </div>
                        <div class="amount card-section-description">(121)</div>
                    </div>
                    <a href="{{route('product', ['id' => 1])}}" class="card-section-add" >
                      <img src="./dist/img/cart.svg" alt="">
                      Add to Cart
                    </a>
                </div>
              </div>
              <div class="card">
                  <a href="{{ route('product', ['id' => 2]) }}" class="card-section image" id="image-container-2"></a>
                  <div class="card-section">
                      <a href="{{ route('product', ['id' => 2]) }}" class="card-section-name" style="color: #000">
                          <div id="text-container-2"></div>
                          <div id="cost-container-2"></div>
                      </a>
                      <h3 class="card-section-description">
                        <div id="desc-container-2"></div>                
                      </h3>
                      <div class="card-section-stars">
                          <div class="star-box">
                              <img src="./dist/img/star.svg" alt="" class="star">
                              <img src="./dist/img/star.svg" alt="" class="star">
                              <img src="./dist/img/star.svg" alt="" class="star">
                              <img src="./dist/img/star.svg" alt="" class="star">
                              <img src="./dist/img/star.svg" alt="" class="star">
                          </div>
                          <div class="amount card-section-description">(121)</div>
                      </div>
                      <a href="{{route('product', ['id' => 2])}}" class="card-section-add" >
                        <img src="./dist/img/cart.svg" alt="">
                        Add to Cart
                      </a>
                  </div>
              </div>
              <div class="card">
                  <a href="{{ route('product', ['id' => 3]) }}" class="card-section image" id="image-container-3"></a>
                  <div class="card-section">
                      <a href="{{ route('product', ['id' => 3]) }}" class="card-section-name" style="color: #000">
                          <div id="text-container-3"></div>
                          <div id="cost-container-3"></div>
                      </a>
                      <h3 class="card-section-description">
                        <div id="desc-container-3"></div>                
                      </h3>
                      <div class="card-section-stars">
                          <div class="star-box">
                              <img src="./dist/img/star.svg" alt="" class="star">
                              <img src="./dist/img/star.svg" alt="" class="star">
                              <img src="./dist/img/star.svg" alt="" class="star">
                              <img src="./dist/img/star.svg" alt="" class="star">
                              <img src="./dist/img/star.svg" alt="" class="star">
                          </div>
                          <div class="amount card-section-description">(121)</div>
                      </div>
                      <a href="{{route('product', ['id' => 3])}}" class="card-section-add" >
                        <img src="./dist/img/cart.svg" alt="">
                        Add to Cart
                      </a>
                  </div>
              </div>
              <div class="card">
                  <a href="{{ route('product', ['id' => 4]) }}" class="card-section image" id="image-container-4"></a>
                  <div class="card-section">
                      <a href="{{ route('product', ['id' => 4]) }}" class="card-section-name" style="color: #000">
                          <div id="text-container-4"></div>
                          <div id="cost-container-4"></div>
                      </a>
                      <h3 class="card-section-description">
                         <div id="desc-container-4"></div>                
                      </h3>
                      <div class="card-section-stars">
                          <div class="star-box">
                              <img src="./dist/img/star.svg" alt="" class="star">
                              <img src="./dist/img/star.svg" alt="" class="star">
                              <img src="./dist/img/star.svg" alt="" class="star">
                              <img src="./dist/img/star.svg" alt="" class="star">
                              <img src="./dist/img/star.svg" alt="" class="star">
                          </div>
                          <div class="amount card-section-description">(121)</div>
                      </div>
                      <a href="{{route('product', ['id' => 4])}}" class="card-section-add" >
                        <img src="./dist/img/cart.svg" alt="">
                        Add to Cart
                      </a>
                  </div>
              </div>
            </div>
        </div>
    </div>

    @endif
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



    <script type="module" src="{{ asset('dist/js/app.js') }}" ></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>
</body>
</html>



