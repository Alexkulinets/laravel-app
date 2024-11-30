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
    @endsection