@extends('authentication.app')

@section('title', $title)

@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/auth/css/login.css') }}">
@endsection

@section('content')
    <div class="login-container">
        <i class="fab fa-linkedin linkedin-logo"></i>
        <h2>Sign in</h2>

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('auth.authenticate') }}">
            @csrf
            <div class="mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" id="email" value="{{ old('email') }}"
                    placeholder="Email or Phone" required autofocus>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" id="password" placeholder="Password" required>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3 form-check" style="text-align: left;">
                <input type="checkbox" class="form-check-input" name="remember" id="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>
            <button type="submit" class="btn btn-login">Sign in</button>
            <a href="{{ route('auth.forgot-password') }}" class="forgot-password-link">Forgot password?</a>
        </form>

        <div class="divider"><span>or</span></div>

        <button class="btn btn-google">
            <img src="https://www.google.com/favicon.ico" alt="Google icon">
            Sign in with Google
        </button>
        <button class="btn btn-apple">
            <img src="https://www.apple.com/favicon.ico" alt="Apple icon">
            Sign in with Apple
        </button>

        <p class="join-now-link">New to LinkedIn? <a href="{{ route('auth.register') }}">Join now</a></p>
    </div>
@endsection

@section('script')
    <script src="{{ asset('frontend/auth/js/login.js') }}"></script>
@endsection
