$(document).ready(function () {
    // Handle Google/Apple Sign in buttons
    $('.btn-google, .btn-apple').on('click', function () {
        const provider = $(this).text().trim();
        alert(`Attempting sign in with: ${provider}`);
    });
});
