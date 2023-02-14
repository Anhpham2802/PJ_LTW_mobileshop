@extends('layouts.admin');

@section('title')
    Order Details
@endsection

@section('content')
    <div class ="view-order-container">
        <div class="view-order-card">
            <div class="card-header">
                <h4 class="text-white">Order View
                    <a href="{{ url('orders') }}" class="btn btn-warning float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="order-details">
                        <h4>Shipping Details</h4>
                        <hr class="space_little">
                        <label for="">First Name</label>
                        <div class="border">{{ $orders->fname }}</div>
                        <label for="">Last Name</label>
                        <div class="border">{{ $orders->lname }}</div>
                        <label for="">Email</label>
                        <div class="border">{{ $orders->email }}</div>
                        <label for="">Contact No.</label>
                        <div class="border">{{ $orders->phone }}</div>
                        <label for="">Shipping Address</label>
                        <div class="border">
                            {{ $orders->address1 }}, <br>
                            {{ $orders->address2 }}, <br>
                            {{ $orders->city }}, <br>
                            {{ $orders->state }},
                            {{ $orders->country }},
                        </div>
                        <label for="">Zip Code</label>
                        <div class="border">{{ $orders->pincode }}</div>
                    </div>
                    <div>
                        <h4>Order Details</h4>
                        <hr>
                        <table>
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Image</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders->orderitems as $item)
                                <tr>
                                    <td>{{ $item->products->name }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>
                                        <img src="{{ asset('assets/uploads/products/'.$item->products->image) }}" width="50px" alt="Product Image">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <h4>Grand Total: <span class="float-end"> {{ $orders->total_price }}</span></h4>
                        <div>
                            <label class="order-status-label" for="">Order Status</label>
                            <form action="{{ url('update-order/'.$orders->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select class="form-select" name="order_status">
                                    <option {{ $orders->status == '0'? 'selected':'' }} value="0">Pending</option>
                                    <option {{ $orders->status == '1'? 'selected':'' }} value="1">Completed</option>
                                </select>
                                <button type="submit" class="cate-btn btn-primary float-end">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
