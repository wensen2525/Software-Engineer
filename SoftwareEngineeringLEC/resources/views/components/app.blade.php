<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'KOSUPLAY') }}</title>

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>
<body>
    <div id="app">

        <nav class="sticky-top p-0 m-0 navbar navbar-expand-md navbar-dark shadow-sm" style="background: #121212;">
            <div class="container ">
                <a class="navbar-brand navbar-logo col-2" href="{{ url('/') }}">
                    {{ config('app.name', 'KOSUPLAY') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="font-family: 'Oswald'">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->

                        <!-- Authentication Links -->
                        @guest
                        <ul class="navbar-nav ms-auto">
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        </ul>
                        @else
                        <ul class="navbar-nav d-flex col-12 justify-content-between">
                              <div class="d-flex justify-content-center align-items-center gap-5">
                                    <li><a href="{{ route('home') }}" class="p-0 m-0 text-decoration-none text-white">Home</a></li>
                                    <li><a href="{{ route('products.index') }}" class="p-0 m-0 text-decoration-none text-white">Product</a></li>
                                    <li><a href="{{ route('orders.index') }}" class="p-0 m-0 text-decoration-none text-white">Your Orders</a></li>
                                    {{-- <li><a href="{{ route('carts.index') }}" class="p-0 m-0 text-decoration-none text-white">Cart</a></li> --}}
                              </div>
                              
                              <li class="nav-item dropdown">
                                    <div class="d-flex gap-3 align-items-center">
                                        <form class="d-none d-sm-none d-lg-flex" role="search">
                                            <input class="form-control me-3 " style="width: 300px" type="search" placeholder="Search" aria-label="Search">
                                        </form>
                                        <a href="{{ route('carts.index') }}" style="color: white;">
                                                <i class="bi bi-cart3" style="font-size: 30px;"></i>
                                        </a>
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle d-lg-block d-flex d-sm-flex justify-content-center align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                            </a>
                                            <a class="dropdown-item" href="{{ url('/profile') }}">
                                            {{ __('Profile') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                            </form>
                                        </div>
                                        
                                    </div>
                              </li>
                        </ul>
                        @endguest
                </div>
            </div>
        </nav>

        <main>
            {{ $slot }}
        </main>

        <footer class="py-4" style="background: #121212;">
            <div class="container" style="margin-top: 10vw;">
                  <div class="row col-12">
                        <div class="row col-9">
                              <div class="col-12">
                                    <div class="d-flex gap-5 mx-5 mb-3">
                                          <div class="d-flex flex-column">
                                                <p class="text-white" style="font-weight: 600;">Menu</p>
                                                <a class="text-white mb-1 text-decoration-none" style="font-weight: 400;" href="{{ route('home') }}">Home</a>
                                                <a class="text-white mb-1 text-decoration-none" style="font-weight: 400;" href="{{ route('products.index') }}">Product</a>
                                                <a class="text-white mb-1 text-decoration-none" style="font-weight: 400;" href="{{ route('orders.index') }}">My Order</a>
                                                <a class="text-white mb-1 text-decoration-none" style="font-weight: 400;" href="{{ route('carts.index') }}">Cart</a>
                                          </div>

                                          <div class="d-flex flex-column">
                                                <p class="text-white" style="font-weight: 600;">Social Media</p>
                                                <a class="text-white mb-1 text-decoration-none" style="font-weight: 400;" href="https://id-id.facebook.com/">Facebook</a>
                                                <a class="text-white mb-1 text-decoration-none" style="font-weight: 400;" href="https://www.instagram.com/">Instagram</a>
                                                <a class="text-white mb-1 text-decoration-none" style="font-weight: 400;" href="https://twitter.com/">Twitter</a>
                                          </div>

                                          <div class="d-flex flex-column">
                                                <p class="text-white" style="font-weight: 600;">Connect with Us</p>
                                                <a class="text-white mb-1 text-decoration-none" style="font-weight: 400;">0986-8762</a>
                                                <a class="text-white mb-1 text-decoration-none" style="font-weight: 400;">Hello@kosuplay.com</a>
                                          </div>
                                    </div>
                              </div>
                        </div>
                        
                        <div class="col-3 d-flex justify-content-start flex-column">
                              <div class="d-flex flex-column justify-content-center">
                                    <a href="{{ route('home') }}" style="letter-spacing: -0.125rem;font-size: 40px; font-family: 'Oswald'; text-decoration: none; color: white;">
                                          KOSUPLAY
                                    </a>
                                    <p class="text-white pt-2">© Copyright - KOSUPLAY Property.</p>
                              </div>
                        </div>
                        
                  </div>
            </div>
            
            
        </footer>
    </div>
</body>
</html>