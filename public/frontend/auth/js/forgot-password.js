$(document).ready(function () {
    // Handle forgot password form submission
    $('#forgotPasswordForm').on('submit', function (e) {
        e.preventDefault(); // Prevent actual form submission
        const emailOrPhone = $('#emailOrPhone').val().trim();

        if (emailOrPhone) {
            console.log('Password reset request for:', emailOrPhone);
            $('#modalMessage').text('If an account matches, a password reset link has been sent to your email or phone.');
            $('#statusModal').modal('show');
            // In a real app, send AJAX request to backend.
            // Backend would handle sending the reset link.
        } else {
            $('#modalMessage').text('Please enter your email or phone.');
            $('#statusModal').modal('show');
        }
    });
});
