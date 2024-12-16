@props(['category'])

<div class="categories-product-icon-container">
    <div class="product-icons">
        @php
            $imagePath = 'dist/categories-images/' . strtolower(str_replace(' ', '-', $category->title)) . '.svg';
        @endphp
        <img src="{{ file_exists(public_path($imagePath)) ? asset($imagePath) : asset('dist/categories-images/default-image-icon.svg') }}" alt="{{ $category->title }}">
    </div>
    <h3 class="categories-box-text" style="font-size: 14px; font-weight: 400">
        <label>
            {{ $category->title }}
            <input type="radio" class="parent" name="category_id" value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'checked' : '' }}>
        </label>
    </h3>
</div>

@if ($category->children->isNotEmpty())
    <div class="child-container hidden">
        @foreach($category->children as $child)
            <div class="child-category hidden">
                <x-category-item :category="$child" />
            </div>
        @endforeach
    </div>
@endif
