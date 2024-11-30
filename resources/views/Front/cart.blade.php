@extends('content.main')

@section('title', 'Cart')
@section('content')

<main class="send-section">
    <div class="cart-nav-name-section">
        <h2>Your Cart</h2>
        <a href="{{ route('home') }}#card" class="back-button product">←</a>
    </div>
    @if(count($cart) > 0)
    <div class="cart-products-container">
        @foreach($cart as $id => $item)
            <div class="cart-items">
                <div class="cart-item">
                    <a href="{{ route('product', ['id' => $id]) }}">
                        <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" class="cart-item-image">
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
                    <p name="quantity">Quantity: {{ $item['quantity'] }}</p>
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
        @if($discountCode)
            <p>Ваш код знижки: {{ $discountCode }}</p>
            <form action="{{ route('apply.discount') }}" method="POST">
                @csrf
                <button type="submit" id="discountcode-button" onclick="activateDiscount()">Активувати знижку</button>
            </form>
        @endif

        <!-- Форма для оформлення замовлення -->
        <form action="{{ route('order.store') }}" method="POST">
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
                <input type="text" name="customer_phone"  name="customer_phone" equired>
            </div>
            @foreach($cart as $item)
                <input type="hidden" name="product_name[]" value="{{ $item['name'] }}">
                <input type="hidden" name="quantity[]" value="{{ $item['quantity'] }}">
                <input type="hidden" name="price[]" value="{{ $item['price'] }}">
            @endforeach
            <button type="submit">Замовити</button>
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
