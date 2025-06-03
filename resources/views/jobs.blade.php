@extends('layouts.frontend.app')

@section('title', $title)

@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/jobs.css') }}">
@endsection

@php
    $jobs = [
        [
            'title' => 'Senior Software Engineer',
            'company' => 'Tech Solutions Inc.',
            'location' => 'San Francisco, CA',
            'posted' => '1 day ago',
            'easy_apply' => true,
            'description' => 'We are seeking a highly skilled Senior Software Engineer to join our dynamic team. You will be responsible for designing, developing, and maintaining scalable software solutions. Requires 5+ years of experience with modern web technologies (React, Node.js) and cloud platforms (AWS/Azure). Strong problem-solving skills and a passion for building high-quality software are essential.'
        ],
        [
            'title' => 'Product Manager',
            'company' => 'Innovate Corp',
            'location' => 'New York, NY',
            'posted' => '3 days ago',
            'easy_apply' => false,
            'description' => 'Innovate Corp is looking for an experienced Product Manager to lead the development of our next-generation mobile application. You will define product strategy, roadmap, and specifications, working closely with engineering, design, and marketing teams. A strong understanding of user experience and market trends is crucial.'
        ],
        [
            'title' => 'UX Designer',
            'company' => 'Creative Studio',
            'location' => 'Remote',
            'posted' => '5 days ago',
            'easy_apply' => true,
            'description' => 'Creative Studio is seeking a talented UX Designer to create intuitive and engaging user experiences for our digital products. You will conduct user research, create wireframes and prototypes, and collaborate with cross-functional teams. Proficiency in Figma/Sketch and a strong portfolio are required.'
        ],
        [
            'title' => 'Laravel Developer',
            'company' => 'CodeCraftsmen Pvt Ltd',
            'location' => 'Delhi, India',
            'posted' => '2 days ago',
            'easy_apply' => true,
            'description' => 'We are hiring a Laravel Developer with 2+ years of experience in PHP and Laravel frameworks. Responsibilities include API integration, MySQL optimization, and building admin panels.'
        ],
        [
            'title' => 'Junior QA Tester',
            'company' => 'Testly Software',
            'location' => 'Bangalore, India',
            'posted' => 'Today',
            'easy_apply' => false,
            'description' => 'Entry-level QA Tester needed to assist with writing test cases, performing manual tests, and documenting bugs. No prior experience required but basic understanding of SDLC preferred.'
        ],
        [
            'title' => 'DevOps Engineer',
            'company' => 'CloudX Solutions',
            'location' => 'Remote',
            'posted' => '4 days ago',
            'easy_apply' => true,
            'description' => 'Looking for a DevOps Engineer experienced in CI/CD, Docker, Kubernetes, and cloud infrastructure automation. Strong Linux and scripting knowledge is a must.'
        ]
    ];
@endphp

@section('content')
    <div class="container main-content">
        <div class="row">
            <div class="col-lg-3 left-sidebar">
                <div class="card job-filters-card">
                    <div class="filter-section">
                        <h6>Search Filters</h6>
                        <div class="mb-3">
                            <label for="keywords" class="form-label visually-hidden">Keywords</label>
                            <input type="text" class="form-control" id="keywords" placeholder="Job title, skills, or company">
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label visually-hidden">Location</label>
                            <input type="text" class="form-control" id="location" placeholder="Location (e.g. London)">
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary btn-filter" id="applyFilters">Apply Filters</button>
                            <button class="btn btn-outline-secondary btn-filter" id="clearFilters">Clear Filters</button>
                        </div>
                    </div>

                    <div class="filter-section">
                        <h6>Experience Level</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Internship" id="expInternship">
                            <label class="form-check-label" for="expInternship">Internship</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Entry level" id="expEntry">
                            <label class="form-check-label" for="expEntry">Entry level</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Associate" id="expAssociate">
                            <label class="form-check-label" for="expAssociate">Associate</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Mid-Senior level" id="expMidSenior">
                            <label class="form-check-label" for="expMidSenior">Mid-Senior level</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Director" id="expDirector">
                            <label class="form-check-label" for="expDirector">Director</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Executive" id="expExecutive">
                            <label class="form-check-label" for="expExecutive">Executive</label>
                        </div>
                    </div>

                    <div class="filter-section">
                        <h6>Job Type</h6>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Full-time" id="typeFullTime">
                            <label class="form-check-label" for="typeFullTime">Full-time</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Part-time" id="typePartTime">
                            <label class="form-check-label" for="typePartTime">Part-time</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Contract" id="typeContract">
                            <label class="form-check-label" for="typeContract">Contract</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Temporary" id="typeTemporary">
                            <label class="form-check-label" for="typeTemporary">Temporary</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="Volunteer" id="typeVolunteer">
                            <label class="form-check-label" for="typeVolunteer">Volunteer</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 main-feed">
                <h5 class="mb-3">Recommended jobs for you</h5>

                @foreach($jobs as $job)
                    <div class="card job-listing-card" data-bs-toggle="modal" data-bs-target="#jobDetailsModal"
                        data-job-title="{{ $job['title'] }}"
                        data-company-name="{{ $job['company'] }}"
                        data-location="{{ $job['location'] }}"
                        data-posted-time="{{ $job['posted'] }}"
                        data-easy-apply="{{ $job['easy_apply'] ? 'true' : 'false' }}"
                        data-description="{{ $job['description'] }}">

                        <div class="card-body d-flex align-items-start">
                            <div class="company-logo"></div>
                            <div>
                                <h6 class="job-title">{{ $job['title'] }}</h6>
                                <p class="company-name">{{ $job['company'] }}</p>
                                <p class="job-location">{{ $job['location'] }}</p>
                                <p class="job-posted">{{ $job['posted'] }}</p>
                                @if($job['easy_apply'])
                                    <span class="easy-apply-badge">Easy Apply</span>
                                @endif
                                <p class="job-description-snippet">{{ \Illuminate\Support\Str::limit($job['description'], 150, '...') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach


                <div class="text-center mt-4">
                    <a href="#" class="text-decoration-none text-primary show-all-link">View all 100+ jobs <i class="fas fa-arrow-right ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade job-details-modal" id="jobDetailsModal" tabindex="-1" aria-labelledby="jobDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="jobDetailsModalLabel">Job Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-start mb-3">
                        <div class="company-logo-modal"></div>
                        <div>
                            <h4 class="job-title-modal" id="modalJobTitle"></h4>
                            <h5 class="company-name-modal" id="modalCompanyName"></h5>
                            <p class="job-location-modal" id="modalJobLocation"></p>
                            <p class="job-posted-modal" id="modalJobPosted"></p>
                        </div>
                    </div>
                    <button class="btn apply-btn-modal w-100 mb-3" id="modalApplyButton">Apply</button>
                    <div class="job-description-full" id="modalJobDescription">
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('frontend/js/jobs.js') }}"></script>
@endsection
