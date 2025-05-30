$(document).ready(function () {
    // Handle login form submission
    $('#loginForm').on('submit', function (e) {
        e.preventDefault(); // Prevent actual form submission
        const email = $('#email').val();
        const password = $('#password').val();

        if (email && password) {
            // Simulate login process
            console.log('Attempting login with:', { email, password });
            $('#modalMessage').text('Login successful! Redirecting...');
            $('#statusModal').modal('show');
            // In a real app, you'd send an AJAX request to your backend here.
            // On success: redirect to home page
            // On failure: show specific error message
        } else {
            $('#modalMessage').text('Please enter both email/phone and password.');
            $('#statusModal').modal('show');
        }
    });

    // Handle Google/Apple Sign in buttons
    $('.btn-google, .btn-apple').on('click', function () {
        const provider = $(this).text().trim();
        console.log(`Attempting sign in with: ${provider}`);
        $('#modalMessage').text(`Attempting sign in with ${provider}...`);
        $('#statusModal').modal('show');
        // In a real app, this would initiate OAuth flow.
    });
});
