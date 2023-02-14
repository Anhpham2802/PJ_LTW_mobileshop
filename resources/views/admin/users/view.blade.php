@extends('layouts.admin')

@section('title')
    Account Details
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>User Details
                <a href="{{ url('users') }}" class="btn btn-primary">Back</a>
            </h4>
            <hr>
        </div>
        <div class="card-body">
            <div class="row-table">
                <div class="col-table">
                    <label class="field_name" for="">Role</label>
                    <div class="user_field">{{ $users->role_as == '0'? 'Users':'Admin' }}</div>
                </div>
                <div class="col-table">
                    <label class="field_name" for="">Name</label>
                    <div class="user_field">{{ $users->name }}</div>
                </div>
                <div class="col-table">
                    <label class="field_name" for="">Last Name</label>
                    <div class="user_field">{{ $users->lname }}</div>
                </div>
                <div class="col-table">
                    <label class="field_name" for="">Email</label>
                    <div class="user_field">{{ $users->email }}</div>
                </div>
                <div class="col-table">
                    <label class="field_name" for="">Phone</label>
                    <div class="user_field">{{ $users->phone }}</div>
                </div>
                <div class="col-table">
                    <label class="field_name" for="">Address 1</label>
                    <div class="user_field">{{ $users->address1 }}</div>
                </div>
                <div class="col-table">
                    <label class="field_name" for="">Address 2</label>
                    <div class="user_field">{{ $users->address2 }}</div>
                </div>
                <div class="col-table">
                    <label class="field_name" for="">City</label>
                    <div class="user_field">{{ $users->city }}</div>
                </div>
                <div class="col-table">
                    <label class="field_name" for="">State</label>
                    <div class="user_field">{{ $users->state }}</div>
                </div>
                <div class="col-table">
                    <label class="field_name" for="">Country</label>
                    <div class="user_field">{{ $users->country }}</div>
                </div>
                <div class="col-table">
                    <label class="field_name" for="">Pin Code</label>
                    <div class="user_field">{{ $users->pincode }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
