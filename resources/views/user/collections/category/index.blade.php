@extends('layouts.user')

@section('content')

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Food Categories</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
    <link rel="shortcut icon" href="images/logo_Mesa de trabajo 1 copia 2.png">

</head>
<body>

    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Our Food Categories</h4>
                </div>

                @forelse ($categories as $categoryItem)
                    <div class="col-6 col-md-3">
                        <div class="category-card">
                            <a href="{{ url('/collections/'.$categoryItem->slug) }}">
                                <div class="category-card-img">
                                    <img src="{{ asset($categoryItem->image) }}" class="w-100" alt="Category Image">
                                </div>
                                <div class="category-card-body">
                                    <h5>{{$categoryItem->name}}</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                
                @empty
                    <div class='col-md-12'>
                        <h5>No Categories Available</h5>
                    </div>

                @endforelse


            </div>
        </div>
    </div>

</html>

@endsection