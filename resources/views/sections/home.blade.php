@extends('main.main')

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
                    <img  src="./dist/main-images/home_section_phone_image.png" alt="">
                    <h2 class="image-box-name">
                        Xiphone 14 
                        Edition
                    </h2>
                </div>
            </div>
        </div>
        <div class="home-image-section">
            <img class="home-image-iphone" src="./dist/main-images/iphone-home-image.png" alt="" data-aos="fade-up" data-aos-duration="800">
        </div>
    </div>
</main>
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
<slider class="card-container" id="card">
    <div class="card-container-name">
        <span class="purple-span">Best items</span> for you!
    </div>
    <x-products-slider :products="$products" />
</slider>

<x-discount-popup />
@endsection