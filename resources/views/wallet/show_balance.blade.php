@extends('layouts.app')

@section('content')
    <div>
        <p>Your Wallet Balance: ${{ $user->wallet_balance }}</p>
        <a href="{{ route('show_balance') }}">Balance</a>
        <a href="{{ route('buy-food-items') }}">Buy Food Items</a>
    </div>
@endsection