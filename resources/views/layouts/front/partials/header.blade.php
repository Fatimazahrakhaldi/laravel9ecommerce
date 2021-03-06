<header class="section-header">
    <section class="header-main">
        <div class="container">
            <div class="row gy-3 align-items-center">
                <div class="col-lg-2 col-sm-4 col-4">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('images/logo_h&f.png') }}" height="40" class="logo">
                    </a>
                    <!-- brand end.// -->
                </div>
                <div class="order-lg-last col-lg-5 col-sm-8 col-8">
                    <div class="float-end">
                        <div class="widgets-wrap d-xl-flex">
                            <div class="widget-header ms-2">
                                @if (Route::has('login'))
                                    @auth
                                        @if (Auth::user()->utype === 'ADM')
                                            <a href="#" class="icon icon-sm rounded-circle bg-gray-200" role="button"
                                                data-bs-toggle="dropdown">
                                                <i class="fa fa-user"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end" data-bs-popper="none">
                                                <li> <a class="dropdown-item"
                                                        href="{{ route('admin.dashboard') }}">Dashboard</a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf
                                                        <button type="submit" class="dropdown-item"><i
                                                                class="fas fa-sign-out-alt"></i>{{ __('Log Out') }}</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        @else
                                            <a href="#" class="icon icon-sm rounded-circle bg-gray-200" role="button"
                                                data-bs-toggle="dropdown">
                                                <i class="fa fa-user"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-end" data-bs-popper="none">
                                                <li> <a class="dropdown-item"
                                                        href="{{ route('user.dashboard') }}">Dashboard</a>
                                                </li>
                                                <li> <a class="dropdown-item"
                                                        href="{{ url('profile/account') }}">Profile</a>
                                                </li>
                                                <li> <a class="dropdown-item" href="{{ url('profile/setting') }}">Account
                                                        Settings</a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <form method="POST" action="{{ route('logout') }}">
                                                        @csrf
                                                        <button type="submit" class="dropdown-item"><i
                                                                class="fas fa-sign-out-alt"></i>{{ __('Log Out') }}</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        @endif
                                    @else
                                        <a href="#" class="icon icon-sm rounded-circle bg-gray-200" role="button"
                                            data-bs-toggle="dropdown">
                                            <i class="fa fa-user"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end" data-bs-popper="none">
                                            <li> <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                                            </li>
                                            @if (Route::has('register'))
                                                <li> <a class="dropdown-item" href="{{ route('register') }}">Register
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    @endauth
                                @endif
                            </div>
                            @livewire('wishlist-count-component')
                            @livewire('cart-count-component')
                        </div>
                    </div>
                </div> <!-- col end.// -->
                <div class="col-lg-5 col-md-12 col-12">

                    @livewire('header-search-component')

                </div> <!-- col end.// -->
            </div> <!-- row end.// -->
        </div> <!-- container end.// -->
    </section> <!-- header-main end.// -->

    <nav class="navbar navbar-light bg-white border-top navbar-expand-lg">
        <div class="container">
            <button class="navbar-toggler border collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbar_main" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse" id="navbar_main" style="">

                @include('layouts.front.partials.nav')


            </div> <!-- collapse end.// -->
        </div> <!-- container end.// -->
    </nav> <!-- navbar end.// -->
</header>
