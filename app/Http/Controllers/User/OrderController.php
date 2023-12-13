<?php

namespace App\Http\Controllers\User;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::where("user_id", Auth::user()->id)->orderBy('created_at','desc')->paginate(10);
        return view("user.orders.index",compact("orders"));
    }

    public function show($orederId){
        $order = Order::where("user_id", Auth::user()->id)->where("id", $orederId)->first();
        if($order){
            return view("user.orders.view",compact("order"));
        }else{
            return redirect('user.orders.index')->with('message', 'No order found');
        }
        
    }
}
