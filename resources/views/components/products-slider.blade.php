<div class="card-nav-container">
    <button class="scroll-btn left-btn">←</button>
    <button class="scroll-btn right-btn">→</button>
</div>
<div class="card-container-section">
    <div class="card-content">
        @foreach($products as $product)
            <x-products-items :product="$product" />
        @endforeach
    </div>
</div>