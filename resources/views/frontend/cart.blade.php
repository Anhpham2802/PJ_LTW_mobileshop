@extends('layouts.front')

@section('title')
My Cart
@endsection

@section('content')
<div class="category_home">
    <div class="container">
        <h6>
            <a href="{{url('/') }}" class="text_home">
                Home
            </a> /
            <a>
                Cart
            </a>
        </h6>
    </div>
</div>
<h2 class="title_cart">All add to cart</h2>
<div class="container_cart">
    <div class="card_cart">
        @if($cartitems->count() >0)
        <div class="card-body">
            @php $total = 0; @endphp
            @foreach ($cartitems as $item)
            <div class="product_data_cart product_data">
                <div><img src="{{ asset('assets/uploads/products/' .$item->products->image) }}" height="70px" width="70px" alt="Image here"></div>
                <div style="width: 20%">
                    <h6>{{ $item->products->name }}</h6>
                </div>
                <div style="width: 20%">
                    <h6> Rs {{ $item->products->selling_price }}</h6>
                </div>

                <div style="margin: 12px;">
                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                    @if($item->products->qty >= $item->prod_qty)
                    <label for="Quantity">Quantity</label>
                    <div class="input-group_cart" style="width: 130px;">
                        <button class="changeQuantity decrement-btn">-</button>
                        <input type="text" name="quantity" class="qty-input qty-input_cart" value="{{ $item->prod_qty }}">
                        <button class="changeQuantity increment-btn">+</button>
                    </div>
                    @php $total += $item->products->selling_price * $item->prod_qty; @endphp
                    @else
                    <h6>Out of Stock</h6>
                    @endif
                </div>
                <div>
                    <button class="btn btn-danger delete-cart-item"> <i class="fa fa-trash"></i>Remove</button>
                </div>
            </div>
            @endforeach
        </div>
        <div class="card-footer">
            <h6> Total Price : RS {{ $total }}
                <a href="{{ url('checkout') }}" class="btn btn-outline-success float-end ">Proceed to checkout </a>
            </h6>
        </div>
        @else
        <div class="card-body text-center">
            <h2><i class="fa fa-shopping-cart"></i> Your Cart is empty</h2>
            <a href="{{ url('product') }}" class="btn btn-outline-primary float-end">Continue Shopping</a>
        </div>
        @endif
    </div>
</div>
@endsection