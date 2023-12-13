<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @livewireStyles
</head>
<body>
    <div class="sub-header">
        <nav>
            <img src="images/logo_Mesa de trabajo 1 copia 2.png" alt="logo">
            <h1 class="title">Online Food Order</h1>
            <div class="nav-bar" id="navbar">
                <ul>
                    <li class="search-bar">
                        <form action="{{url('search')}}" method='GET' role='search'>
                            <li>
                                <input class="search" type="search" placeholder=" Search Food " name="search" value= '{{ Request::get("search") }}'>
                                <button class="btn btn-sm" type='submit'>
                                    Search
                                </button>
                            </li>
                        </form>
                    </li>
                    <li><a href="{{ url('/profile')}}"> Profile </a></li>
                    <li><a href="{{ url('/orders')}}"> Order </a></li>
                    <li><a href="{{ url('/cart')}}">Cart</a></li>
                    <li><a href="{{ url('/wishlist')}}"> Wishlist </a></li>
                    <li><a href="{{ url('/collections')}}"> Categories </a></li>
                    <li><a href="{{ url('/popular-products')}}"> Popular </a></li>
                    
                    <li>
                        <div>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                <button class="btn btn-sm">{{ __('Logout') }}</button>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    @livewireScripts
</body>
</html>


