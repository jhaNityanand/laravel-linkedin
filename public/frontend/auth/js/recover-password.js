$(document).ready(function () {
    // Handle recover password form submission
    $('#recoverPasswordForm').on('submit', function (e) {
        e.preventDefault(); // Prevent actual form submission
        const newPassword = $('#newPassword').val();
        const confirmPassword = $('#confirmPassword').val();

        if (newPassword.length < 6) {
            $('#modalMessage').text('New password must be at least 6 characters long.');
            $('#statusModal').modal('show');
        } else if (newPassword !== confirmPassword) {
            $('#modalMessage').text('Passwords do not match. Please try again.');
            $('#statusModal').modal('show');
        } else {
            console.log('New password set:', newPassword);
            $('#modalMessage').text('Your password has been successfully changed! You can now log in.');
            $('#statusModal').modal('show');
            // In a real app, send AJAX request to backend to update password.
            // On success, redirect to login page.
        }
    });
});
