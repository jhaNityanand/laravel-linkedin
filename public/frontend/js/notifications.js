$(document).ready(function () {
    // Fake notification data
    const notificationsData = [];
    const names = ["Sarah Johnson", "Michael Chan", "Emily White", "David Lee", "Jessica Kim", "Robert Green", "Linda Brown"];
    const companies = ["Tech Solutions Inc.", "Innovate Corp", "Creative Studio", "Global Tech Co.", "Data Insights Ltd."];
    const verbs = ["reacted to", "commented on", "shared", "mentioned you in", "liked"];
    const jobTitles = ["Senior Software Engineer", "Product Manager", "UX Designer", "Data Scientist", "Marketing Specialist"];
    const locations = ["San Francisco, CA", "New York, NY", "Remote", "London, UK", "Berlin, Germany"];

    for (let i = 0; i < 50; i++) {
        const typeOptions = ['reactions', 'comments', 'jobs', 'mentions', 'my-posts'];
        const type = typeOptions[Math.floor(Math.random() * typeOptions.length)];
        const isRead = Math.random() > 0.5; // 50% chance of being unread

        let content = "";
        let sender = "";

        if (type === 'jobs') {
            sender = companies[Math.floor(Math.random() * companies.length)];
            const jobTitle = jobTitles[Math.floor(Math.random() * jobTitles.length)];
            const location = locations[Math.floor(Math.random() * locations.length)];
            content = `<strong>${sender}</strong> posted a new job: ${jobTitle} (${location})`;
        } else if (type === 'my-posts') {
            content = `Your post received ${Math.floor(Math.random() * 20) + 1} new reactions and ${Math.floor(Math.random() * 10) + 1} comments.`;
            sender = "Your post"; // Conceptual sender for 'my-posts'
        } else {
            sender = names[Math.floor(Math.random() * names.length)];
            const verb = verbs[Math.floor(Math.random() * verbs.length)];
            const postSnippet = "Excited to share that our team just launched a new feature...";
            const commentSnippet = "Great insights! I agree that listening to users is key.";
            const mentionSnippet = "@JohnDoe, check out this article on AI trends.";

            if (type === 'reactions') {
                content = `<strong>${sender}</strong> ${verb} your post: "${postSnippet.substring(0, 40)}..."`;
            } else if (type === 'comments') {
                content = `<strong>${sender}</strong> ${verb} your post: "${commentSnippet.substring(0, 40)}..."`;
            } else if (type === 'mentions') {
                content = `<strong>${sender}</strong> ${verb} a comment: "${mentionSnippet.substring(0, 40)}..."`;
            } else {
                content = `<strong>${sender}</strong> ${verb} something interesting.`;
            }
        }

        const timeAgo = Math.floor(Math.random() * 7) + 1; // 1 to 7 days/hours ago
        const timeUnit = timeAgo === 1 ? 'hour' : 'hours';
        const timestamp = `${timeAgo} ${timeUnit} ago`;

        notificationsData.push({
            id: i,
            sender: sender,
            type: type,
            content: content,
            timestamp: timestamp,
            read: isRead
        });
    }

    // Function to render notifications
    function renderNotifications(filterCategory) {
        const notificationList = $('#notificationList');
        notificationList.empty(); // Clear existing notifications

        let filteredNotifications = notificationsData;
        if (filterCategory !== 'all') {
            filteredNotifications = notificationsData.filter(notif => notif.type === filterCategory);
        }

        filteredNotifications.forEach(notif => {
            const unreadClass = notif.read ? '' : 'unread';
            const markReadBtnDisplay = notif.read ? 'none' : 'inline-block';
            const markUnreadBtnDisplay = notif.read ? 'inline-block' : 'none';

            const notificationItem = `
                        <div class="notification-item ${unreadClass}" data-category="${notif.type}" data-id="${notif.id}">
                            <div class="profile-img"></div>
                            <div class="notification-content">
                                <p class="notification-text">${notif.content}</p>
                                <span class="timestamp">${notif.timestamp}</span>
                            </div>
                            <div class="notification-actions">
                                <!--
                                <button class="btn btn-mark-read" title="Mark as read" style="display: ${markReadBtnDisplay};"><i class="fas fa-circle"></i></button>
                                <button class="btn btn-mark-unread" title="Mark as unread" style="display: ${markUnreadBtnDisplay};"><i class="far fa-circle"></i></button>
                                -->
                                <button class="btn btn-dismiss" title="Dismiss"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                    `;
            notificationList.append(notificationItem);
        });
    }

    // Handle category filter clicks
    $('.notification-categories-card .list-group-item').on('click', function () {
        $('.notification-categories-card .list-group-item').removeClass('active');
        $(this).addClass('active');
        const category = $(this).data('filter');
        renderNotifications(category);
    });

    // Handle "Mark as read" button click
    $(document).on('click', '.btn-mark-read', function () {
        const notificationItem = $(this).closest('.notification-item');
        const notificationId = notificationItem.data('id');
        const notification = notificationsData.find(notif => notif.id === notificationId);

        if (notification) {
            notification.read = true;
            notificationItem.removeClass('unread');
            $(this).hide(); // Hide mark as read button
            notificationItem.find('.btn-mark-unread').show(); // Show mark as unread button
            console.log('Notification marked as read:', notification.content);
        }
    });

    // Handle "Mark as unread" button click
    $(document).on('click', '.btn-mark-unread', function () {
        const notificationItem = $(this).closest('.notification-item');
        const notificationId = notificationItem.data('id');
        const notification = notificationsData.find(notif => notif.id === notificationId);

        if (notification) {
            notification.read = false;
            notificationItem.addClass('unread');
            $(this).hide(); // Hide mark as unread button
            notificationItem.find('.btn-mark-read').show(); // Show mark as read button
            console.log('Notification marked as unread:', notification.content);
        }
    });

    // Handle "Dismiss" button click
    $(document).on('click', '.btn-dismiss', function () {
        const notificationItem = $(this).closest('.notification-item');
        const notificationId = notificationItem.data('id');

        // Remove from local data
        const index = notificationsData.findIndex(notif => notif.id === notificationId);
        if (index > -1) {
            notificationsData.splice(index, 1);
        }

        notificationItem.fadeOut(300, function () {
            $(this).remove();
            console.log('Notification dismissed:', notificationId);
        });
    });

    // Handle "Mark all as read" button click
    $('#markAllReadBtn').on('click', function () {
        notificationsData.forEach(notif => {
            if (!notif.read) {
                notif.read = true;
            }
        });
        // Re-render to reflect changes
        const activeCategory = $('.notification-categories-card .list-group-item.active').data('filter');
        renderNotifications(activeCategory);
        console.log('All notifications marked as read.');
    });

    // Initial render of all notifications
    renderNotifications('all');
});
