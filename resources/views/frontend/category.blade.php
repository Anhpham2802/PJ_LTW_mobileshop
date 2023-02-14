@extends('layouts.front')

@section('title')
    Category
@endsection

@section('content')
    <div class="category_home">
        <div class="container">
            <h6>
                <a href="{{url('/') }}" class="text_home">
                    Home
                </a> /
                <a>
                    Category
                </a>
            </h6>
        </div>
    </div>
    <div class="wrapper">
        <div class="container">
            <div>
                <div>
                    <h2 class="all">All Categories</h2>
                    <div class="products">
                        @foreach ($category as $cate)
                            <div class="item">
                                <a href="{{ url('view-category/'.$cate->slug)}}">
                                    <div class="card-index-home">
                                        <img src="{{ asset('assets/uploads/category/'.$cate->image)}}"  alt="Category image">
                                        <div>
                                            <h5>{{$cate->name}}</h5>
                                            <p>
                                                {{ $cate->description }}
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
    </div>
@endsection
