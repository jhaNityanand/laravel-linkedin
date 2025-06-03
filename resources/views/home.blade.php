@extends('layouts.frontend.app')

@section('title', $title)

@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css') }}">
@endsection

@section('content')
    <div class="container main-content">
        <div class="row">
            <div class="col-lg-3 d-none d-md-block left-sidebar">
                <div class="card profile-card">
                    <div class="profile-bg"></div>
                    <div class="profile-img"></div>
                    <div class="profile-info">
                        <h5>John Doe</h5>
                        <p>Senior Software Engineer at Tech Corp</p>
                    </div>
                    <div class="profile-stats">
                        <div>
                            <span>Profile viewers</span>
                            <span>127</span>
                        </div>
                        <div>
                            <span>Post impressions</span>
                            <span>1,234</span>
                        </div>
                    </div>
                    <div class="access-tools">
                        <p>Access exclusive tools & insights</p>
                        <a href="#">Try Premium for free</a>
                    </div>
                    <div class="my-items">
                        <a href="#"><i class="fas fa-bookmark me-2"></i> My Items</a>
                    </div>
                </div>

                <div class="card recent-groups-events mt-3">
                    <div class="card-body p-0">
                        <h6 class="card-title px-3 pt-3 mb-2">Recent</h6>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><span class="hashtag">#javascript</span></li>
                            <li class="list-group-item"><span class="hashtag">#reactjs</span></li>
                            <li class="list-group-item"><span class="hashtag">#typescript</span></li>
                            <li class="list-group-item"><span class="hashtag">#Tech Professionals</span></li>
                            <li class="list-group-item"><span class="hashtag">#React Developer Meetup</span></li>
                        </ul>
                        <h6 class="card-title px-3 pt-3 mb-2">Groups</h6>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><i class="fas fa-users me-2"></i> JavaScript Developers</li>
                            <li class="list-group-item"><i class="fas fa-users me-2"></i> A React Community</li>
                        </ul>
                        <h6 class="card-title px-3 pt-3 mb-2">Events</h6>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><i class="fas fa-calendar-alt me-2"></i> Tech Conference 2024</li>
                        </ul>
                        <button class="show-more-btn">Show more <i class="fas fa-chevron-down ms-1"></i></button>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 main-feed">
                <div class="card start-post-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="profile-img me-2" style="width: 48px; height: 48px;"></div>
                            <input type="text" class="form-control post-input" placeholder="Start a post" data-bs-toggle="modal" data-bs-target="#postModal">
                        </div>
                        <div class="d-flex justify-content-around post-options">
                            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#photoUploadModal"><i class="fas fa-image fa-icon text-primary"></i> Photo</button>
                            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#videoUploadModal"><i class="fas fa-video fa-icon text-success"></i> Video</button>
                            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#eventModal"><i class="fas fa-calendar-alt fa-icon text-warning"></i> Event</button>
                            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#articleModal"><i class="fas fa-pencil-alt fa-icon text-danger"></i> Write article</button>
                        </div>
                    </div>
                </div>

                <div class="card post-card mt-3">
                    <div class="card-body">
                        <div class="post-header">
                            <div class="profile-img"></div>
                            <div class="post-meta">
                                <h6>Priya Mehta</h6>
                                <p>UX Designer at Zeta • 3h</p>
                            </div>
                        </div>
                        <div class="post-content">
                            <p>Thrilled to have completed our latest usability study! The insights gathered will directly impact our product roadmap. User empathy always leads the way. #UXDesign #UserResearch</p>
                        </div>
                        <div class="post-stats">
                            <span><i class="fas fa-thumbs-up text-primary"></i> 89</span>
                            <span>12 comments • 3 shares</span>
                        </div>
                        <div class="d-flex justify-content-around post-actions">
                            <button class="btn btn-light"><i class="far fa-thumbs-up fa-icon"></i> Like</button>
                            <button class="btn btn-light"><i class="far fa-comment-dots fa-icon"></i> Comment</button>
                            <button class="btn btn-light"><i class="fas fa-share fa-icon"></i> Share</button>
                            <button class="btn btn-light"><i class="fas fa-paper-plane fa-icon"></i> Send</button>
                        </div>
                    </div>
                </div>

                <div class="card post-card mt-3">
                    <div class="card-body">
                        <div class="post-header">
                            <div class="profile-img"></div>
                            <div class="post-meta">
                                <h6>Arjun Kapoor</h6>
                                <p>Full Stack Developer • 5h</p>
                            </div>
                        </div>
                        <div class="post-content">
                            <p>🚀 Just deployed a microservices-based architecture using Laravel Octane + Docker + RabbitMQ for a fintech client. The performance gains are insane! Let me know if you're interested in a case study. #Laravel #Docker #Microservices</p>
                        </div>
                        <div class="post-image">
                            <img src="https://placehold.co/600x300/ddeeff/333?text=System+Architecture+Diagram" alt="Architecture Diagram" class="img-fluid rounded">
                        </div>
                        <div class="post-stats">
                            <span><i class="fas fa-thumbs-up text-primary"></i> 302</span>
                            <span>55 comments • 20 shares</span>
                        </div>
                        <div class="d-flex justify-content-around post-actions">
                            <button class="btn btn-light"><i class="far fa-thumbs-up fa-icon"></i> Like</button>
                            <button class="btn btn-light"><i class="far fa-comment-dots fa-icon"></i> Comment</button>
                            <button class="btn btn-light"><i class="fas fa-share fa-icon"></i> Share</button>
                            <button class="btn btn-light"><i class="fas fa-paper-plane fa-icon"></i> Send</button>
                        </div>
                    </div>
                </div>

                <div class="card post-card mt-3">
                    <div class="card-body">
                        <div class="post-header">
                            <div class="profile-img"></div>
                            <div class="post-meta">
                                <h6>Anjali Rao</h6>
                                <p>HR Manager at FinEdge • 10h</p>
                            </div>
                        </div>
                        <div class="post-content">
                            <p>We’re hiring! Looking for passionate engineers who want to build meaningful tech in the finance space. Culture, growth, and purpose are at the heart of our company. DM for referrals! #Hiring #EngineeringJobs #Fintech</p>
                        </div>
                        <div class="post-stats">
                            <span><i class="fas fa-thumbs-up text-primary"></i> 210</span>
                            <span>18 comments • 5 shares</span>
                        </div>
                        <div class="d-flex justify-content-around post-actions">
                            <button class="btn btn-light"><i class="far fa-thumbs-up fa-icon"></i> Like</button>
                            <button class="btn btn-light"><i class="far fa-comment-dots fa-icon"></i> Comment</button>
                            <button class="btn btn-light"><i class="fas fa-share fa-icon"></i> Share</button>
                            <button class="btn btn-light"><i class="fas fa-paper-plane fa-icon"></i> Send</button>
                        </div>
                    </div>
                </div>

                <div class="card post-card mt-3">
                    <div class="card-body">
                        <div class="post-header">
                            <div class="profile-img"></div>
                            <div class="post-meta">
                                <h6>Sarah Johnson</h6>
                                <p>Product Manager at Microsoft • 2h</p>
                            </div>
                        </div>
                        <div class="post-content">
                            <p>Excited to share that our team just launched a new feature that will help developers build faster! The feedback from the beta users has been incredible. Sometimes the best innovations come from listening to your users.</p>
                        </div>
                        <div class="post-image">
                            <img src="https://placehold.co/600x300/eef3f8/666?text=Post+Image" alt="Post Image" class="img-fluid rounded">
                        </div>
                        <div class="post-stats">
                            <span><i class="fas fa-thumbs-up text-primary"></i> 177</span>
                            <span>23 comments • 8 shares</span>
                        </div>
                        <div class="d-flex justify-content-around post-actions">
                            <button class="btn btn-light"><i class="far fa-thumbs-up fa-icon"></i> Like</button>
                            <button class="btn btn-light"><i class="far fa-comment-dots fa-icon"></i> Comment</button>
                            <button class="btn btn-light"><i class="fas fa-share fa-icon"></i> Share</button>
                            <button class="btn btn-light"><i class="fas fa-paper-plane fa-icon"></i> Send</button>
                        </div>
                    </div>
                </div>

                <div class="card post-card mt-3">
                    <div class="card-body">
                        <div class="post-header">
                            <div class="profile-img"></div>
                            <div class="post-meta">
                                <h6>Michael Chan</h6>
                                <p>Data Scientist at Google • 1d</p>
                            </div>
                        </div>
                        <div class="post-content">
                            <p>Just finished reading an insightful article on the future of AI in healthcare. The potential for personalized medicine is truly transformative. What are your thoughts on this?</p>
                        </div>
                        <div class="post-image">
                            <img src="https://placehold.co/600x300/eef3f8/666?text=AI+in+Healthcare" alt="Post Image" class="img-fluid rounded">
                        </div>
                        <div class="post-stats">
                            <span><i class="fas fa-thumbs-up text-primary"></i> 250</span>
                            <span>45 comments • 12 shares</span>
                        </div>
                        <div class="d-flex justify-content-around post-actions">
                            <button class="btn btn-light"><i class="far fa-thumbs-up fa-icon"></i> Like</button>
                            <button class="btn btn-light"><i class="far fa-comment-dots fa-icon"></i> Comment</button>
                            <button class="btn btn-light"><i class="fas fa-share fa-icon"></i> Share</button>
                            <button class="btn btn-light"><i class="fas fa-paper-plane fa-icon"></i> Send</button>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-3 d-none d-md-block right-sidebar">
                <div class="card add-to-feed">
                    <div class="card-body">
                        <h6 class="card-title">Add to your feed</h6>
                        <div class="feed-item mt-3">
                            <div class="profile-img"></div>
                            <div class="feed-info me-auto">
                                <h6>React...</h6>
                                <p>Company • Tech</p>
                            </div>
                            <button class="btn follow-btn"><i class="fas fa-plus me-1"></i> Follow</button>
                        </div>
                        <div class="feed-item">
                            <div class="profile-img"></div>
                            <div class="feed-info me-auto">
                                <h6>JavaS...</h6>
                                <p>Company • Tech</p>
                            </div>
                            <button class="btn follow-btn"><i class="fas fa-plus me-1"></i> Follow</button>
                        </div>
                        <div class="feed-item">
                            <div class="profile-img"></div>
                            <div class="feed-info me-auto">
                                <h6>Tech...</h6>
                                <p>Company • Tech</p>
                            </div>
                            <button class="btn follow-btn"><i class="fas fa-plus me-1"></i> Follow</button>
                        </div>
                        <a href="#" class="view-all-btn">View all recommendations <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>

                <div class="card linkedin-news mt-3">
                    <div class="card-body">
                        <h6 class="card-title">LinkedIn News</h6>
                        <ul class="list-unstyled">
                            <li class="news-item">
                                <h6>Tech layoffs continue</h6>
                                <p>Top news • 12,345 readers</p>
                            </li>
                            <li class="news-item">
                                <h6>AI adoption in enterprise</h6>
                                <p>Technology • 6,801 readers</p>
                            </li>
                            <li class="news-item">
                                <h6>Remote work trends 2024</h6>
                                <p>Workplace • 3,578 readers</p>
                            </li>
                            <li class="news-item">
                                <h6>Startup funding outlook</h6>
                                <p>Venture Capital • 4,224 readers</p>
                            </li>
                            <li class="news-item">
                                <h6>Career switching strategies</h6>
                                <p>Professional Development • 9,875 readers</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card linkedin-news mt-3">
                    <div class="card-body">
                        <h6 class="card-title">Today's most viewed games</h6>
                        <ul class="list-unstyled">
                            <li class="news-item">
                                <h6>Queens</h6>
                                <p>Crown up in this word game</p>
                            </li>
                            <li class="news-item">
                                <h6>Crossclimb</h6>
                                <p>Unlock a trivia challenge</p>
                            </li>
                            <li class="news-item">
                                <h6>Pinpoint</h6>
                                <p>Guess the category</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="postModalLabel">Create a post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="profile-img"></div>
                        <div>
                            <h6>John Doe</h6>
                            <p class="text-muted mb-0" style="font-size: 0.8rem;">Post to Anyone</p>
                        </div>
                    </div>
                    <textarea class="form-control" placeholder="What do you want to talk about?" rows="6"></textarea>
                </div>
                <div class="modal-footer">
                    <div class="post-options">
                        <button class="btn btn-light"><i class="fas fa-image fa-icon"></i></button>
                        <button class="btn btn-light"><i class="fas fa-video fa-icon"></i></button>
                        <button class="btn btn-light"><i class="fas fa-calendar-alt fa-icon"></i></button>
                    </div>
                    <button type="button" class="btn post-btn">Post</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="photoUploadModal" tabindex="-1" aria-labelledby="photoUploadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="photoUploadModalLabel">Add Photos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="file-upload-dropzone" id="photoDropzone">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <p>Drag and drop photos here</p>
                        <small>or click to browse</small>
                        <input type="file" class="file-upload-input" id="photoFileInput" accept="image/*" multiple>
                    </div>
                    <div id="photoPreview" class="row row-cols-3 g-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="addPhotosBtn">Add to post</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="videoUploadModal" tabindex="-1" aria-labelledby="videoUploadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoUploadModalLabel">Add Videos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="file-upload-dropzone" id="videoDropzone">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <p>Drag and drop videos here</p>
                        <small>or click to browse</small>
                        <input type="file" class="file-upload-input" id="videoFileInput" accept="video/*" multiple>
                    </div>
                    <div id="videoPreview" class="row row-cols-3 g-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="addVideosBtn">Add to post</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade event-modal" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventModalLabel">Create Event</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="eventName" class="form-label">Event Name*</label>
                        <input type="text" class="form-control" id="eventName" required>
                    </div>
                    <div class="mb-3">
                        <label for="eventDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="eventDescription" rows="3"></textarea>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="eventDate" class="form-label">Date*</label>
                            <input type="date" class="form-control" id="eventDate" required>
                        </div>
                        <div class="col-md-6">
                            <label for="eventTime" class="form-label">Time*</label>
                            <input type="time" class="form-control" id="eventTime" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="eventLocation" class="form-label">Location</label>
                        <input type="text" class="form-control" id="eventLocation" placeholder="e.g., Online, Conference Room A">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="createEventBtn">Create Event</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade article-modal" id="articleModal" tabindex="-1" aria-labelledby="articleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="articleModalLabel">Write an Article</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <input type="text" class="form-control form-control-lg" id="articleTitle" placeholder="Title" required>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" id="articleContent" placeholder="Write your article content here..." rows="15"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Discard</button>
                    <button type="button" class="btn btn-primary" id="publishArticleBtn">Publish</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('frontend/js/home.js') }}"></script>
@endsection
