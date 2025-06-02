@extends('layouts.frontend.app')

@section('title', $title)

@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/profile.css') }}">
    <style>
        .language-item, .skill-item {
            margin-bottom: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="container main-content">
        <div class="row">
            <div class="col-lg-8">
                <div class="card profile-header-card">
                    <div class="profile-bg" @if($profile->cover_photo) style="background-image: url('{{ asset('storage/' . $profile->cover_photo) }}')" @endif>
                        <div class="edit-icon" data-bs-toggle="modal" data-bs-target="#editBannerModal">
                            <i class="fas fa-pencil-alt"></i>
                        </div>
                    </div>
                    <div class="profile-img" id="auth-user-profile-img" data-bs-toggle="modal" data-bs-target="#profilePhotoUploadModal">
                        @if ($profile->profile_picture)
                            <img src="{{ asset('storage/' . $profile->profile_picture) }}" alt="Profile Picture">
                        @else
                            <div class="profile-img-initials">{{ substr($user->name, 0, 1) }}{{ substr(strrchr($user->name, ' '), 1, 1) }}</div>
                        @endif
                    </div>
                    <div class="profile-info">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h3>{{ $user->name }}</h3>
                                <p class="mb-1">{{ $profile->headline ?? 'Add a headline' }}</p>
                                <p class="text-muted mb-1">{{ $profile->location ?? 'Add a location' }} • 500+ connections <a href="#" class="contact-info-link" data-bs-toggle="modal" data-bs-target="#contactInfoModal">Contact info</a></p>
                            </div>
                            <div class="edit-icon" data-bs-toggle="modal" data-bs-target="#editIntroModal">
                                <i class="fas fa-pencil-alt"></i>
                            </div>
                        </div>
                        <div class="d-flex mt-3 profile-actions">
                            <button class="btn btn-primary">Open to</button>
                            <button class="btn btn-outline-primary">Add profile section</button>
                            <button class="btn btn-light">More</button>
                        </div>
                    </div>
                </div>

                <div class="card section-card mt-3">
                    <div class="card-header">
                        <h5>About</h5>
                        <div class="edit-add-icons">
                            <i class="fas fa-pencil-alt" data-bs-toggle="modal" data-bs-target="#editAboutModal"></i>
                        </div>
                    </div>
                    <div class="card-body about-section">
                        <p>{{ $profile->about ?? 'Tell us about yourself...' }}</p>
                    </div>
                </div>

                <div class="card section-card mt-3">
                    <div class="card-header">
                        <h5>Experience</h5>
                        <div class="edit-add-icons">
                            <i class="fas fa-plus" data-bs-toggle="modal" data-bs-target="#addExperienceModal"></i>
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- Dynamic Experience will be loaded here --}}
                        @forelse ($profile->experience as $experience)
                            <div class="experience-item">
                                <div class="company-logo"><i class="fas fa-briefcase"></i></div>
                                <div class="details">
                                    <h6>{{ $experience['title'] }}</h6>
                                    <p>{{ $experience['company'] }}</p>
                                    <p class="text-muted">{{ $experience['start_date'] }} – {{ $experience['end_date'] ?? 'Present' }}</p>
                                    <p class="text-muted">{{ $experience['location'] }}</p>
                                    <p class="description">{{ $experience['description'] }}</p>
                                </div>
                            </div>
                        @empty
                            <p>No experience added yet.</p>
                        @endforelse
                    </div>
                </div>

                <div class="card section-card mt-3">
                    <div class="card-header">
                        <h5>Education</h5>
                        <div class="edit-add-icons">
                            <i class="fas fa-plus" data-bs-toggle="modal" data-bs-target="#addEducationModal"></i>
                        </div>
                    </div>
                    <div class="card-body">
                         {{-- Dynamic Education will be loaded here --}}
                        @forelse ($profile->education as $education)
                            <div class="education-item">
                                <div class="school-logo"><i class="fas fa-graduation-cap"></i></div>
                                <div class="details">
                                    <h6>{{ $education['school'] }}</h6>
                                    <p>{{ $education['degree'] }}</p>
                                    <p class="text-muted">{{ $education['start_date'] }} – {{ $education['end_date'] ?? 'Present' }}</p>
                                </div>
                            </div>
                        @empty
                             <p>No education added yet.</p>
                        @endforelse
                    </div>
                </div>

                <div class="card section-card mt-3">
                    <div class="card-header">
                        <h5>Licenses & certifications</h5>
                        <div class="edit-add-icons">
                            <i class="fas fa-plus" data-bs-toggle="modal" data-bs-target="#addLicenseModal"></i>
                        </div>
                    </div>
                    <div class="card-body">
                         {{-- Dynamic Certifications will be loaded here --}}
                        @forelse ($profile->certifications as $certification)
                             <div class="license-item">
                                <div class="badge-icon"><i class="fas fa-certificate"></i></div>
                                <div class="details">
                                     <h6>{{ $certification['name'] }}</h6>
                                     <p>{{ $certification['issuing_organization'] }}</p>
                                     <p class="text-muted">Issued: {{ $certification['issue_date'] }} {{ $certification['expiry_date'] ? ' - Expires: ' . $certification['expiry_date'] : '' }}</p>
                                </div>
                            </div>
                        @empty
                            <p>No licenses or certifications added yet.</p>
                        @endforelse
                    </div>
                </div>

                <div class="card section-card mt-3">
                    <div class="card-header">
                        <h5>Skills</h5>
                        <div class="edit-add-icons">
                            <i class="fas fa-plus" data-bs-toggle="modal" data-bs-target="#addSkillModal"></i>
                        </div>
                    </div>
                    <div class="card-body">
                         {{-- Dynamic Skills will be loaded here --}}
                        @forelse ($profile->skills as $skill)
                            <div class="skill-item">
                                <div class="skill-name">{{ $skill['name'] }}</div>
                            </div>
                        @empty
                            <p>No skills added yet.</p>
                        @endforelse
                    </div>
                </div>

                <div class="card section-card mt-3">
                    <div class="card-header">
                        <h5>Languages</h5>
                        <div class="edit-add-icons">
                            <i class="fas fa-plus" data-bs-toggle="modal" data-bs-target="#addLanguageModal"></i>
                        </div>
                    </div>
                    <div class="card-body">
                         {{-- Dynamic Languages will be loaded here --}}
                        @forelse ($profile->languages as $language)
                            <div class="language-item">
                                <div class="language-name">{{ $language['name'] }}</div>
                                <div class="language-proficiency text-muted">{{ ucfirst(str_replace('_', ' ', $language['proficiency'])) }}</div>
                            </div>
                        @empty
                            <p>No languages added yet.</p>
                        @endforelse
                    </div>
                </div>

            </div>

            <div class="col-lg-4 d-none d-lg-block right-sidebar">
                <div class="card people-you-may-know-card">
                    <div class="card-body">
                        <h6 class="card-title">People you may know</h6>
                        <div class="profile-item mt-3">
                            <div class="profile-img"></div>
                            <div class="profile-info">
                                <h6>Alice Wonderland</h6>
                                <p>UX Designer at Design Co.</p>
                            </div>
                            <button class="btn btn-connect">Connect</button>
                        </div>
                        <div class="profile-item">
                            <div class="profile-img"></div>
                            <div class="profile-info">
                                <h6>Bob The Builder</h6>
                                <p>Project Manager</p>
                            </div>
                            <button class="btn btn-connect">Connect</button>
                        </div>
                        <div class="profile-item">
                            <div class="profile-img"></div>
                            <div class="profile-info">
                                <h6>Charlie Chaplin</h6>
                                <p>Software Engineer</p>
                            </div>
                            <button class="btn btn-connect">Connect</button>
                        </div>
                        <a href="#" class="view-all-btn">View all <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>

                <div class="card promoted-ad-card mt-3">
                    <div class="card-body text-center">
                        <p class="text-muted" style="font-size: 0.8rem;">Promoted</p>
                        <div class="ad-content">Your Ad Here</div>
                        <div class="ad-text mb-2">Unlock your full potential with Premium!</div>
                        <button class="btn btn-premium">Try Premium for free</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade profile-photo-upload-modal" id="profilePhotoUploadModal" tabindex="-1" aria-labelledby="profilePhotoUploadModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profilePhotoUploadModalLabel">Change Profile Photo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="file-upload-dropzone" id="profilePhotoDropzone">
                        <label for="profilePhotoInput" class="btn btn-outline-primary">Choose Image</label>
                        <input type="file" class="file-upload-input" id="profilePhotoInput" accept="image/*" style="display: none;">
                    </div>
                    <div class="text-center mt-3">
                        <img id="profilePhotoPreview" class="image-preview" src="" alt="Profile Photo Preview" style="display: none;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveProfilePhotoBtn">Save Photo</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editBannerModal" tabindex="-1" aria-labelledby="editBannerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBannerModalLabel">Edit Profile Background</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="file-upload-dropzone" id="bannerPhotoDropzone">
                        <label for="bannerFileInput" class="btn btn-outline-primary">Choose Image</label>
                         <input class="form-control file-upload-input" type="file" id="bannerFileInput" accept="image/*" style="display: none;">
                    </div>
                     <div class="text-center mt-3">
                        <img id="bannerPhotoPreview" class="image-preview" src="" alt="Banner Photo Preview" style="display: none;">
                    </div>
                    <div class="text-center mt-3">
                        <small class="text-muted">Recommended size: 1584 x 396 pixels</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveBannerBtn">Save Banner</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editIntroModal" tabindex="-1" aria-labelledby="editIntroModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editIntroModalLabel">Edit intro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="firstName" class="form-label">First name*</label>
                        <input type="text" class="form-control" id="firstName" value="{{ $user->name ? explode(' ', $user->name)[0] : '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last name*</label>
                        <input type="text" class="form-control" id="lastName" value="{{ $user->name ? (count(explode(' ', $user->name)) > 1 ? explode(' ', $user->name)[count(explode(' ', $user->name)) - 1] : '') : '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="headline" class="form-label">Headline*</label>
                        <input type="text" class="form-control" id="headline" value="{{ $profile->headline ?? '' }}">
                    </div>
                     {{-- Current position is derived from experience, so no direct input here --}}
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" id="location" value="{{ $profile->location ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="industry" class="form-label">Industry</label>
                        <input type="text" class="form-control" id="industry" value="{{ $profile->industry ?? '' }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveIntroBtn">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="contactInfoModal" tabindex="-1" aria-labelledby="contactInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactInfoModalLabel">{{ $user->name }}'s Contact Info</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><i class="fas fa-envelope me-2"></i> Email: <a href="mailto:{{ $user->email }}">{{ $user->email }}</a></p>
                    {{-- Add other contact info fields from profile table if available --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editAboutModal" tabindex="-1" aria-labelledby="editAboutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAboutModalLabel">Edit About</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="aboutContent" class="form-label">Summary</label>
                        <textarea class="form-control" id="aboutContent" rows="6">{{ $profile->about ?? '' }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveAboutBtn">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addExperienceModal" tabindex="-1" aria-labelledby="addExperienceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addExperienceModalLabel">Add experience</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="expTitle" class="form-label">Title*</label>
                        <input type="text" class="form-control" id="expTitle" required>
                    </div>
                    <div class="mb-3">
                        <label for="expCompany" class="form-label">Company name*</label>
                        <input type="text" class="form-control" id="expCompany" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="expStartDate" class="form-label">Start date*</label>
                            <input type="date" class="form-control" id="expStartDate" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="expEndDate" class="form-label">End date (or expected)</label>
                            <input type="date" class="form-control" id="expEndDate">
                        </div>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="currentJobCheckbox">
                        <label class="form-check-label" for="currentJobCheckbox">
                            I am currently working in this role
                        </label>
                    </div>
                    <div class="mb-3">
                        <label for="expLocation" class="form-label">Location</label>
                        <input type="text" class="form-control" id="expLocation">
                    </div>
                    <div class="mb-3">
                        <label for="expDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="expDescription" rows="4"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveExperienceBtn">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addEducationModal" tabindex="-1" aria-labelledby="addEducationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEducationModalLabel">Add education</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="eduSchool" class="form-label">School*</label>
                        <input type="text" class="form-control" id="eduSchool" required>
                    </div>
                    <div class="mb-3">
                        <label for="eduDegree" class="form-label">Degree</label>
                        <input type="text" class="form-control" id="eduDegree">
                    </div>
                    <div class="mb-3">
                        <label for="eduFieldOfStudy" class="form-label">Field of study</label>
                        <input type="text" class="form-control" id="eduFieldOfStudy">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="eduStartDate" class="form-label">Start date</label>
                            <input type="date" class="form-control" id="eduStartDate">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="eduEndDate" class="form-label">End date (or expected)</label>
                            <input type="date" class="form-control" id="eduEndDate">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="eduDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="eduDescription" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveEducationBtn">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addLicenseModal" tabindex="-1" aria-labelledby="addLicenseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addLicenseModalLabel">Add license or certification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="licenseName" class="form-label">Name*</label>
                        <input type="text" class="form-control" id="licenseName" required>
                    </div>
                    <div class="mb-3">
                        <label for="licenseIssuingOrg" class="form-label">Issuing organization*</label>
                        <input type="text" class="form-control" id="licenseIssuingOrg" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="licenseIssueDate" class="form-label">Issue date</label>
                            <input type="date" class="form-control" id="licenseIssueDate">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="licenseExpiryDate" class="form-label">Expiration date</label>
                            <input type="date" class="form-control" id="licenseExpiryDate">
                        </div>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="noExpiryCheckbox">
                        <label class="form-check-label" for="noExpiryCheckbox">
                            This credential does not expire
                        </label>
                    </div>
                    <div class="mb-3">
                        <label for="credentialID" class="form-label">Credential ID</label>
                        <input type="text" class="form-control" id="credentialID">
                    </div>
                    <div class="mb-3">
                        <label for="credentialURL" class="form-label">Credential URL</label>
                        <input type="url" class="form-control" id="credentialURL">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveLicenseBtn">Save</button>
                </div>
            </div>
        </div>
    </div>

    {{-- New Modals for Skills and Languages --}}

    <div class="modal fade" id="addSkillModal" tabindex="-1" aria-labelledby="addSkillModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSkillModalLabel">Add Skill</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="skillName" class="form-label">Skill*</label>
                        <input type="text" class="form-control" id="skillName" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveSkillBtn">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addLanguageModal" tabindex="-1" aria-labelledby="addLanguageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addLanguageModalLabel">Add Language</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="languageName" class="form-label">Language*</label>
                        <input type="text" class="form-control" id="languageName" required>
                    </div>
                    <div class="mb-3">
                        <label for="languageProficiency" class="form-label">Proficiency Level*</label>
                        <select class="form-select" id="languageProficiency" required>
                            <option value="">Select proficiency</option>
                            <option value="elementary">Elementary proficiency</option>
                            <option value="limited_working">Limited working proficiency</option>
                            <option value="professional_working">Professional working proficiency</option>
                            <option value="full_professional">Full professional proficiency</option>
                            <option value="native_bilingual">Native or bilingual proficiency</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveLanguageBtn">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Define routes
        const updateProfilePictureRoute = '{{ route('profile.updateProfilePicture') }}';
        const updateCoverPhotoRoute = '{{ route('profile.updateCoverPhoto') }}';
        const updateIntroRoute = '{{ route('profile.updateIntro') }}';
        const updateAboutRoute = '{{ route('profile.updateAbout') }}';
        const addExperienceRoute = '{{ route('profile.addExperience') }}';
        const addEducationRoute = '{{ route('profile.addEducation') }}';
        const addLicenseOrCertificationRoute = '{{ route('profile.addLicenseOrCertification') }}';
        const addSkillRoute = '{{ route('profile.addSkill') }}';
        const addLanguageRoute = '{{ route('profile.addLanguage') }}';
    </script>
    <script src="{{ asset('frontend/js/profile.js') }}"></script>
@endsection
