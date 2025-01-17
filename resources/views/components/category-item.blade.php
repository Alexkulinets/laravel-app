@props(['category'])

<div class="categories-product-icon-container {{ request('categoryTitle') == $category->title ? 'active-category' : '' }}">
    <div class="categories-box-text" style="font-size: 14px; font-weight: 400">
        <label style="display: flex; gap: 10px;">
            <div class="product-icons">
                @php
                    $imagePath = 'dist/categories-images/' . strtolower(str_replace(' ', '-', $category->title)) . '.svg';
                @endphp
                <img src="{{ file_exists(public_path($imagePath)) ? asset($imagePath) : asset('dist/categories-images/default-image-icon.svg') }}" alt="{{ $category->title }}">
            </div>
            {{ $category->title }}
            <input type="radio" name="categoryTitle" value="{{ $category->title == 'All Products' ? 'All products' : $category->title }}">
        </label>
    </div>
</div>

@if ($category->children->isNotEmpty())
    <div class="child-container {{ in_array(request('categoryTitle'), $category->children->pluck('title')->toArray()) ? 'visible' : 'hidden' }}">
        @foreach($category->children as $child)
            <div class="child-category">
                <x-category-item :category="$child" />
            </div>
        @endforeach
    </div>
@endif
