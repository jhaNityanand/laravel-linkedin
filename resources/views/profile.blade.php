@extends('layouts.frontend.app')

@section('title', $title)

@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/css/profile.css') }}">
@endsection

@section('content')
    <div class="container main-content">
        <div class="row">
            <div class="col-lg-8">
                <div class="card profile-header-card">
                    <div class="profile-bg">
                        <div class="edit-icon" data-bs-toggle="modal" data-bs-target="#editBannerModal">
                            <i class="fas fa-pencil-alt"></i>
                        </div>
                    </div>
                    <div class="profile-img" data-bs-toggle="modal" data-bs-target="#profilePhotoUploadModal"></div>
                    <div class="profile-info">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h3>John Doe</h3>
                                <p class="mb-1">Senior Software Engineer at Tech Corp | Passionate about AI & Web Development</p>
                                <p class="text-muted mb-1">San Francisco Bay Area • 500+ connections <a href="#" class="contact-info-link" data-bs-toggle="modal" data-bs-target="#contactInfoModal">Contact info</a></p>
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
                        <p>Experienced Senior Software Engineer with a strong background in developing scalable web applications and a keen interest in artificial intelligence. Proven ability to lead complex projects, collaborate with cross-functional teams, and deliver high-quality software solutions. Committed to continuous learning and leveraging cutting-edge technologies to solve real-world problems.</p>
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
                        <div class="experience-item">
                            <div class="company-logo"><i class="fas fa-briefcase"></i></div>
                            <div class="details">
                                <h6>Senior Software Engineer</h6>
                                <p>Tech Corp</p>
                                <p class="text-muted">Jan 2020 – Present • 4 yrs 5 mos</p>
                                <p class="text-muted">San Francisco Bay Area</p>
                                <p class="description">Leading the development of new features for our flagship SaaS product using React, Node.js, and AWS. Mentored junior engineers and contributed to architectural decisions.</p>
                            </div>
                        </div>
                        <div class="experience-item">
                            <div class="company-logo"><i class="fas fa-briefcase"></i></div>
                            <div class="details">
                                <h6>Software Engineer</h6>
                                <p>Innovate Solutions</p>
                                <p class="text-muted">Jun 2017 – Dec 2019 • 2 yrs 7 mos</p>
                                <p class="text-muted">Seattle, Washington</p>
                                <p class="description">Developed and maintained RESTful APIs for mobile applications. Collaborated with product teams to gather requirements and design solutions.</p>
                            </div>
                        </div>
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
                        <div class="education-item">
                            <div class="school-logo"><i class="fas fa-graduation-cap"></i></div>
                            <div class="details">
                                <h6>University of California, Berkeley</h6>
                                <p>Master of Science - MS, Computer Science</p>
                                <p class="text-muted">2016 – 2017</p>
                            </div>
                        </div>
                        <div class="education-item">
                            <div class="school-logo"><i class="fas fa-graduation-cap"></i></div>
                            <div class="details">
                                <h6>University of Washington</h6>
                                <p>Bachelor of Science - BS, Computer Science</p>
                                <p class="text-muted">2012 – 2016</p>
                            </div>
                        </div>
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
                        <div class="license-item">
                            <div class="badge-icon"><i class="fas fa-certificate"></i></div>
                            <div class="details">
                                <h6>AWS Certified Solutions Architect – Associate</h6>
                                <p>Amazon Web Services (AWS)</p>
                                <p class="text-muted">Issued: Jan 2023</p>
                            </div>
                        </div>
                        <div class="license-item">
                            <div class="badge-icon"><i class="fas fa-certificate"></i></div>
                            <div class="details">
                                <h6>Professional Scrum Master™ I (PSM I)</h6>
                                <p>Scrum.org</p>
                                <p class="text-muted">Issued: Oct 2022</p>
                            </div>
                        </div>
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
                        <i class="fas fa-cloud-upload-alt"></i>
                        <p>Drag and drop a new photo here</p>
                        <small>or click to browse</small>
                        <input type="file" class="file-upload-input" id="profilePhotoInput" accept="image/*">
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
                    <div class="mb-3">
                        <label for="bannerFileInput" class="form-label">Upload new banner image</label>
                        <input class="form-control" type="file" id="bannerFileInput" accept="image/*">
                    </div>
                    <div class="text-center">
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
                        <input type="text" class="form-control" id="firstName" value="John">
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last name*</label>
                        <input type="text" class="form-control" id="lastName" value="Doe">
                    </div>
                    <div class="mb-3">
                        <label for="headline" class="form-label">Headline*</label>
                        <input type="text" class="form-control" id="headline" value="Senior Software Engineer at Tech Corp | Passionate about AI & Web Development">
                    </div>
                    <div class="mb-3">
                        <label for="currentPosition" class="form-label">Current position</label>
                        <input type="text" class="form-control" id="currentPosition" value="Senior Software Engineer at Tech Corp">
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" id="location" value="San Francisco Bay Area">
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
                    <h5 class="modal-title" id="contactInfoModalLabel">John Doe's Contact Info</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><i class="fas fa-envelope me-2"></i> Email: <a href="mailto:john.doe@example.com">john.doe@example.com</a></p>
                    <p><i class="fas fa-phone me-2"></i> Phone: +1 123-456-7890</p>
                    <p><i class="fas fa-globe me-2"></i> Website: <a href="http://www.johndoeportfolio.com" target="_blank">www.johndoeportfolio.com</a></p>
                    <p><i class="fab fa-linkedin me-2"></i> LinkedIn profile: <a href="#" target="_blank">linkedin.com/in/johndoe</a></p>
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
                        <textarea class="form-control" id="aboutContent" rows="6">Experienced Senior Software Engineer with a strong background in developing scalable web applications and a keen interest in artificial intelligence. Proven ability to lead complex projects, collaborate with cross-functional teams, and deliver high-quality software solutions. Committed to continuous learning and leveraging cutting-edge technologies to solve real-world problems.</textarea>
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
@endsection

@section('script')
    <script src="{{ asset('frontend/js/profile.js') }}"></script>
@endsection
