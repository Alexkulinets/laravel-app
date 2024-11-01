@extends('content.main')

@section('title', 'Product')
@section('content')
<main class="product-section">
    <div class="product-section-container product-image">
        <a href="{{ route('home') }}#card" class="back-button product">←</a>
        <img src="https://content1.rozetka.com.ua/goods/images/big/364623744.jpg" alt="iPhone 15" class="product-image">
    </div>
    <div class="product-section-container description">
        <h1 class="product-section-name">Xiphone 14 Pro Max </h1>
        <h3 class="product-section-descrription" style="font-weight: 400;">Lorem ipsum dolor sit amet consectetur. Eleifend nec morbi tellus vitae leo nunc.</h3>
        
        
        <div class="product-bottom-cantainer">
        <div class="card-section-stars">
            <div class="star-box">
                <img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star"><img src="./dist/img/star.svg" alt="" class="star">
            </div>
            <div class="amout card-section-description">(121)</div>
        </div>
        <a href="{{ route('review') }}" class="product-section-review">Залишити коментар</a>
        </div>
        <div class="card-section-add">
                    <img src="./dist/img/cart.svg" alt="">
                    Add to Cart
        </div>
    </div>
</main>
@endsection
