

<div class="py-3 py-md-5">
    <div class="container">
        <h4>My Cart</h4>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="shopping-cart">
                    <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Order Items</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Price</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Quantity</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Item Total</h4>
                            </div>

                        </div>
                    </div>

                    @forelse ($cart as $cartItem)
                        @if ($cartItem->product)

                            <div class='cart-item'>
                                <div class="row">
                                    <div class="col-md-6 my-auto">
                                        <a href="{{url('collections/'.$cartItem->product->category->slug.'/'.$cartItem->product->slug)}}">
                                            <label class="product-name">
                                                <img src="{{asset($cartItem->product->productImages[0]->image)}}" style="width: 50px; height: 50px" alt="Img">
                                                {{$cartItem->product->name}}
                                            </label>
                                        </a>
                                    </div>

                                    <div class="col-md-2 my-auto">
                                        <label class="price">${{$cartItem->product->discounted_price}} </label>
                                    </div>

                                    <div class="col-md-2 col-7 my-auto">
                                        <div class="quantity">
                                            <div class="input-group">
                                                <input type="text" value="{{$cartItem->quantity}}" class="quantity"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class='col-md-1 my-auto'>
                                        <label class='price'>${{ $cartItem->product->discounted_price * $cartItem->quantity }}</label>
                                        @php $totalPrice += $cartItem->product->discounted_price * $cartItem->quantity @endphp
                                    </div>

                                    <div class="col-md-2 col-5 my-auto">
                                        <div class="remove">
                                            <button type="button" wire:loading.attr="disabled" wire:click="removeCartItem({{ $cartItem->id }})" href="" class="btn btn-sm">
                                                <span wire:loading.remove wire:target="removeCartItem({{ $cartItem->id }})">Remove</span>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endif
                            
                    @empty
                        <div>Cart is empty</div>

                    @endforelse

                    
                            
                </div>
            </div>
        </div>
        <div class='row'>
            <div class='col-md-8 my-md-auto mt-3'>
                <h5>
                    Add more Food Items <a href="{{ url('/collections') }}">Add more</a>
                </h5>

            </div>
            <div class='col-md-4 mt-3'>
                <div class='shadow-sm bg-white p-3'>
                    <h4>Total:
                        <span class='float-end'>$ {{ $totalPrice }}</span>
                    </h4>
                    <hr>
                    <a href="{{ url('/checkout') }}" class='btn w-100 btn-sm'>Checkout</a>
                </div>
            </div>
        </div>

    </div>
</div>