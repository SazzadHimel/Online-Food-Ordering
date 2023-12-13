@extends('layouts.admin')

@section('content')
    <div class="form-container">
        <form action="{{ route('wallet.addMoney') }}" method="post">
            <h3>Add Money to Wallet</h3>
            @csrf
            <label for="amount"></label>
            <input type="number" name="amount" id="amount" required min="1" placeholder="Type amount">
            <button class="btn btn-sm" type="submit">Add $</button>
        </form>
    </div>
@endsection