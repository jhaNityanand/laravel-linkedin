@extends('layouts.frontend.app')

@section('title', $title)

@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/mynetwork.css') }}">
@endsection

@section('content')
    <div class="container main-content">
        <div class="row">
            <div class="col-lg-3 d-none d-md-block left-sidebar">
                <div class="card manage-network-card">
                    <div class="card-body p-0">
                        <h6 class="card-title px-3 pt-3 mb-2">Manage my network</h6>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-user-friends me-2"></i> Connections</span>
                                <span class="badge">373</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-address-book me-2"></i> Contacts</span>
                                <span class="badge">114</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-users me-2"></i> Following & followers</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-users me-2"></i> Groups</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-calendar-alt me-2"></i> Events</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-file-alt me-2"></i> Pages</span>
                                <span class="badge">33</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-newspaper me-2"></i> Newsletters</span>
                                <span class="badge">4</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 main-feed">
                <div class="card invitations-card">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Invitations (1)</h6>
                        <a href="#" class="text-decoration-none text-primary show-all-link">Show all</a>
                    </div>
                    <div class="card-body">
                        <div class="invitation-item">
                            <div class="profile-img"></div>
                            <div class="invitation-info">
                                <h6>Harry Patel</h6>
                                <p>Web Developer</p>
                                <p class="text-muted mb-0" style="font-size: 0.75rem;"><i class="fas fa-users me-1"></i> 49 mutual connections</p>
                            </div>
                            <div class="invitation-actions">
                                <button class="btn btn-outline-secondary btn-ignore">Ignore</button>
                                <button class="btn btn-primary btn-accept" data-bs-toggle="modal" data-bs-target="#successModal">Accept</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card daily-games-card mt-3">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Stay in touch through daily games</h6>
                        <a href="#" class="text-decoration-none text-primary"><i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="card-body d-flex flex-nowrap">
                        <div class="game-item">
                            <i class="fas fa-dice game-icon"></i>
                            <h6 class="game-title">Zip #72</h6>
                            <p class="game-date">Wednesday, May 28</p>
                            <button class="btn btn-play">Solve</button>
                        </div>
                        <div class="game-item">
                            <i class="fas fa-chess-queen game-icon"></i>
                            <h6 class="game-title">Queens #F293</h6>
                            <p class="game-date">Wednesday, May 28</p>
                            <button class="btn btn-play">Solve</button>
                        </div>
                        <div class="game-item">
                            <i class="fas fa-puzzle-piece game-icon"></i>
                            <h6 class="game-title">Tango #233</h6>
                            <p class="game-date">Wednesday, May 28</p>
                            <button class="btn btn-play">Solve</button>
                        </div>
                        <div class="game-item">
                            <i class="fas fa-brain game-icon"></i>
                            <h6 class="game-title">Solw</h6>
                            <p class="game-date">Wednesday, May 28</p>
                            <button class="btn btn-play">Solve</button>
                        </div>
                        </div>
                </div>

                <div class="card premium-ad-card mt-3">
                    <div class="card-header bg-white d-flex justify-content-end">
                        <button class="btn close-btn"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="card-body text-center">
                        <div class="ad-content justify-content-center mb-3">
                            <div class="ad-image"></div>
                            <div class="ad-text">
                                <h6>Grow your career faster</h6>
                                <p>Find out for a role with personalized cover letters and resume tips.</p>
                            </div>
                        </div>
                        <button class="btn btn-premium">Try Premium for 1 month</button>
                    </div>
                </div>

                <div class="card people-you-may-know-card mt-3">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Software Engineers you may know</h6>
                        <a href="#" class="text-decoration-none text-primary show-all-link">Show all</a>
                    </div>
                    <div class="card-body">
                        <div class="profile-grid">
                            <div class="profile-item">
                                <button class="profile-close-btn"><i class="fas fa-times"></i></button>
                                <div class="profile-img"></div>
                                <h6>Jesus Rosas Becerra</h6>
                                <p>Jr. Android Developer</p>
                                <p class="text-muted mb-2" style="font-size: 0.7rem;"><i class="fas fa-users me-1"></i> 1 mutual connection</p>
                                <button class="btn btn-connect" data-bs-toggle="modal" data-bs-target="#successModal">Connect</button>
                            </div>
                            <div class="profile-item">
                                <button class="profile-close-btn"><i class="fas fa-times"></i></button>
                                <div class="profile-img"></div>
                                <h6>Roland Roland Pall</h6>
                                <p>Frontend Developer</p>
                                <p class="text-muted mb-2" style="font-size: 0.7rem;"><i class="fas fa-users me-1"></i> 1 mutual connection</p>
                                <button class="btn btn-connect" data-bs-toggle="modal" data-bs-target="#successModal">Connect</button>
                            </div>
                            <div class="profile-item">
                                <button class="profile-close-btn"><i class="fas fa-times"></i></button>
                                <div class="profile-img"></div>
                                <h6>Manasvi Lathiya</h6>
                                <p>Software Developer</p>
                                <p class="text-muted mb-2" style="font-size: 0.7rem;"><i class="fas fa-users me-1"></i> 1 mutual connection</p>
                                <button class="btn btn-connect" data-bs-toggle="modal" data-bs-target="#successModal">Connect</button>
                            </div>
                            <div class="profile-item">
                                <button class="profile-close-btn"><i class="fas fa-times"></i></button>
                                <div class="profile-img"></div>
                                <h6>Shivani Jadav</h6>
                                <p>Software Developer</p>
                                <p class="text-muted mb-2" style="font-size: 0.7rem;"><i class="fas fa-users me-1"></i> 1 mutual connection</p>
                                <button class="btn btn-connect" data-bs-toggle="modal" data-bs-target="#successModal">Connect</button>
                            </div>
                            </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade success-modal" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <i class="fas fa-check-circle"></i>
                    <h5 id="successModalLabel">Action Successful!</h5>
                    <p>Your request has been processed.</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-ok" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('frontend/js/mynetwork.js') }}"></script>
@endsection
