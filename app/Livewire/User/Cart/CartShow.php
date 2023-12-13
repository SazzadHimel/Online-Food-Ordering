<?php

namespace App\Livewire\User\Cart;

use Livewire\Component;
use App\Models\Cart;

class CartShow extends Component
{
    public $cart, $totalPrice = 0;

    public function render()
    {
        $this->cart = Cart::where('user_id',auth()->user()->id)->get();
        return view('livewire.user.cart.cart-show', [
            'cart' => $this->cart,
        ]);
    }

    public function removeCartItem(int $cartId)
    {
        $cartRemoveData = Cart::where('user_id', auth()->user()->id)->where('id', $cartId)->first();

        if($cartRemoveData)
        {
        
            $cartRemoveData->delete();
        
        }else{

            return redirect(url('/cart/') )->with('message', 'Somthing Went Wrong!', 'warning');
        }
    }

    
}
