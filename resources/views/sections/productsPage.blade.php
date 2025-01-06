@extends('main.main')
@section('content')
<x-error-message />

<main class="main-categories-container">
    <div class="categories-container" id="categories">
        <div class="categories-section-container">
            <div class="categories-name-nav">
                <h1 class="categories-name">Categories<div class="close">×</div></h1>
            </div>
            <div class="all-categories">
                <form method="GET" action="{{ route('filter.products') }}">
                @foreach($categories as $category)
                    <x-category-item :category="$category"/>
                @endforeach
                <div class="price-filter">
                    <label for="priceRange">
                        Price: <span id="priceValue" data-max-price="{{ $maxPrice }}">{{ $maxPrice }}</span> $
                    </label>
                    <div class="price-range-display">
                        <input type="number" id="minPriceInput" name="min_price" min="0" step="1" value="0" />
                        —
                        <input type="number" id="maxPriceInput" name="max_price" min="0" step="1" value="{{ $maxPrice }}" />
                    </div>
                    <div class="range-slider">
                        <input type="range" id="priceRange" min="0" max="{{ $maxPrice }}" step="1" class="slider" value="{{ $maxPrice }}" />
                    </div>
                    <button type="submit" class="search-button">Apply</button>
                </div>
            </div>
        </div>
        <div class="all-products-section-container">
            <div class="search-nav-bar">
                <div id="toggleButton" class="categories-button-container">
                    <img class="categories-button" src="{{ asset('dist/categories-images/all-products.svg') }}" alt="">
                </div>
                <div class="all-products-search-section">
                    <div class="search-container" style="width: 100%">
                        <input class="search-input all-products" type="text" placeholder="Я шукаю..." id="search-input" name="search" value="{{ request('search') }}"/>
                        <button type="submit" class="search-button">Search</button>
                    </div>
                </div>
            </div>
            </form>
            <div class="categories products-section" id="categories">
                <div class="all-products-center-container">
                    <div class="all-products-section-lines">
                        @forelse($products as $product)
                            <x-products-items :product="$product" />
                        @empty
                    </div>
                </div>
                <p class="no-products">No products :(</p>
                @endforelse
            </div>
            <div class="pagination-container">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</main>

<x-discount-popup />
@endsection

