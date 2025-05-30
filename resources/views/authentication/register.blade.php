@extends('authentication.app')

@section('title', $title)

@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/auth/css/register.css') }}">
@endsection

@section('content')
    <div class="register-container">
        <i class="fab fa-linkedin linkedin-logo"></i>
        <h2>Make the most of your professional life</h2>
        <form id="registerForm">
            <div class="mb-3">
                <input type="email" class="form-control" id="registerEmail" placeholder="Email or Phone" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="registerPassword" placeholder="Password (6+ characters)" required minlength="6">
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

        <p class="sign-in-link">Already on LinkedIn? <a href="#" id="signInLink">Sign in</a></p>
    </div>

    <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalLabel">Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <p id="modalMessage"></p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('frontend/auth/js/register.js') }}"></script>
@endsection
