@extends('layouts.frontend.app')

@section('title', $title)

@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/messaging.css') }}">
@endsection

@section('content')
    <div class="container main-content">
        <div class="col-lg-4 col-md-5 message-list-sidebar me-lg-3">
            <div class="message-list-header">
                <h5>Messaging</h5>
                <div>
                    <button class="btn btn-light"><i class="fas fa-ellipsis-h"></i></button>
                    <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#newMessageModal"><i class="fas fa-edit"></i></button>
                </div>
            </div>
            <div class="message-search p-3">
                <input type="text" class="form-control" placeholder="Search messages">
            </div>
            <div class="message-items-container">
                <div class="message-item active" data-contact-name="Sarah Johnson" data-messages='[{"sender": "Sarah Johnson", "content": "Hey John, how are you doing?", "time": "10:30 AM", "type": "received"}, {"sender": "You", "content": "I'm doing great, Sarah! Just finished a big project.", "time": "10:35 AM", "type": "sent"}, {"sender": "Sarah Johnson", "content": "That's awesome! Let me know if you want to catch up sometime.", "time": "10:40 AM", "type": "received"}]'>
                    <div class="profile-img"></div>
                    <div class="message-info">
                        <h6>Sarah Johnson</h6>
                        <p>That's awesome! Let me know if you want...</p>
                    </div>
                    <span class="timestamp">10:40 AM</span>
                </div>
                <div class="message-item unread" data-contact-name="Michael Chan" data-messages='[{"sender": "You", "content": "Hi Michael, checking in on the data analysis.", "time": "Yesterday", "type": "sent"}, {"sender": "Michael Chan", "content": "Hey, I'm almost done with the analysis, will send it over by end of day.", "time": "Yesterday", "type": "received"}]'>
                    <div class="profile-img"></div>
                    <div class="message-info">
                        <h6>Michael Chan</h6>
                        <p>Hey, I'm almost done with the analysis...</p>
                    </div>
                    <span class="timestamp">Yesterday</span>
                </div>
                <div class="message-item" data-contact-name="Innovate Corp HR" data-messages='[{"sender": "Innovate Corp HR", "content": "Dear John, we would like to invite you for an interview.", "time": "May 27", "type": "received"}]'>
                    <div class="profile-img"></div>
                    <div class="message-info">
                        <h6>Innovate Corp HR</h6>
                        <p>Dear John, we would like to invite you for an...</p>
                    </div>
                    <span class="timestamp">May 27</span>
                </div>
                <div class="message-item" data-contact-name="Creative Studio Team" data-messages='[{"sender": "Creative Studio Team", "content": "Meeting scheduled for tomorrow at 2 PM.", "time": "May 25", "type": "received"}]'>
                    <div class="profile-img"></div>
                    <div class="message-info">
                        <h6>Creative Studio Team</h6>
                        <p>Meeting scheduled for tomorrow at 2 PM.</p>
                    </div>
                    <span class="timestamp">May 25</span>
                </div>
            </div>
        </div>

        <div class="col-lg-8 col-md-7 chat-window">
            <div class="chat-header">
                <div class="profile-img"></div>
                <h6>Sarah Johnson</h6>
            </div>
            <div class="chat-messages" id="chatMessages">
                <div class="message-bubble received">
                    <div class="message-content">Hey John, how are you doing?</div>
                </div>
                <div class="message-bubble sent">
                    <div class="message-content">I'm doing great, Sarah! Just finished a big project.</div>
                </div>
                <div class="message-bubble received">
                    <div class="message-content">That's awesome! Let me know if you want to catch up sometime.</div>
                </div>
            </div>
            <div class="message-input-area">
                <textarea class="form-control" placeholder="Write a message..." rows="1" id="messageInput"></textarea>
                <button class="btn btn-send" id="sendMessageBtn"><i class="fas fa-paper-plane"></i></button>
            </div>
        </div>
    </div>

    <div class="modal fade new-message-modal" id="newMessageModal" tabindex="-1" aria-labelledby="newMessageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newMessageModalLabel">New Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="messageRecipient" class="form-label visually-hidden">Recipient</label>
                        <input type="text" class="form-control" id="messageRecipient" placeholder="Type a name">
                    </div>
                    <div class="mb-3">
                        <label for="newMessageContent" class="form-label visually-hidden">Message</label>
                        <textarea class="form-control" id="newMessageContent" placeholder="Write your message..." rows="5"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-send-new" id="sendNewMessageBtn">Send</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('frontend/js/messaging.js') }}"></script>
@endsection
