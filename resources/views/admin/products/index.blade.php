@extends('layouts.admin')

@section('content')

<div class='row'>
    <div class='col-md-12'>
        @if (session('message'))
            <div class="alert alert-success">{{ session('message')}}</div>
        @endif
        <div class='card'>
            <div class='card-header'>
                <h3>Products
                    <a href="{{ url('admin/products/create') }}"><button class="long-main-btn btn-sm float-end">Add Products</button></a>
                </h3>
            </div>
            <div class='card-body'>
                <table class='table table-bordered table-striped'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                        <tr>
                            <td>{{ $product->id}}</td>
                            <td>
                                @if($product->category)
                                    {{ $product->category->name}}
                                @else
                                    No Category
                                @endif
                            </td>
                            <td>{{ $product->name}}</td>
                            <td>{{ $product->main_price}}</td>
                            <td>{{ $product->discounted_price}}</td>
                            <td>{{ $product->status == '1'? 'Hidden':'Visible'}}</td>
                            <td>
                                <!-- <a href="{{ url('admin/products/'.$product->id.'/edit' )}}" class='btn btn-sm btn-success'>Edit</a> -->
                                <a href="{{ url('admin/products/'.$product->id.'/delete')}}" onclick="return('Are you sure to delete this product?')" class='btn btn-sm btn-danger'>Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan='7'>No Product Available</td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>

            </div>

        </div>

    </div>
            
</div>

@endsection