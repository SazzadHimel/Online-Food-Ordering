<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/base/vendor.bundle.base.css')}}">

    <link rel="stylesheet" href="{{ asset('admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">

    <link rel="stylesheet" href="{{ asset('admin/css/style.css')}}">
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">

    @livewireStyles
</head>
<body>
    <div>
        @include('layouts.inc.admin.navbar')
        <div>
            <div>
                <div>
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
</body>
</html>