@extends('layouts.front')

@section('title')
    Welcome to my shop
@endsection

@section('content')
    @include('layouts.inc.slider')

    <div class="wrapper">
        <div class="container">
            <div>
                <h2 class="all">Featured Products</h2>
                <h6 class="view_all">
                    <a href="{{ url('/product') }}" class="float-end">
                        All Product
                    </a>
                </h6>
                <div class="products">
                    @foreach ($featured_products as $prod)
                        <div class="item">
                            <div style="box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);">
                                <div style="padding: 20px; overflow:hidden;">
                                    <a href="{{ url('view-category/'.$prod->category->slug.'/'.$prod->slug)}}">
                                            <img src="{{ asset('assets/uploads/products/'.$prod->image)}}"  alt="Product image">
                                            <h5 style="display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;padding-top: 10px;">{{$prod->name}}</h5>
                                            <small class="float-start"><s>{{$prod->original_price}}</s></small>
                                            <h5 class="float-end">{{ $prod->selling_price }}</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="wrapper">
        <div class="container">
            <div>
                <h2 class="all">Trending category</h2>
                <h6 class="view_all">
                    <a href="{{ url('/category') }}" class="float-end">
                        All Category
                    </a>
                </h6>
                <div class="products">
                    @foreach ($trending_category as $trencate)
                        <div class="item">
                            <a href="{{ url('view-category/'.$trencate->slug)}}">
                                <div class="card-index-home">
                                    <center><img src="{{ asset('assets/uploads/category/'.$trencate->image)}}"  alt="Category image"></center>
                                    <div>
                                        <h5>{{$trencate->name}}</h5>
                                        <p>
                                            {{ $trencate->description }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
