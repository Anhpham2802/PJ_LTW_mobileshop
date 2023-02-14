<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>


    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/index_home.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/fontnav_style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/profile_style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/order_index.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/view-order-detail.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/view_cart_home.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/product_view.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/checkout_order.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/review-index.css')}}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    {{-- Font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        a {
            text-decoration: none !important;
        }
    </style>

</head>

<body>

    @include('layouts.inc.frontnavbar')
    <div class="content">
        @yield('content')
    </div>

    <div class="whatapp-chat">
        <img src="{{ asset('assets/images/test.png') }}" alt="whatapp-logo" heigth="60px" width="60px">
        </a>
    </div>

    <script>
        var availableTags = [];

        fetch('/product-list')
            .then(response => response.json())
            .then(data => {
                console.log(data);
                startAutoComplete(data);
            });

        function startAutoComplete(availableTags) {
            const searchProduct = document.getElementById("search_product");
            searchProduct.setAttribute("autocomplete", "off");

            const source = [];
            searchProduct.addEventListener("input", function() {
                const searchValue = this.value;
                const suggestions = availableTags.filter(function(tag) {
                    return tag.toLowerCase().indexOf(searchValue.toLowerCase()) > -1;
                });
                console.log(suggestions);
            });
        }
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if(session('status'))
    <script>
        swal("{{ session('status') }}");
    </script>
    @endif
    <script src="https://kit.fontawesome.com/f1f646c5e0.js" crossorigin="anonymous"></script>
    @yield('scripts')

    <script src="{{ asset('frontend/js/custom.js')}}"></script>
    <script>
        function myFunction() {
            var x = document.getElementById("toolbar");
            if (x.className.indexOf("toolbar-show") == -1) {
                x.className += " toolbar-show";
            } else {
                x.className = x.className.replace(" toolbar-show", "");
            }
        }
    </script>
    @include('layouts.inc.footer')
</body>

</html>