    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="{{ route('home') }}"">
                <img src="{{ asset('img/logo-ct.png') }}" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold text-white">Home</span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white bg-gradient-primary {{ request()->routeIs('dashboard.index') ? 'active' : '' }}"
                        href="{{ route('dashboard.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('dashboard.invoice_page') ? 'active' : '' }}"
                        href="{{ route('dashboard.invoice_page') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-symbols-outlined opacity-10">shopping_cart</i>
                        </div>
                        <span class="nav-link-text ms-1">Invoice</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('dashboard.fruit_page') ? 'active' : '' }}"
                        href="{{ route('dashboard.fruit_page') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-symbols-outlined opacity-10">nutrition</i>
                        </div>
                        <span class="nav-link-text ms-1">Fruit</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('dashboard.category_page') ? 'active' : '' }}"
                        href="{{ route('dashboard.category_page') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-symbols-outlined opacity-10">circles_ext</i>
                        </div>
                        <span class="nav-link-text ms-1">Fruit category</span>
                    </a>
                </li>

                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages
                    </h6>
                </li>
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </aside>
