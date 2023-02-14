<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- Styles -->
    {{--    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet">--}}
    {{--    <link href="{{ asset('admin/css/material-dashboard.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('admin/css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/admin_dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/admin_navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/admin_content.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/admin_footer.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/index_category.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/category_edit.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/add_category.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/add-product.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/edit-product.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/admin_responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/admin-view-order.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/admin_view_user.css') }}" rel="stylesheet">

    {{--    icon navbar --}}
    <script src="https://kit.fontawesome.com/7d7d49f14e.js" crossorigin="anonymous"></script>



</head>
<body>

<div class="wrapper">
    @include('layouts.inc.sidebar')
    <div class="main-panel">
        @include('layouts.inc.adminnav')
        <div class="content">
            @yield('content')
        </div>
        @include('layouts.inc.adminfooter')
    </div>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(session('status'))
    <script>
        swal("{{ session('status') }}");
    </script>
@endif

@yield('scripts');

</body>
</html>
