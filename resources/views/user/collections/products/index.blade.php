@extends('layouts.user')

@section('title')
{{ $category->meta_title }}
@endsection

@section('content')

    <div>
        <livewire:user.product.index :products="$products" :category="$category"/>
    </div>

@endsection