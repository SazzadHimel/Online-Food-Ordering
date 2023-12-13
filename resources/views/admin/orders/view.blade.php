@extends('layouts.admin')

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            @if (session('message'))
                <div class="alert alert-success">{{ session('message')}}</div>
            @endif
            <div class='card'>
                <div class='card-header'>
                    <h3>My Order Details
                        <a href="{{ url('admin/orders') }}" class="btn btn-sm float-end">BACK</a>
                    </h3>
                </div>
                <div class='card-body'>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Order Details</h5>
                            <hr>
                            <h6>Order Id: {{ $order->id }}</h6>
                            <h6>Tracking Id/No: {{ $order->tracking_no }}</h6>
                            <h6>Ordered Date: {{ $order->created_at->format('d-m-Y') }}</h6>
                            <h6>Payment Mode: {{ $order->payment_mode }}</h6>
                            <h6>Order Status Message: {{ $order->status_message }}</h6>
                        </div>
                        <div class="col-md-6">
                            <h5>User Details</h5>
                            <hr>
                            <h6>Full Name: {{ $order->fullname }}</h6>
                            <h6>Email Id: {{ $order->email }}</h6>
                            <h6>Phone: {{ $order->phone }}</h6>
                            <h6>Address: {{ $order->address }}</h6>
                        </div>
                    </div>
                    <h5>Order Items</h5>
                    <div class='table responsive'>
                        <table class='table table-bordered table-striped'>
                            <thead>
                                <th>Item ID</th>
                                <th>Order ID</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>  
                            </thead>
                            <tbody>
                                @php
                                    $totalPrice = 0;
                                @endphp
                                @foreach ($order->orderItems as $orderItem)
                                    <tr>
                                        <td width='10%'>{{$orderItem->id}}</td>
                                        <td width='10%'>{{$orderItem->order_id}}</td>
                                        <td width='10%'>{{$orderItem->price}}</td>
                                        <td width='10%'>{{$orderItem->quantity}}</td>
                                        <td width='10%' class='fw-bold'>{{$orderItem->quantity * $orderItem->price}}</td>
                                        @php
                                            $totalPrice += $orderItem->quantity * $orderItem->price;
                                        @endphp
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan='5' class='fw-bold'>Total Price Amount: </td>
                                    <td colspan='1' class='fw-bold'>${{$totalPrice}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div>
                            <!-- Remove the line below --> <!-- Use links() on orderItems, not on $order -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
