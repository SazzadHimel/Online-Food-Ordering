<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Food Order</title>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">
    <link rel="shortcut icon" href="images/logo_Mesa de trabajo 1 copia 2.png">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/raty/lib/jquery.raty.css">
    <script src="https://cdn.jsdelivr.net/npm/raty/lib/jquery.raty.js"></script>


</head>
<body>

    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            @if (session()->has('message'))
                <div class='alert alert-message'>
                    {{ session('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Food Items</h4>
                </div>
                @forelse ($products as $productItem)
                    <div class="col-md-3">
                        <div class="product-card">
                            <div class="product-card-img">
                                @if ($productItem-> quantity > 0)
                                    <label class="stock bg-success">Available</label>
                                @else
                                    <label class="stock bg-danger">Not Available</label>
                                @endif
                                @if ($productItem->productImages->count() > 0)
                                <a href="{{url('/collections/'.$productItem->category->slug.'/'.$productItem->slug)}}">
                                    <img src="{{asset($productItem->productImages[0]->image)}}" alt="Photo of {{$productItem->name}} ">
                                </a>
                                @endif
                            </div>
                            <div class="product-card-body">
                                <p class="product-slug">{{$productItem->slug}}</p>
                                <h5 class="product-name">
                                <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                        {{$productItem->name}} 
                                </a>
                                </h5>
                                <div>
                                    <span class="discounted-price">${{$productItem->discounted_price}}</span>
                                    <span class="main-price"> ${{$productItem->main_price}}</span>
                                </div>
                                <div class="mt-2">
                                    <div class="input-group">
                                        <input type="number" wire:model="quantityCount" value="{{ $this->quantityCount }}" class="quantity" required min="1"/>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button type="button" wire:click="addToCart({{ $productItem->id }})" class="btn btn-sm">
                                        <span wire:loading.remove wire:target="addToCart">
                                            <i class="fa fa-shopping-cart"></i>
                                        </span>
                                        <span wire:loading wire:target="addToCart">
                                        </span>
                                    </button>
                                    <button type="button" wire:click="addToWishlist({{ $productItem->id }})" class="btn btn-sm">
                                        <span wire:loading.remove wire:target="addToWishlist">
                                            <i class="fa fa-heart"></i>
                                        </span>
                                        <span wire:loading wire:target="addToWishlist">
                                        </span>
                                    </button>
                                </div>
                                <div class="mt-2">
                                    <!-- Display reviews here -->
                                    @foreach($productItem->reviews as $review)
                                        <p><b>{{ $review->user->name }}: </b> {{ $review->comment }}</p>
                                    @endforeach
                                </div>
                                <form action="{{ route('reviews.store') }}" method='POST'>
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $productItem->id }}">
                                    <input class="search" type="Comment" placeholder=" Give Review " name="comment" value='{{ old("comment") }}'>
                                    <button class="btn btn-sm" type='submit'>Comment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @empty
                <div class='col-md-12'>
                    <h5>No Products Available for {{$category->name}}</h5>
                </div>

                @endforelse                

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.star-rating').raty({
                readOnly: true,
                score: function () {
                    return $(this).attr('data-score');
                },
                path: 'https://cdn.jsdelivr.net/npm/raty/lib/images',
            });
        });
    </script>
</body>
</html>
