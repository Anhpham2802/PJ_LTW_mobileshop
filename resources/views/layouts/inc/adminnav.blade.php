<!-- Navbar -->
<nav class="header-navbar">
    <div class="nav-container">
        <div class="navbar-header">
            <a class="navbar-brand" href="javascript:;">Dashboard</a>
        </div>

        <div class="collapse navbar-collapse">
            <form class="navbar-form">
                <div class="input-group">
                    <input type="text" value="" class="search-form-control" placeholder="Search...">
                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                    </button>
                </div>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="javascript:;">
                        <i class="material-icons">dashboard</i>
                    </a>
                </li>
                <li class="header-nav-item">
                    <a class="header-nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">notifications</i>
                    </a>
                </li>
                <li class="nav-item person-dropdown">
                    <i class="material-icons">person</i>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Log out') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
            <div class="icon-navbar-list">
                <i class="fa-solid fa-list"></i>
            </div>
        </div>
    </div>
</nav>
<!-- End Navbar -->
