@extends('layouts.app')
@section('content')
<div class="custom-container">
    <div class="row custom-row">
        <div class="col-md-8 custom-col">
            <div class="card custom-card">
                <div class="card-header custom-header">{{ __('Dashboard') }}</div>

                <div class="card-body custom-body">
                    @if (session('status'))
                        <div class="alert alert-success custom-alert" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
