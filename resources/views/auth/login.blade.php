@extends('layouts.app')

@section('content')
<div class="form-container">
    <form method="POST" action="{{ route('login') }}">
        <h3>{{ __('Login') }}</h3>
        @csrf
        <div>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Enter Email" autofocus>
            @error('email')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Enter Password">
            @error('password')
                <span role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="check-box">
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <h4>{{ __('Remember Me') }}</h4>
        </div>
        <div>
            <button type="submit" class="btn btn-sm">
                {{ __('Login') }}
            </button>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __(' Forgot Your Password?') }}
                </a>
            @endif
        </div>
    </form>
</div>
@endsection
