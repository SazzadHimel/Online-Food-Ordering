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
    <div class="header">
        <nav>
            <!-- <div> -->
                <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> -->
                <img src="img\logo_Mesa de trabajo 1 copia 2.png">
                <h1 class="title">Online Food Order</h1>
                <div class="nav-bar" id="navbar">
                    
                    <!-- Left Side Of Navbar -->
                    <ul>
                        @guest
                            @if (Route::has('login'))
                                <li>
                                    <a href="{{ route('login') }}"><button class="btn">{{ __('Login') }}</button></a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li>
                                    <a  href="{{ route('register') }}"><button class="btn">{{ __('Register') }}</button></a>
                                </li>
                            @endif
                        @else
                            <a href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                            </a>
                            <li>
                                
                                <div aria-labelledby="navbarDropdown">
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        <button class="btn">{{ __('Logout') }}</button>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul>
                        <!-- Authentication Links -->
                        
                    </ul>
                </div>
            <!-- </div> -->
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
    @livewireScripts
</body>
</html>
