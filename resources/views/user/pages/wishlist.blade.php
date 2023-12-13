@extends('layouts.user')

@section('title','Search Products')

@section('content')

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ecommerce Cart/Wishlist Page Design</title>

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="py-3 py-md-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="shopping-cart">
                            <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Products</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>Price</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>Description</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>Action</h4>
                                    </div>
                                </div>
                            </div>
                            @forelse ($wishlistProducts as $Item)
                                <div class="cart-item">
                                    <div class="row">
                                        <div class="col-md-6 my-auto">
                                            <a href="#">
                                                <label class="product-name">
                                                    @if ($Item->product)
                                                        {{ $Item->product->name }}
                                                    @else
                                                        Product not found
                                                    @endif
                                                </label>
                                            </a>
                                        </div>
                                        <div class="col-md-2 my-auto">
                                            <label class="price">$
                                                @if ($Item->product)
                                                    {{ $Item->product->discounted_price }}
                                                @else
                                                    Product not found
                                                @endif
                                            </label>
                                        </div>
                                        <div class="col-md-2 my-auto">
                                            <label class="price">
                                                @if ($Item->product)
                                                    {{ $Item->product->description }}
                                                @else
                                                    Product not found
                                                @endif
                                            </label>
                                        </div>
                                        <div class="col-md-2 col-5 my-auto">
                                            <div class="remove">
                                                <button type="button" class="long-main-btn btn-sm">
                                                    <a href="{{ url('/wishlist/'.$Item->id.'/delete') }}">Remove</a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="cart-item">
                                    <p>No wishlist items found.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>

@endsection