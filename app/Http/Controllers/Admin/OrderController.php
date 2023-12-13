<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;


class OrderController extends Controller
{
    public function index()
    {
        $todayData = Carbon::now();
        $orders = Order::whereDate('created_at', $todayData)->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function show(int $orederId)
    {
        $order = Order::where('id', $orederId)->first();
        if($order){
            return view('admin.orders.view',compact('order'));
        }else{
            return redirect('admin/orders')->with('message', 'Order Id not Found');
        }
    }
}
