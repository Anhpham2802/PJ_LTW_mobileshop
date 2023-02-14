@extends('layouts.front')

@section('title', "Write a Review")

@section('content')
    <div class="wrapper-review">
                <div class="card">
                    <div class="card-body">
                        @if ($verified_purchase->count() > 0)
                            <div><p style="font-size :18px;">Đánh giá sản phẩm</p></div>
                            <div class="product-review-top margin-top">
                                <div class="pr-img">
                                    <img src="{{ asset('assets/uploads/products/'.$product->image) }}" width="50px" heigth="40px" alt="">
                                </div>
                                <div>
                                    <h5>{{ $product->name }}</h5>
                                </div>
                            </div>
                            <div class="form-text margin-top">
                                <div class="form-body">
                                @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}" class="product_id">
                                    <textarea class="form-control form-review" name="user_review" rows="5" placeholder="Please leave a review"></textarea>
                                    <button type="submit" class="btn-submit btn-add-update-review"><font color="white"><b>Submit Review</b></font></button>
                                </div>
                            </div>
                           
                        @else
                            <div class="alert alert-danger ">
                                <h4 style="margin-bottom:15px">Bạn không đủ điều kiện để đánh giá sản phẩm này!</h4>
                                <p style="margin-bottom:15px">
                                Đối với mức độ đáng tin cậy của các bài đánh giá,
                                chỉ những khách hàng đã mua sản phẩm mới có thể viết bài đánh giá về sản phẩm.
                                </p>
                                <a href="{{ url('/') }}" class="btn btn-primary mt-3">Quay lại trang chủ</a>
                            </div>
                        @endif
                    </div>
                </div>
    </div>
@endsection