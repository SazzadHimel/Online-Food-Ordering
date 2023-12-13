<?php

namespace App\Livewire\User\Product;

use Livewire\Component;
use App\Models\Wishlist;
use App\Models\Review;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $products, $category, $comment, $quantityCount = 1;

    public function addToWishlist($productId)
    {
        if(Auth::check())
        {
            if(Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists())
            {
                session()->flash('message', 'Already added to wishlist');
                return false;
            }
            else
            {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId,
                ]);
                session()->flash('message', 'Wishlist Added Successfully');
            }
        }
        else
        {
            session()->flash('message', 'Please Login to continue');
            return false;
        }
    }

    public function addToCart(int $productId)
    {
        if (Auth::check()) {
            $product = Product::find($productId);
            if ($product && $product->status == '1') {
                if ($product->quantity > 0) {
                    if ($product->quantity > $this->quantityCount) {
                        Cart::create([
                            'user_id' => auth()->user()->id,
                            'product_id' => $productId,
                            'quantity' => $this->quantityCount
                        ]);
                        return redirect(url('/collections/'.$product->category->slug.'/'.$product->slug) )->with('message','Product Added To Cart');

                    } else {
                        return redirect(url('/collections/'.$product->category->slug.'/'.$product->slug) )->with('message','Out of Stock','warning');
                    }
                } else {
                    return redirect(url('/collections/'.$product->category->slug.'/'.$product->slug) )->with('message', 'Only ' . $product->quantity . ' Quantity Available', 'warning');
                }
            } else {
                return redirect(url('/collections/'.$product->category->slug.'/'.$product->slug) )->with('message', 'Product Does not exist', 'warning');
            }
        } else {
            return redirect(url('/collections/'.$product->category->slug.'/'.$product->slug) )->with('message', 'Please Login to Cart', 'info');
        }
    }

    public function mount($products, $category)
    {
        $this->products = $products;
        $this->category = $category;
    }

    public function render()
    {
        return view('livewire.user.product.index',[
            'products'=> $this->products,
            'category'=> $this->category,
            
        ]);
    }
}
