@props(['product'])

<div class="card">
  <a href="{{ route('product', ['id' => $product->id]) }}" class="card-section image">
    <img src="{{ $product->image }}" class="card-product-image" alt="Product Image"/>
  </a>
  <div class="card-section">
      <a href="{{ route('product', ['id' => $product->id]) }}" class="card-section-name" style="color: #000">
          <div> {{ $product->name }} </div>
          <div>${{ $product->price }} </div>
      </a>
      <h3 class="card-section-description">
        <div> {{ $product->description }} </div>                
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
      <a href="{{route('product', ['id' => $product->id])}}" class="card-section-add" >
        <img src="./dist/img/cart.svg" alt="">
        Add to Cart
      </a>
  </div>
</div>