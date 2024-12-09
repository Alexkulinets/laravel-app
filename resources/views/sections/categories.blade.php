@extends('main.main')
@section('content')
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
            <form action="{{ route('categories') }}" method="GET">
                <input class="search-input all-products" type="text" placeholder="Я шукаю..." name="search" id="search-input" value="{{ request()->input('search') }}">
                <button type="submit" style="display:none;"></button>
            </form>
        </div>
        <div class="categories products-section" id="categories">
          <div class="all-products-section-lines">
              @foreach($products as $product)
                  <x-categorys-products-items :product="$product" />
              @endforeach
          </div>
          <div class="pagination-container">
            {{ $products->links() }}
          </div>
        </div>
    </div>
  </div>
</div>
@endsection