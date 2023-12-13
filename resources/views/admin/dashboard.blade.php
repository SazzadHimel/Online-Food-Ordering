@extends('layouts.admin')

@section('content')

<div class="header">
    <div class="col-md-12 grid-margin">
        <div class="d-flex justify-content-between flex-wrap">
            <div class="d-flex align-items-end flex-wrap">
                <div class="me-md-3 me-xl-5">
                @if(session('message'))
                    <h2>{{ session('message') }},</h2>
                @endif
                </div>
                <div class="text-box">
                    <h1>Welcome To<br>Online Food Order</h1>
                    <p>Enjoy Your Food At Home</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection