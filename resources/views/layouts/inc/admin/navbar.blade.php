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
                    <li><a href="{{ url('admin/dashboard/profiledetails')}}">User details</a></li>
                    <li><a href="{{ url('admin/orders')}}">Orders</a></li>
                    <li><a href="{{ url('admin/category')}}">Food-Category</a></li>
                    <li><a href="{{ url('admin/products')}}">Food-Menu</a></li>
                    <li><a href="{{ url('/wallet/admin_balance')}}">Admin-Wallet</a></li>
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

    @stack('script')
</body>
</html>
