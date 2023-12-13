@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin Wallet Balance</div>

                    <div class="card-body">
                        <div class="alert alert-info">
                            <strong>Wallet Balance:</strong> ${{ $admin->wallet_balance }}
                        </div>

                        <!-- You can add more details or styling as needed -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection