@extends('layouts.front')

@section('title')
    {{$category->name}}
@endsection

@section('content')
    <div class="category_home">
        <div class="container">
            <h6>
                <a href="{{url('/') }}" class="text_home">
                    Home
                </a> /
                <a href="{{url('category') }}" style="color:bisque">
                    Category
                </a> /
                <a> {{ $category->name }}</a>
            </h6>
        </div>
    </div>

    <div class="wrapper">
        <div class="container">
            <div>
                <div>
                    <h2 style="font-size:35px">{{$category->name}}</h2>
                    <div class="products2" style="margin-top: 20px">
                        @foreach ($products as $prod)
                            <div class="item">
                                <a href="{{ url('view-category/'.$category->slug.'/'.$prod->slug) }}">
                                    <img src="{{ asset('assets/uploads/products/'.$prod->image)}}" alt="Product image" class="product-info">
                                    <div>
                                        <h5 style="display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;">{{$prod->name}}</h5>
                                        <small class="float-start"><s>{{$prod->original_price}}₫</s></small>
                                        <h4 class="float-end">{{$prod->selling_price}}₫</h4>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection