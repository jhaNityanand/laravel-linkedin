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

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('auth.send-reset-link') }}">
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
            <button type="submit" class="btn btn-reset">Reset password</button>
            <a href="{{ route('auth.login') }}" class="back-to-login-link">Back to login</a>
        </form>
    </div>
@endsection

@section('script')
    <script src="{{ asset('frontend/auth/js/forgot-password.js') }}"></script>
@endsection
