@extends('layouts.frontend.app')

@section('title', $title)

@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/messaging.css') }}">
@endsection

@php
    $sarahMessages = [
        ["sender" => "Sarah Johnson", "content" => "Hey John, how are you doing?", "time" => "10:30 AM", "type" => "received"],
        ["sender" => "You", "content" => "I'm doing great, Sarah! Just finished a big project.", "time" => "10:35 AM", "type" => "sent"],
        ["sender" => "Sarah Johnson", "content" => "That's awesome! Let me know if you want to catch up sometime.", "time" => "10:40 AM", "type" => "received"],
    ];

    $mannyMessages = [
        ["sender" => "Manny K", "content" => "Hey Jha, hope you're well! We need a reliable way to collaborate remotely.", "time" => "7:22 PM", "type" => "received"],
        ["sender" => "You", "content" => "Hey Mani! Absolutely — I'm all in. Let's make it work.", "time" => "7:25 PM", "type" => "sent"],
        ["sender" => "Manny K", "content" => "Everything must happen within our secure environment.", "time" => "7:26 PM", "type" => "received"],
        ["sender" => "You", "content" => "Got it. I’ll test out a few options for secure access and keep you posted.", "time" => "7:28 PM", "type" => "sent"],
        ["sender" => "Manny K", "content" => "Appreciate it. Let’s make this seamless and secure.", "time" => "7:29 PM", "type" => "received"],
        ["sender" => "Manny K", "content" => "Also, I’ve done 6 remote sessions lately — TeamViewer worked well every time.", "time" => "12:20 PM", "type" => "received"],
        ["sender" => "Manny K", "content" => "Maybe your MAC ID is blocked by TeamViewer?", "time" => "12:22 PM", "type" => "received"],
        ["sender" => "You", "content" => "I’m on Windows, not Mac — but I’ll check if the MAC address could be causing the block.", "time" => "12:24 PM", "type" => "sent"],
        ["sender" => "Manny K", "content" => "Perfect. That might help. Thanks for looking into it!", "time" => "12:25 PM", "type" => "received"],
        ["sender" => "You", "content" => "No worries. I’ll update you after testing with a reset.", "time" => "12:26 PM", "type" => "sent"],
        ["sender" => "Manny K", "content" => "Great — I really want you on these upcoming projects.", "time" => "12:27 PM", "type" => "received"],
        ["sender" => "You", "content" => "Looking forward to it. Let’s lock this remote setup down first.", "time" => "12:28 PM", "type" => "sent"]
    ];

    $michaelMessages = [
        ["sender" => "You", "content" => "Hi Michael, checking in on the data analysis.", "time" => "Yesterday", "type" => "sent"],
        ["sender" => "Michael Chan", "content" => "Hey, I'm almost done with the analysis, will send it over by end of day.", "time" => "Yesterday", "type" => "received"],
    ];

    $hrMessages = [
        ["sender" => "Innovate Corp HR", "content" => "Dear John, we would like to invite you for an interview.", "time" => "May 27", "type" => "received"],
    ];

    $studioMessages = [
        ["sender" => "Creative Studio Team", "content" => "Meeting scheduled for tomorrow at 2 PM.", "time" => "May 25", "type" => "received"],
        ["sender" => "You", "content" => "Got it. I’ll be there on time.", "time" => "May 25", "type" => "sent"],
        ["sender" => "Creative Studio Team", "content" => "Please prepare the final version of the logo.", "time" => "May 25", "type" => "received"],
        ["sender" => "You", "content" => "Sure. I’ll send it before EOD.", "time" => "May 25", "type" => "sent"],
        ["sender" => "Creative Studio Team", "content" => "The client needs 3 color variants.", "time" => "May 25", "type" => "received"],
        ["sender" => "You", "content" => "Understood. I’ll prepare them.", "time" => "May 25", "type" => "sent"],
        ["sender" => "Creative Studio Team", "content" => "Can you include Pantone references?", "time" => "May 25", "type" => "received"],
        ["sender" => "You", "content" => "Yes, will include those in the style guide.", "time" => "May 25", "type" => "sent"],
        ["sender" => "Creative Studio Team", "content" => "Thanks. The branding PDF also needs an update.", "time" => "May 26", "type" => "received"],
        ["sender" => "You", "content" => "I’ll push the revised version to the drive.", "time" => "May 26", "type" => "sent"],
        ["sender" => "Creative Studio Team", "content" => "New moodboard assets are ready.", "time" => "May 26", "type" => "received"],
        ["sender" => "You", "content" => "Downloaded. They look good.", "time" => "May 26", "type" => "sent"],
        ["sender" => "Creative Studio Team", "content" => "Please give feedback by noon.", "time" => "May 26", "type" => "received"],
        ["sender" => "You", "content" => "Shared my feedback in the Figma file.", "time" => "May 26", "type" => "sent"],
        ["sender" => "Creative Studio Team", "content" => "Let’s finalize the video script today.", "time" => "May 27", "type" => "received"],
        ["sender" => "You", "content" => "I’m reviewing it now. Looks solid.", "time" => "May 27", "type" => "sent"],
        ["sender" => "Creative Studio Team", "content" => "Voiceover needs a calmer tone.", "time" => "May 27", "type" => "received"],
        ["sender" => "You", "content" => "Noted. I’ll adjust the pacing.", "time" => "May 27", "type" => "sent"],
        ["sender" => "Creative Studio Team", "content" => "We need sample cuts by tomorrow.", "time" => "May 27", "type" => "received"],
        ["sender" => "You", "content" => "Working on it. You’ll have it by 11 AM.", "time" => "May 27", "type" => "sent"],
        ["sender" => "Creative Studio Team", "content" => "Add subtle background music too.", "time" => "May 28", "type" => "received"],
        ["sender" => "You", "content" => "I’ll use an ambient track. Will share for approval.", "time" => "May 28", "type" => "sent"],
        ["sender" => "Creative Studio Team", "content" => "The client asked to tone down the animation.", "time" => "May 28", "type" => "received"],
        ["sender" => "You", "content" => "I’ll reduce the transitions and ease the motion.", "time" => "May 28", "type" => "sent"],
        ["sender" => "Creative Studio Team", "content" => "Also update the tagline in the outro.", "time" => "May 28", "type" => "received"],
        ["sender" => "You", "content" => "Done. Using the new tagline they emailed.", "time" => "May 28", "type" => "sent"],
        ["sender" => "Creative Studio Team", "content" => "Great. Let’s upload final assets to Dropbox.", "time" => "May 29", "type" => "received"],
        ["sender" => "You", "content" => "Uploading now. Will share the link shortly.", "time" => "May 29", "type" => "sent"],
        ["sender" => "Creative Studio Team", "content" => "Include the usage license PDF too.", "time" => "May 29", "type" => "received"],
        ["sender" => "You", "content" => "Attached it to the folder. Everything’s complete.", "time" => "May 29", "type" => "sent"],
        ["sender" => "Creative Studio Team", "content" => "Thanks, this project is coming together well!", "time" => "May 29", "type" => "received"],
        ["sender" => "You", "content" => "Happy to hear that. You can count on me.", "time" => "May 29", "type" => "sent"],
        ["sender" => "Creative Studio Team", "content" => "Client approved! Fantastic job.", "time" => "May 30", "type" => "received"],
        ["sender" => "You", "content" => "Amazing! Let’s gear up for the next one.", "time" => "May 30", "type" => "sent"],
        ["sender" => "Creative Studio Team", "content" => "Kickoff meeting on Monday 9 AM.", "time" => "May 30", "type" => "received"],
        ["sender" => "You", "content" => "Added it to my calendar.", "time" => "May 30", "type" => "sent"],
        ["sender" => "Creative Studio Team", "content" => "New storyboard concepts are uploaded.", "time" => "June 1", "type" => "received"],
        ["sender" => "You", "content" => "Will check and comment by EOD.", "time" => "June 1", "type" => "sent"],
        ["sender" => "Creative Studio Team", "content" => "Let’s sync on typography styles too.", "time" => "June 1", "type" => "received"],
        ["sender" => "You", "content" => "We can explore minimal sans-serif sets.", "time" => "June 1", "type" => "sent"],
        ["sender" => "Creative Studio Team", "content" => "I’ll compile a shortlist.", "time" => "June 1", "type" => "received"],
        ["sender" => "You", "content" => "Send it over, I’ll pick the best fit.", "time" => "June 1", "type" => "sent"],
        ["sender" => "Creative Studio Team", "content" => "Revised script uploaded — please confirm.", "time" => "June 2", "type" => "received"],
        ["sender" => "You", "content" => "Script looks perfect. No changes needed.", "time" => "June 2", "type" => "sent"],
        ["sender" => "Creative Studio Team", "content" => "Alright. Moving to the production phase now.", "time" => "June 2", "type" => "received"],
        ["sender" => "You", "content" => "I’ll prep the motion templates in parallel.", "time" => "June 2", "type" => "sent"],
        ["sender" => "Creative Studio Team", "content" => "Cool. Check transitions in scene 3 — looks jittery.", "time" => "June 2", "type" => "received"],
        ["sender" => "You", "content" => "Yes, I noticed. Fixing that today.", "time" => "June 2", "type" => "sent"],
        ["sender" => "Creative Studio Team", "content" => "Let’s review the rough cut tomorrow.", "time" => "June 2", "type" => "received"],
        ["sender" => "You", "content" => "Ready when you are. This version’s more polished.", "time" => "June 2", "type" => "sent"]
    ];
