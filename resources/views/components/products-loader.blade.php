<div> 
    <div class="all-products-section-lines">
        @forelse($products as $product)
            <x-products-items :product="$product" />
        @empty
            <p class="no-products">Продукти не знайдено :(</p>
        @endforelse
    </div>
    @if(method_exists($products, 'links'))
        <div class="pagination-container">
            {{ $products->links() }}
        </div>
    @endif
</div>