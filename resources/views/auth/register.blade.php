@extends('layouts.app')

@section('content')
<div class="form-container">
    <form method="POST" action="{{ route('register') }}">
        <h3>{{ __('Register') }}</h3>
        @csrf
        <div>
            <input id="name" type="text" placeholder=" Full Name " class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div>
            <input type="email" placeholder=" Email Address " class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div>
            <input id="password" type="password" placeholder=" Password " class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div>
            <input class id="password-confirm" type="password" placeholder=" Confirm Password " name="password_confirmation" required autocomplete="new-password">
        </div>
        <div>
            <button type="submit" class="btn btn-primary btn-sm">
                {{ __('Register') }}
            </button>
        </div>
    </form>
</div>
@endsection
