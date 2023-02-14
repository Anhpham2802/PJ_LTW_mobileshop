    @extends('layouts.front')

    @section('title',$products->name)

    @section('content')
    <div class="container">
        <div class="top">
            <div class="link-product margin-bottom">
                <div>
                    <h6>
                        <a href="{{url('/') }}">
                            Home
                        </a> /
                        <a href="{{url('category') }}">
                            Category
                        </a> /
                        <a href="{{url('view-category/'.$products->category->name) }}">
                            {{ $products->category->name }}
                        </a> /
                        <a>{{ $products->name }} </a>
                </div>
            </div>
        </div>
    </div>
    <!-- ---------------------------------------------------------------------- -->

    <div class="container">
        <div class="product_data content-product">
            <div class=" product-info">
                <div class="product-img">
                    <img src="{{ asset('assets/uploads/products/'.$products->image) }}" alt="">
                </div>
                <!-- ------------------------- -->
                <div class="product-detail">
                    <div class="product-name margin-bottom">
                        <h2>
                            {{ $products->name }}
                            @if($products->trending == '1')
                            <label style="font-size: 16px;"
                                class="float-end badge bg-danger trending_tag"></label>Trending</label>
                            @endif
                        </h2>
                    </div>
                    <div class="price margin-bottom">
                        <label>Selling Price : <span style="color :red ; font-weight :800">{{ $products->selling_price
                                }}đ * </span></label>
                        <label><span style="color:#7f7f7f ; text-decoration:line-through; font-size:15px">{{
                                $products->original_price }}</span></label>
                        @php $ratenum = number_format($rating_value) @endphp
                    </div>
                    <div class="rating margin-bottom">
                        @for($i =1; $i<= $ratenum; $i++) <i class="fa fa-star checked"></i>
                            @endfor
                            @for( $j=$ratenum+1; $j <= 5; $j++) <i class="fa fa-star"></i>
                                @endfor
                                <span>
                                    @if( $ratings->count() > 0)
                                    {{ $ratings->count() }} Ratings
                                    @else
                                    No ratings
                                    @endif
                                </span>
                    </div>
                    <div class="describe margin-bottom">
                        {!! $products->small_description !!}
                    </div>
                    <div class="margin-bottom">
                        <div class="quantity margin-bottom">
                            <div><input type="hidden" value="{{ $products->id}}" class="prod_id"></div>
                            <div><label for="Quantity">Quantity</label></div>
                            <div class="input-group select-quantity">
                                <div><button style="width:20px;height:25px;"
                                        class="input-group-text decrement-btn">-</button></div>
                                <div><input type="text" name="quantity " value="1"
                                        style="width:80px;height:25px; text-align:center"
                                        class="form-control qty-input"></div>
                                <div><button style="width:20px;height:25px;"
                                        class="input-group-text increment-btn">+</button></div>
                            </div>
                            <div class="stock">
                                @if ($products->qty > 0)
                                <label>In stock</label>
                                @else
                                <label>Out of stock</label>
                                @endif
                            </div>
                        </div>
                        <div>
                            <br />
                            @if ($products->qty > 0)
                            <button class="add-to-cart addToCartBtn float-start" type="button" id="addToCartBtn">Add to
                                cart <i class="fa fa-shopping-cart"></i></button>
                            @endif
                            <button class="add-to-wishlist addToWishlist float-start" type="button"
                                id="addToWishList">Add to wishlist <i class="fa fa-heart"></i></button>
                        </div>

                    </div>
                    <div class="rating-modal margin-bottom ">
                        <form action="{{ url('/add-rating') }}" method="GET">
                            <div class="rating-modal-content">
                                @csrf
                                <div>
                                    <input type="hidden" name="product_id" value="{{ $products->id }}">
                                </div>
                                <div class="rating-modal-header">
                                    <div>
                                        <h4 class="rating-modal-title fs-5">Rate {{ $products->name }}</h4>
                                    </div>
                                </div>
                                <div class="rating-modal-body">
                                    <div class="rating-css">
                                        <div class="star-icon">
                                            @if($user_rating)
                                                @for($i =1; $i<= $user_rating->stars_rated; $i++)
                                                <input type="radio" value="{{$i}}" name="product_rating" checked
                                                    id="rating{{$i}}">
                                                <label for="rating{{$i}}" class="fa fa-star"></label>
                                                @endfor
                                                @for($j = $user_rating->stars_rated+1; $j<= 5; $j++) <input type="radio"
                                                    value="{{$j}}" name="product_rating" id="rating{{$j}}">
                                                    <label for="rating{{$j}}" class="fa fa-star"></label>
                                                @endfor
                                            @else
                                                    <input type="radio" value="1" name="product_rating" checked
                                                        id="rating1">
                                                    <label for="rating1"><i class="fa-solid fa-star"
                                                            style="font-size :35px"></i></label>
                                                    <input type="radio" value="2" name="product_rating" id="rating2">
                                                    <label for="rating2"><i class="fa-solid fa-star"
                                                            style="font-size :35px"></i></label>
                                                    <input type="radio" value="3" name="product_rating" id="rating3">
                                                    <label for="rating3"><i class="fa-solid fa-star"
                                                            style="font-size :35px"></i></label>
                                                    <input type="radio" value="4" name="product_rating" id="rating4">
                                                    <label for="rating4"><i class="fa-solid fa-star"
                                                            style="font-size :35px"></i></label>
                                                    <input type="radio" value="5" name="product_rating" id="rating5">
                                                    <label for="rating5"><i class="fa-solid fa-star"
                                                            style="font-size :35px"></i></label>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="rating-modal-footer">
                                    <button type="button" class="rating-modal-cancel"
                                        style=" padding:5px;background-color: rgb(86, 81, 81);color:#ffffff">Close</button>
                                    <button type="submit" class="rating-modal-submit"
                                        style="margin-left:20px; padding:5px;background-color: rgb(86, 81, 81);color:#ffffff">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ---------------------------------- -->
            <div class="description margin-bottom">
                <h3>Description</h3>
                <p>
                    {!! $products->description !!}
                </p>
            </div>
            <!-- ---------------------------------------- -->
            <div class="review margin-bottom">
                <div>
                    @foreach ($reviews as $item)
                    <div style="border: #6298ce 1px solid;padding: 7px;margin: 5px;">
                        <label for="">{{ $item->user->name .' '.$item->user->lname }}</label>
                        @if($item->user_id == Auth::id())
                        <a href="{{ url('edit-review/'.$products->slug.'/userreview') }}">edit</a>
                        @endif
                        <br>
                        @php
                        $rating = App\Models\Rating::where('prod_id',$products->id)->where('user_id',
                        $item->user->id)->first();
                        @endphp
                        @if($rating)
                        @php $user_rated = $rating->stars_rated @endphp
                        @for($i = 1; $i <= $user_rated; $i++) <i class="fa fa-star checked"></i>
                            @endfor
                            @for( $j = $user_rated + 1; $j <= 5; $j++) <i class="fa fa-star"></i>
                                @endfor
                                @endif
                                <small>Review on {{ $item->created_at->format('d M Y') }}</small>
                                <p>
                                    {{ $item->user_review }}
                                </p>
                    </div>
                    @endforeach
                </div>
                <div class="review-private">
                    <div class="rate-this-product">
                        <button class="rate-this-product btn btn-primary" type="button" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Rate this product
                        </button>
                    </div>
                    <div class="write-review">
                        <a href="{{ url('add-review/'.$products->slug.'/userreview') }}">
                            Write a review
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </div>

    @endsection