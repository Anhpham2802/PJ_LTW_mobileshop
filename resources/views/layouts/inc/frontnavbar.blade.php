<nav class="navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">HOME</a>
        <div class="search-bar">
            <form action="{{ url('searchproduct') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input type="search" id="search_product" class="location-change" name="product_name" require placeholder="Search Product" aria-describedby="basic-addon1">
                    <button type="submit" class="input-group-text"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
        <!-- <button class="navbar-toggler" type="button">
          <span class="navbar-toggler-icon"></span>
        </button> -->
        <div id="navbarNav">
            <ul class="navbarNav">
                <li><a class="nav-link" href="{{ url('category') }}">Categories</a></li>
                <li><a class="nav-link" href="{{ url('product') }}">Products</a></li>
                <li>
                    <a class="nav-link" href="{{ url('cart') }}">Cart
                        <span class="badge badge-pill bg-primary cart-count">0</span>
                    </a>
                </li>

                <li><a class="nav-link" href="{{ url('wishlist') }}">Wishlist
                        <span class="badge badge-pill bg-success wishlist-count">0</span>
                    </a></li>
                @guest
                    @if(Route::has('login'))
                        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    @endif
            </ul>
        </div>
    </div>

    @else
        <div>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item" href="{{ url('my-orders') }}">
                            My Orders
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ url('profile') }}">
                            My Profile
                        </a>
                    </li>
                    <li style="margin-right: 45px;">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Log out') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>

                </ul>
            </li>
        </div>

        @endguest
        </ul>

        </div>
        <div id="toolbar" class="bar-block toolbar-black toolbar-hide hide-large hide-medium toolbar-top" style="margin-top:46px">
            <a href="{{ url('category') }}" class="bar-item toolbar-button padding-large" onclick="myFunction()">Categories</a>
            <a href="{{ url('product') }}" class="bar-item toolbar-button padding-large" onclick="myFunction()">Products</a>
            <a href="{{ url('cart') }}" class="bar-item toolbar-button padding-large" onclick="myFunction()">Cart</a>
            <a href="{{ url('wishlist') }}" class="bar-item toolbar-button padding-large" onclick="myFunction()">Wishlist</a>
            @guest
                @if(Route::has('login'))
                    <a href="{{ route('login') }}" class="bar-item toolbar-button padding-large">{{ __('Login') }}</a>
                @endif
            @else
                <a href="{{ url('my-orders') }}" class="bar-item toolbar-button padding-large" onclick="myFunction()">My orders</a>
                <a href="{{ url('profile') }}" class="bar-item toolbar-button padding-large" onclick="myFunction()">Profile</a>
                <a class="bar-item toolbar-button padding-large" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="margin-right: 45px;">
                    {{ __('Log out') }}
                </a>
            @endguest
        </div>
        <a href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu" class="menu_onclick"><i class="fa fa-bars"></i></a>

</nav>
