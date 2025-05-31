$(document).ready(function () {
    // Handle Google/Apple Join buttons
    $('.btn-google, .btn-apple').on('click', function () {
        const provider = $(this).text().trim();
        alert(`Attempting join with: ${provider}`);
    });
});
