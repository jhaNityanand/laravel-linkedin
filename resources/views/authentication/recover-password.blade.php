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

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('auth.reset-password') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" id="email" value="{{ $email ?? old('email') }}"
                    placeholder="Email" required autofocus>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" id="password" placeholder="New Password (8+ characters)" required minlength="8">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                    name="password_confirmation" id="password_confirmation"
                    placeholder="Confirm New Password" required>
                @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-change-password">Change password</button>
            <a href="{{ route('auth.login') }}" class="back-to-login-link">Back to login</a>
        </form>
    </div>
@endsection

@section('script')
    <script src="{{ asset('frontend/auth/js/recover-password.js') }}"></script>
@endsection
