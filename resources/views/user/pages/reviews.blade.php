@extends('layouts.user')

@section('title','Reviews')

@section('content')

    <div>
        <livewire:user.product.reviews :products="$products" :category="$category"/>
    </div>

@endsection
