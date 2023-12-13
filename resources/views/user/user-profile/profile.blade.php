@extends('layouts.user')

@section('title','Profile')

@section('content')

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Food Order</title>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css')}}">
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">

</head>
<body>

    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h4 class="mb-4">User Profile</h4>
                </div>

                <div class='col-md-10'>

                    @if (session('message'))
                        <p class='alert alert-success'>{{session('message')}}</p>
                    @endif

                    @if ($errors->any())
                        <ul class='alert alert-danger'>
                            @foreach ($errors->all() as $error)
                                <li class='text-danger'>{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif

                    <div class='card shadow'>
                        <div class='card-header'>
                            <h4 class='mb-0'>Account Details</h4>
                        </div>
                        <div class='card-body'>
                            <form action="{{url('profile')}}" method='POST'>
                                @csrf
                                <div class='row'>
                                    <div class='col-md-6'>
                                        <div class='mb-3'>
                                            <label>Username</label>
                                            <input type="text" name='username' value='{{Auth::user()->name}}' class='form-control' />
                                        </div>
                                    </div>

                                    <div class='col-md-6'>
                                        <div class='mb-3'>
                                            <label>Email Address</label>
                                            <input type="email" name='email' readonly value="{{Auth::user()->email}}" class='form-control' />
                                        </div>
                                    </div>

                                    <div class='col-md-6'>
                                        <div class='mb-3'>
                                            <label>Phone</label>
                                            <input type="text" name='phone' value='' class='form-control' />
                                        </div>
                                    </div>
                                    
                                    <div class='col-md-6'>
                                        <div class='mb-3'>
                                            <label>Wallet Balance $</label>
                                            <input type="text" name='wallet_balance' readonly value="{{Auth::user()->wallet_balance}}" class='form-control' />
                                        </div>
                                    </div>

                                    <div class='col-md-12'>
                                        <div class='mb-3'>
                                            <label>Shipping Address</label>
                                            <textarea name="address" class="form-control" value=''  rows="3"></textarea>
                                        </div>
                                    </div>

                                    <div class='col-md-12'>
                                        <button type='submit' class='btn btn-primary btn-sm'>Save</button>
                                    </div>

                                </div>
                            </form>

                        </div>

                    </div>

                </div>


            </div>
        </div>
    </div>

</body>
</html>

@endsection