$(document).ready(function () {
    // Function to load messages into the chat window
    function loadMessages(contactName, messages) {
        const chatMessagesContainer = $('#chatMessages');
        chatMessagesContainer.empty(); // Clear existing messages

        // Update chat header
        $('.chat-header h6').text(contactName);

        messages.forEach(message => {
            const messageClass = message.type === 'sent' ? 'sent' : 'received';
            const messageBubble = `
                        <div class="message-bubble ${messageClass}">
                            <div class="message-content">${message.content}</div>
                        </div>
                    `;
            chatMessagesContainer.append(messageBubble);
        });

        // Scroll to the bottom of the chat
        chatMessagesContainer.scrollTop(chatMessagesContainer[0].scrollHeight);
    }

    // Handle clicking on a message item in the sidebar
    $('.message-item').on('click', function () {
        $('.message-item').removeClass('active unread'); // Remove active and unread from all
        $(this).addClass('active'); // Add active to the clicked item

        const contactName = $(this).data('contact-name');
        const messages = $(this).data('messages');

        loadMessages(contactName, messages);
    });

    // Initial load of the first conversation (Sarah Johnson)
    const initialContactName = $('.message-item.active').data('contact-name');
    const initialMessages = $('.message-item.active').data('messages');
    if (initialContactName && initialMessages) {
        loadMessages(initialContactName, initialMessages);
    }

    // Handle sending a message from the chat window
    $('#sendMessageBtn').on('click', function () {
        const messageText = $('#messageInput').val().trim();
        if (messageText !== '') {
            const currentContact = $('.chat-header h6').text();
            console.log(`Sending message to ${currentContact}: ${messageText}`);

            // Simulate adding the sent message to the chat window
            const chatMessagesContainer = $('#chatMessages');
            const sentMessageBubble = `
                        <div class="message-bubble sent">
                            <div class="message-content">${messageText}</div>
                        </div>
                    `;
            chatMessagesContainer.append(sentMessageBubble);
            chatMessagesContainer.scrollTop(chatMessagesContainer[0].scrollHeight);

            $('#messageInput').val(''); // Clear the input field
            // In a real app, send message to backend and update message list snippet
        } else {
            console.log('Message input is empty.');
        }
    });

    // Allow sending message with Enter key
    $('#messageInput').on('keypress', function (e) {
        if (e.which === 13 && !e.shiftKey) { // Enter key without Shift
            e.preventDefault(); // Prevent new line
            $('#sendMessageBtn').click();
        }
    });

    // Handle sending a new message from the modal
    $('#sendNewMessageBtn').on('click', function () {
        const recipient = $('#messageRecipient').val().trim();
        const content = $('#newMessageContent').val().trim();

        if (recipient !== '' && content !== '') {
            console.log(`New message sent to ${recipient}: ${content}`);
            // In a real app, you would send this to the backend
            // and potentially add a new conversation to the message list.
            $('#newMessageModal').modal('hide'); // Close the modal
            $('#messageRecipient').val('');
            $('#newMessageContent').val('');
        } else {
            console.log('Recipient or message content is empty for new message.');
            // Show a user-friendly error message
        }
    });
});
