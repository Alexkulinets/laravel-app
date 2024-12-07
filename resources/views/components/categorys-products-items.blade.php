@props(['product'])

<div class="all-products-products-section" data-price="{{ $product->price }}">
  <div class="card all-products">
    <a href="{{ route('product', ['id' => $product->id]) }}" class="card-section image all-products">
      <img src="{{ $product->image }}" class="product-image" alt="Product Image"/>
    </a>
    <div class="card-section all-products">
      <a href="{{ route('product', ['id' => $product->id]) }}" class="card-section-name all-products" style="color: #000">
        <div>{{ $product->name }}</div>
        <div class="product-price">${{ $product->price }}</div>
      </a>
      <h3 class="card-section-description all-products">
        {{ $product->description }}
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
      <a href="{{ route('product', ['id' => $product->id]) }}" class="card-section-add all-products">
        <img src="./dist/img/cart.svg" alt="">
        Add to Cart
      </a>
    </div>
  </div>
</div>