@extends('authentication.app')

@section('title', $title)

@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/auth/css/register.css') }}">
@endsection

@section('content')
    <div class="register-container">
        <i class="fab fa-linkedin linkedin-logo"></i>
        <h2>Make the most of your professional life</h2>

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('auth.store') }}">
            @csrf
            <div class="mb-3">
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                    name="name" id="name" value="{{ old('name') }}"
                    placeholder="Full Name" required autofocus>
                @error('name')
                    <div class="invalid-feedback text-left">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" id="email" value="{{ old('email') }}"
                    placeholder="Email or Phone" required>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" id="password" placeholder="Password (8+ characters)" required minlength="8">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                    name="password_confirmation" id="password_confirmation"
                    placeholder="Confirm Password" required>
                @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <p class="terms-text">
                By clicking Agree & Join, you agree to the LinkedIn <a href="#">User Agreement</a>, <a href="#">Privacy Policy</a>, and <a href="#">Cookie Policy</a>.
            </p>
            <button type="submit" class="btn btn-register">Agree & Join</button>
        </form>

        <div class="divider"><span>or</span></div>

        <button class="btn btn-google">
            <img src="https://www.google.com/favicon.ico" alt="Google icon">
            Join with Google
        </button>
        <button class="btn btn-apple">
            <img src="https://www.apple.com/favicon.ico" alt="Apple icon">
            Join with Apple
        </button>

        <p class="sign-in-link">Already on LinkedIn? <a href="{{ route('auth.login') }}">Sign in</a></p>
    </div>
@endsection

@section('script')
    <script src="{{ asset('frontend/auth/js/register.js') }}"></script>
@endsection
