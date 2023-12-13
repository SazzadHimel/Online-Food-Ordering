@extends('layouts.admin')

@section('content')
    <div class='row'>
        <div class='col-md-12'>
            @if (session('message'))
                <div class="alert alert-success">{{ session('message')}}</div>
            @endif
            <div class='card'>
                <div class='card-header'>
                    <h3>Customers</h3>
                </div>
                <div class='card-body'>
                    <table class='table table-bordered table-striped'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Wallet Ballance</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr></tr>
                                    <td>{{ $user->id}}</td>
                                    <td>{{ $user->name}}</td>
                                    <td>{{ $user->email}}</td>
                                    <td>{{ $user->wallet_balance }}</td>
                                    <td><a href="{{ route('wallet.showAddMoneyForm', ['email' => $user->email]) }}">Add Money</a></td>
                                    <td>
                                        <a href="{{ route('admin.dashboard.profiledetails.delete', ['id' => $user->id]) }}" onclick="return confirm('Are you sure to delete this user?')" class='btn btn-sm btn-danger'>
                                        Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection