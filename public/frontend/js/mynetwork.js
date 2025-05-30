$(document).ready(function () {
    // Handle "Ignore" button click on invitations
    $('.btn-ignore').on('click', function () {
        const invitationItem = $(this).closest('.invitation-item');
        const userName = invitationItem.find('h6').text();
        console.log(`Ignored invitation from: ${userName}`);
        invitationItem.fadeOut(300, function () {
            $(this).remove(); // Remove the invitation item after fading out
        });
        // In a real application, you would send this action to a backend
    });

    // Handle "Accept" button click on invitations
    $('.btn-accept').on('click', function () {
        const invitationItem = $(this).closest('.invitation-item');
        const userName = invitationItem.find('h6').text();
        console.log(`Accepted invitation from: ${userName}`);
        // The modal will open automatically due to data-bs-toggle="modal"
        // In a real application, you would send this action to a backend
        // and then potentially update the UI to reflect the new connection.
        invitationItem.fadeOut(300, function () {
            $(this).remove(); // Remove the invitation item after fading out
        });
    });

    // Handle "Connect" button click on "People you may know"
    $('.btn-connect').on('click', function () {
        const profileItem = $(this).closest('.profile-item');
        const userName = profileItem.find('h6').text();
        console.log(`Sent connection request to: ${userName}`);
        // The modal will open automatically due to data-bs-toggle="modal"
        // In a real application, you would send this action to a backend
        // and then potentially change the button text to "Pending" or "Message".
        profileItem.fadeOut(300, function () {
            $(this).remove(); // Remove the profile item after fading out
        });
    });

    // Handle close button on "People you may know" profile items
    $('.profile-close-btn').on('click', function () {
        const profileItem = $(this).closest('.profile-item');
        const userName = profileItem.find('h6').text();
        console.log(`Dismissed profile: ${userName}`);
        profileItem.fadeOut(300, function () {
            $(this).remove(); // Remove the profile item after fading out
        });
    });

    // Handle close button on Premium Ad card
    $('.premium-ad-card .close-btn').on('click', function () {
        $(this).closest('.premium-ad-card').fadeOut(300, function () {
            $(this).remove();
        });
        console.log('Premium ad dismissed.');
    });

    // Handle "Show all" links (placeholder for dynamic content)
    $('.show-all-link').on('click', function (e) {
        e.preventDefault(); // Prevent default link behavior
        console.log('Show all link clicked. In a real app, this would load more content.');
        // You could implement logic here to load more invitations or profiles
    });

    // Handle "Solve" button click for daily games
    $('.btn-play').on('click', function () {
        const gameTitle = $(this).siblings('.game-title').text();
        console.log(`Playing game: ${gameTitle}`);
        // In a real app, this would navigate to the game or open a game modal
    });

    // Handle "Try Premium" button click
    $('.btn-premium').on('click', function () {
        console.log('Try Premium button clicked.');
        // In a real app, this would navigate to the Premium subscription page
    });
});
