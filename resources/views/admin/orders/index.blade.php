@extends('layouts.admin');

@section('title')
    Orders
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="text-white">New Orders
                <a href="{{ 'order-history' }}" class="btn-order-history">Order History</a>
            </h4>
        </div>
        <div class="product-card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>Order Date</th>
                    <th>Tracking Number</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $item)
                    <tr>
                        <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                        <td>{{ $item->tracking_no }}</td>
                        <td>{{ $item->total_price }}</td>
                        <td>{{ $item->status == "0" ?'Pending' : 'completed' }}</td>
                        <td>
                            <a href="{{ url('admin/view-order/'.$item->id) }}" class="cate-btn btn-primary">View</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
