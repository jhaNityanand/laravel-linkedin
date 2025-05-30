@extends('authentication.app')

@section('title', $title)

@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/auth/css/login.css') }}">
@endsection

@section('content')
    <div class="login-container">
        <i class="fab fa-linkedin linkedin-logo"></i>
        <h2>Sign in</h2>
        <form id="loginForm">
            <div class="mb-3">
                <input type="email" class="form-control" id="email" placeholder="Email or Phone" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="password" placeholder="Password" required>
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
