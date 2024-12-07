@extends('content.main')


@section('content')
<main class="main-container-product">
    <main class="product-section-footer">
        <div class="product-footer-nav-container">
            <ul class="breadcrumbs">
                @foreach ($breadcrumbs as $breadcrumb)
                    <li>
                        <a href="{{ $breadcrumb['url'] ?? '' }}">{{ $breadcrumb['name'] }}</a>
                    </li>
                    @if (!$loop->last)  
                        <div class="breadcrumb-arrow"> → </div> 
                    @endif
                @endforeach
            </ul>
            <div class="section-container">
                <div class="section">
                    <input type="checkbox" id="section1" checked>
                    <label for="section1" class="active">Все про товар</label>
                </div>
                <div class="section">
                    <input type="checkbox" id="section2">
                    <label for="section2">Характеристики</label>
                </div>
                <div class="section">
                    <input type="checkbox" id="section3">
                    <label for="section3">Відгуки</label>
                </div>
            </div>
        </div>
    </main>
    <div class="product-content">
        <div class="product-section" id="product-info">
            <div class="product-section-container photo">
                <a href="{{ route('home') }}#card" class="back-button product">←</a>
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="product-image">
            </div>
            <div class="product-section-container description">
                <a class="card-section-name" style="color: #000">
                    <div class="product-section-name">
                        {{ $product->name }}
                    </div>
                    <div class="product-section-name">
                        ${{ $product->price }}
                    </div>
                </a>
                <div class="product-config">
                    <h3 class="product-section-descrription" style="font-weight: 400;">{{ $product->description }}</h3>
                    <div class="configuration-section">
                        <h4 class="currency-config-options">Вбудована пам'ять:<span id="selected-color-memory-size" class="config-option-text">128Gb</span></h4>
                        <div class="config-options">
                            <div class="config-option active" data-config="128Gb">128Gb</div>
                            <div class="config-option" data-config="256Gb">256Gb</div>
                            <div class="config-option" data-config="512Gb">512Gb</div>
                        </div>
                    </div>
                    <div class="configuration-section">
                        <h4 class="currency-config-options">Колір: <span id="selected-color-name" class="config-option-text">Червоний</span></h4>
                        <div class="config-options">
                            <div class="config-box active" data-config="Червоний" style="background-color: red;" title="Червоний">
                            </div>
                            <div class="config-box" data-config="Синій" style="background-color: blue;" title="Синій">
                            </div>
                            <div class="config-box" data-config="Зелений" style="background-color: green;" title="Зелений">
                            </div>
                            <div class="config-box" data-config="Жовтий" style="background-color: yellow;" title="Жовтий">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-bottom-cantainer">
                    <div class="card-section-stars">
                        <div class="star-box">
                            <img src="./dist/img/star.svg" alt="" class="star">
                            <img src="./dist/img/star.svg" alt="" class="star">
                            <img src="./dist/img/star.svg" alt="" class="star">
                            <img src="./dist/img/star.svg" alt="" class="star">
                            <img src="./dist/img/star.svg" alt="" class="star">
                        </div>
                        <div class="amout card-section-description">(121)</div>
                    </div>
                    <a href="{{ route('review') }}" class="product-section-review">Залишити коментар</a>
                </div>
                <a href="{{ route('add.to.cart', $product->id) }}" class="card-section-add">
                    <img src="./dist/img/cart.svg" alt="">
                    Add to Cart
                </a>
                <div class="specification-main-container">
                    <div class="specification-section" id="productSpecificationHome" style="border: none">
                        <div class="product-specs limited">
                                {!! nl2br(
                                        preg_replace(
                                            [
                                                '/\"(.*?)\"/',                // подвійні лапки
                                                '/\*(.*?)\*/',                // одинарні лапки
                                                '/\`(.*?)\`/',                // зворотні лапки
                                                '/\/\/(.*?)\/\//',            // заголовок
                                                '/#/'                        // новий рядок
                                            ],
                                            [
                                            '<div class="product-spec">$1</div>',   // для подвійних лапок
                                            '<div class="right-text">$1</div>',     // для одинарних лапок
                                            '<div class="left-text">$1</div>',      // для зворотних лапок
                                            '<h1>$1</h1>',                         // для заголовка
                                            '<br>' 
                                            ],
                                            $product->full_description
                                        )
                                ) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="specification-section" id="product-specifications" style="display: none;">
            <a href="{{ route('home') }}#card" class="back-button product">←</a>
            <div class="product-specs second">
                {!! nl2br(
                    preg_replace(
                        [
                            '/\"(.*?)\"/',                // подвійні лапки
                            '/\*(.*?)\*/',                // одинарні лапки
                            '/\`(.*?)\`/',                // зворотні лапки
                            '/\/\/(.*?)\/\//',            // заголовок
                            '/#/'                        // новий рядок
                        ],
                        [
                        '<div class="product-spec">$1</div>',   // для подвійних лапок
                        '<div class="right-text">$1</div>',     // для одинарних лапок
                        '<div class="left-text">$1</div>',      // для зворотних лапок
                        '<h1>$1</h1>',                         // для заголовка
                        '<br>' 
                        ],
                        $product->full_description
                    )
                ) !!}
            </div>
        </div>

        <div class="review-section" id="product-reviews" style="display: none;">
            <a href="{{ route('home') }}#card" class="back-button product">←</a>
            <h2>Відгуки</h2>
        </div>
    </div>    
</main>

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
@endsection

