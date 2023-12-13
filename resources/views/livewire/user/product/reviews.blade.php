@extends('layouts.user')

@section('title','Reviews')

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
                    <h4 class="mb-4">Reviews</h4>
                </div>
                @if($product->reviews->count() > 0)
                    <h2>Customer Reviews</h2>
                    <ul>
                        @foreach($product->reviews as $review)
                            <li>
                                <p>{{ $review->comment }}</p>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>No reviews yet. Be the first to review!</p>
                @endif

                <div class='row'>
                    <div class='col-md-3'>
                    @if(auth()->check())
                        <h2>Add Your Review</h2>
                        <form method="post" action="{{ route('livewire.user.product.index') }}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <label for="comment">Comment:</label>
                            <textarea name="comment" rows="3"></textarea>
                            <button type="submit">Submit Review</button>
                        </form>
                    @else
                        <p>Please <a href="{{ route('login') }}">login</a> to leave a review.</p>
                    @endif              
                    </div>
                </div>


            </div>
        
        </div>
    
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>


@endsection
