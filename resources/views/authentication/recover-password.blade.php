@extends('authentication.app')

@section('title', $title)

@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/auth/css/recover-password.css') }}">
@endsection

@section('content')
    <div class="recover-password-container">
        <i class="fab fa-linkedin linkedin-logo"></i>
        <h2>Set a new password</h2>
        <p>Enter your new password below.</p>
        <form id="recoverPasswordForm">
            <div class="mb-3">
                <input type="password" class="form-control" id="newPassword" placeholder="New Password (6+ characters)" required minlength="6">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm New Password" required minlength="6">
            </div>
            <button type="submit" class="btn btn-change-password">Change password</button>
            <a href="{{ route('auth.login') }}" class="back-to-login-link">Back to login</a>
        </form>
    </div>
@endsection

@section('script')
    <script src="{{ asset('frontend/auth/js/recover-password.js') }}"></script>
@endsection
