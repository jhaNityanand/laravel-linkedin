@extends('layouts.frontend.app')

@section('title', $title)

@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/notifications.css') }}">
@endsection

@section('content')
    <div class="container main-content">
        <div class="row">
            <div class="col-lg-3 left-sidebar">
                <div class="card notification-categories-card">
                    <div class="card-body p-0">
                        <h5 class="card-title px-3 pt-3 mb-2">Notifications</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item active" data-filter="all">All</li>
                            <li class="list-group-item" data-filter="my-posts">My posts</li>
                            <li class="list-group-item" data-filter="mentions">Mentions</li>
                            <li class="list-group-item" data-filter="reactions">Reactions</li>
                            <li class="list-group-item" data-filter="comments">Comments</li>
                            <li class="list-group-item" data-filter="jobs">Jobs</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 main-feed">
                <div class="card notification-list-card">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Recent Notifications</h6>
                        <button class="btn btn-sm btn-link text-decoration-none" id="markAllReadBtn">Mark all as read</button>
                    </div>
                    <div class="card-body p-0" id="notificationList">
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('frontend/js/notifications.js') }}"></script>
@endsection
