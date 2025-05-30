$(document).ready(function () {
    // Handle registration form submission
    $('#registerForm').on('submit', function (e) {
        e.preventDefault(); // Prevent actual form submission
        const email = $('#registerEmail').val();
        const password = $('#registerPassword').val();

        if (email && password.length >= 6) {
            // Simulate registration process
            console.log('Attempting registration with:', { email, password });
            $('#modalMessage').text('Registration successful! Welcome to LinkedIn!');
            $('#statusModal').modal('show');
            // In a real app, send AJAX request to backend.
            // On success: redirect to next step (e.g., profile setup) or home page
            // On failure: show specific error message
        } else if (!email) {
            $('#modalMessage').text('Please enter your email or phone.');
            $('#statusModal').modal('show');
        } else if (password.length < 6) {
            $('#modalMessage').text('Password must be at least 6 characters long.');
            $('#statusModal').modal('show');
        } else {
            $('#modalMessage').text('Please fill in all required fields.');
            $('#statusModal').modal('show');
        }
    });

    // Handle Sign In link click
    $('#signInLink').on('click', function (e) {
        e.preventDefault();
        console.log('Redirecting to Sign In page...');
        // In a real app, this would navigate to the login page.
        $('#modalMessage').text('Navigating to Sign In...');
        $('#statusModal').modal('show');
    });

    // Handle Google/Apple Join buttons
    $('.btn-google, .btn-apple').on('click', function () {
        const provider = $(this).text().trim();
        console.log(`Attempting join with: ${provider}`);
        $('#modalMessage').text(`Attempting join with ${provider}...`);
        $('#statusModal').modal('show');
        // In a real app, this would initiate OAuth flow.
    });
});
