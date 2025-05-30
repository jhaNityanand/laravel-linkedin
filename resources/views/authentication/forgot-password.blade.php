@extends('authentication.app')

@section('title', $title)

@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/auth/css/forgot-password.css') }}">
@endsection

@section('content')
    <div class="forgot-password-container">
        <i class="fab fa-linkedin linkedin-logo"></i>
        <h2>Forgot Password?</h2>
        <p>Reset your password in two quick steps.</p>
        <form id="forgotPasswordForm">
            <div class="mb-3">
                <input type="email" class="form-control" id="emailOrPhone" placeholder="Email or Phone" required>
            </div>
            <button type="submit" class="btn btn-reset">Reset password</button>
            <a href="{{ route('auth.login') }}" class="back-to-login-link">Back to login</a>
        </form>
    </div>
@endsection

@section('script')
    <script src="{{ asset('frontend/auth/js/forgot-password.js') }}"></script>
@endsection
