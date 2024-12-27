@props(['category'])

<div class="categories-product-icon-container  {{ request('category_id') == $category->id ? 'active-category' : '' }}" >
    <div class="categories-box-text" style="font-size: 14px; font-weight: 400">
        <label style="display: flex; gap: 10px;">
            <div class="product-icons">
                @php
                    $imagePath = 'dist/categories-images/' . strtolower(str_replace(' ', '-', $category->title)) . '.svg';
                @endphp
                <img src="{{ file_exists(public_path($imagePath)) ? asset($imagePath) : asset('dist/categories-images/default-image-icon.svg') }}" alt="{{ $category->title }}">
            </div>
            {{ $category->title }}
            <input type="radio" name="category_id" value="{{ $category->id == 1 ? 'all-products' : $category->id }}" {{ request('category_id') == ($category->id == 1 ? 'all-products' : $category->id) ? 'checked' : '' }}>
        </label>
    </div>
</div>

@if ($category->children->isNotEmpty())
    <div class="child-container {{ in_array(request('category_id'), $category->children->pluck('id')->toArray()) ? 'visible' : 'hidden' }}">
        @foreach($category->children as $child)
            <div class="child-category" {{ request('category_id') == $category->id ? 'checked' : '' }}>
                <x-category-item :category="$child" />
            </div>
        @endforeach
    </div>
@endif
