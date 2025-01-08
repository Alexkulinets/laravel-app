@extends('main.main')

@section('content')
<x-error-message />

<main class="send-section">
    <div class="cart-nav-name-section">
        <h2>Your Cart</h2>
        <a href="javascript:void(0);" onclick="history.back();" class="back-button product">←</a>
    </div>
    @if(count($cart) > 0)
    <div class="cart-products-container">
        @foreach($cart as $id => $item)
            <div class="cart-items">
                <div class="cart-item-image">
                    <a href="{{ route('product', ['name' => str_replace(' ', '-', $item['name'])]) }}">
                        <img src="{{ $item['image'][0] }}" alt="{{ $item['name'] }}" class="cart-item-image">
                    </a>
                </div>
                <div class="cart-item-details">
                    <p name="product_name">{{ $item['name'] }}</p>
                    <p name="price">
                        @if($item['price'] < $item['original_price'])
                            <del>${{ $item['original_price'] }}</del> 
                        @endif
                        <span>${{ $item['price'] }}</span> 
                    </p>
                    <form action="{{ route('cart.update') }}" method="POST" class="update-quantity-form">
                        @csrf
                        <label for="quantity-{{ $id }}">Quantity:</label>
                        <input type="hidden" name="id" value="{{ $id }}">
                        <input type="number" id="quantity-{{ $id }}" name="quantity" value="{{ $item['quantity'] }}" min="1" class="quantity-input">
                    </form>
                </div>
                <form action="{{ route('cart.remove') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $id }}">
                    <button type="submit" class="remove-item-button"><img src="./dist/img/Trash.svg" alt="" class="remove-button-image"></button>
                </form>
            </div>
        @endforeach
        <p class="cart-cost">Total: 
            ${{ array_sum(array_map(function($item) { return $item['price'] * $item['quantity']; }, $cart)) }}
        </p>
        @if(session('discount_applied'))
            <p>Знижка успішно активована!</p>
        @else
            @if($discountCode)
                <p>Ваш код знижки: {{ $discountCode }}</p>
                <form action="{{ route('apply.discount') }}" method="POST">
                    @csrf
                    <button type="submit" id="discountcode-button" onclick="activateDiscount()">Активувати знижку</button>
                </form>
            @endif
        @endif
        <form action="{{ route('order.store') }}" method="POST" id="order-form">
            @csrf
            <div class="form-group">
                <label for="customer_name">Ваше ім'я</label>
                <input type="text" id="customer_name" name="customer_name" required>
            </div>
            <div class="form-group">
                <label for="customer_email">Ваш email</label>
                <input type="email" id="customer_email" name="customer_email" required>
            </div>
            <div class="form-group">
                <label for="customer_phone">Ваш номер телефону</label>
                <input type="text" id="customer_phone" name="customer_phone" required>
            </div>
            <input type="hidden" name="product_name[]" value="{{ $item['name'] }}">
            <input type="hidden" name="quantity[]" value="{{ $item['quantity'] }}">
            <input type="hidden" name="price[]" value="{{ $item['price'] }}">
            <button type="submit" id="submitBtn">Замовити</button>
        </form>
    </div>
    <div class="cart-total">
        <a href="{{ route('clearCart') }}" class="btn btn-danger">Clear Cart</a>
    </div>
    @else
    <div class="empty-cart-message">
        <p>Your cart is empty.</p>
        <a href="{{ route('home') }}" class="btn btn-primary">Go to Shop</a>
    </div>
    @endif
</main>

@endsection