@endphp

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
                <div class="message-item active" data-contact-name="Sarah Johnson" data-messages='@json($sarahMessages)'>
                    <div class="profile-img"></div>
                    <div class="message-info">
                        <h6>Sarah Johnson</h6>
                        <p>That's awesome! Let me know if you want...</p>
                    </div>
                    <span class="timestamp">10:40 AM</span>
                </div>
                <div class="message-item" data-contact-name="Manny K" data-messages='@json($mannyMessages)'>
                    <div class="profile-img-initials">mk</div>
                    <div class="message-info">
                        <h6>Manny K</h6>
                        <p>Looking forward to it. Let’s lock this remote setup down first.</p>
                    </div>
                    <span class="timestamp">12:28 PM</span>
                </div>
                <div class="message-item unread" data-contact-name="Michael Chan" data-messages='@json($michaelMessages)'>
                    <div class="profile-img"></div>
                    <div class="message-info">
                        <h6>Michael Chan</h6>
                        <p>Hey, I'm almost done with the analysis...</p>
                    </div>
                    <span class="timestamp">Yesterday</span>
                </div>
                <div class="message-item" data-contact-name="Innovate Corp HR" data-messages='@json($hrMessages)'>
                    <div class="profile-img-initials">ic</div>
                    <div class="message-info">
                        <h6>Innovate Corp HR</h6>
                        <p>Dear John, we would like to invite you for an...</p>
                    </div>
                    <span class="timestamp">May 27</span>
                </div>
                <div class="message-item" data-contact-name="Creative Studio Team" data-messages='@json($studioMessages)'>
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
