@extends('layouts.admin')

@section('title')
    Account
@endsection

@section('content')
    <div class="navbar">
        <div class="card-header">
            <h4>Register Users</h4>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $item -> id }}</td>
                            <td>{{ $item -> name }}</td>
                            <td>{{ $item -> email }}</td>
                            <td>{{ $item -> phone }}</td>
                            <td>{{ $item -> role_as == '0'? 'Users':'Admin' }}</td>
                            <td>
                                <a href="{{ url('view-user/'.$item->id) }}" class="cate-btn btn-primary">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
