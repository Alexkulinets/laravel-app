@extends('content.main')
@section('content')
<main class="home-section">
    <div class="home-section-container">
        <div class="home-grab-section">
            <span class="home-sec grab">Grab</span>
            <div class="discount-box">50%</div>
        </div>
        <div class="home-section-top-left">
            <span class="home-sec">Off Smartphone</span>
            <span class="home-sec">Collection</span>
        </div>
        <div class="home-bottom-section">
            <div class="home-section-bottom-left">
                <div class="home-sec-bottom-left-name">Lorem ipsum dolor sit amet consectetur. Eleifend nec morbi tellus vitae leo nunc.</div>
                <div class="home-sec-bottom-left-image-box">
                    <img  src="./dist/img/home_section_phone_image.png" alt="">
                    <h2 class="image-box-name">
                        Xiphone 14 
                        Edition
                    </h2>
                </div>
            </div>
        </div>
        <div class="home-image-section">
            <img class="home-image-iphone" src="./dist/img/iphone-home-image.png" alt="" data-aos="fade-up" data-aos-duration="800">
        </div>
    </div>
</main>

<div class="categories-container" id="categories">
    <div class="categories-section-container">
        <h1 class="categories-name">Categories</h1>
        <div class="all-categories">
            @foreach($categories as $category)
                <x-category-item :category="$category" />
            @endforeach
        </div>
        <div class="price-filter">
            <div for="priceRange">Ціна: <span id="priceValue">2000</span> $</div>
            <div class="price-range-display">
                <input type="number" id="minPriceInput" name="min_price" value="0" min="0" max="2000" step="1" />— 
                <input type="number" id="maxPriceInput" name="max_price" value="2000" min="0" max="2000" step="1" />
            </div>
            <div class="range-slider">
                <input type="range" id="priceRange" min="0" max="2000" value="2000" step="1" class="slider" />
            </div>
        </div>
    </div>
    <div class="all-products-section-container">
        <div class="all-products-search-section">
          <a>
            <input class="search-input all-products" type="text" placeholder="Я шукаю..." id="search-input">
          </a>
        </div>
        <div class="categories products-section" id="categories">
          <div class="all-products-section-lines">
            @foreach($products->whereNotIn('id', [1, 2, 3]) as $product)
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
            @foreach($products as $product)
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
@endsection