$(document).ready(function () {
    // Function to handle file upload and preview
    function setupFileUpload(dropzoneId, fileInputId, previewId, saveButtonId, isProfilePhoto = false) {
        const dropzone = $(`#${dropzoneId}`);
        const fileInput = $(`#${fileInputId}`);
        const previewElement = $(`#${previewId}`);
        const saveButton = $(`#${saveButtonId}`);

        dropzone.on('dragover', function (e) {
            e.preventDefault();
            e.stopPropagation();
            dropzone.addClass('hover');
        });

        dropzone.on('dragleave', function (e) {
            e.preventDefault();
            e.stopPropagation();
            dropzone.removeClass('hover');
        });

        dropzone.on('drop', function (e) {
            e.preventDefault();
            e.stopPropagation();
            dropzone.removeClass('hover');
            const files = e.originalEvent.dataTransfer.files;
            handleFiles(files);
        });

        dropzone.on('click', function () {
            fileInput.click();
        });

        fileInput.on('change', function () {
            const files = this.files;
            handleFiles(files);
        });

        function handleFiles(files) {
            if (files.length > 0) {
                const file = files[0]; // Only take the first file for profile/banner
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewElement.attr('src', e.target.result).show();
                    if (isProfilePhoto) {
                        // Update the actual profile image on the page
                        $('.profile-header-card .profile-img').css('background-image', `url(${e.target.result})`);
                    } else {
                        // Update the actual banner image on the page
                        $('.profile-header-card .profile-bg').css('background-image', `url(${e.target.result})`);
                        $('.profile-header-card .profile-bg').css('background-size', 'cover');
                        $('.profile-header-card .profile-bg').css('background-position', 'center');
                    }
                }
                reader.readAsDataURL(file);
                saveButton.prop('disabled', false); // Enable save button
            } else {
                previewElement.hide();
                saveButton.prop('disabled', true); // Disable save button if no file
            }
        }

        saveButton.on('click', function () {
            const fileName = fileInput.val().split('\\').pop(); // Get just the file name
            if (fileName) {
                console.log(`Saving ${isProfilePhoto ? 'profile photo' : 'banner'} file: ${fileName}`);
                // In a real app, you'd send this file to a server
                $(`#${fileInputId}`).val(''); // Clear input
                previewElement.hide(); // Hide preview
                dropzone.closest('.modal').modal('hide'); // Close modal
            } else {
                console.log(`No ${isProfilePhoto ? 'profile photo' : 'banner'} selected.`);
            }
        });

        // Disable save button by default
        saveButton.prop('disabled', true);
    }

    // Setup for Profile Photo Upload Modal
    setupFileUpload('profilePhotoDropzone', 'profilePhotoInput', 'profilePhotoPreview', 'saveProfilePhotoBtn', true);

    // Setup for Banner Upload Modal
    setupFileUpload('bannerFileInput', 'bannerFileInput', 'bannerPreview', 'saveBannerBtn', false);


    // Handle save button clicks for other modals
    $('#saveIntroBtn').on('click', function () {
        const firstName = $('#firstName').val();
        const lastName = $('#lastName').val();
        const headline = $('#headline').val();
        const currentPosition = $('#currentPosition').val();
        const location = $('#location').val();
        console.log('Saving Intro:', { firstName, lastName, headline, currentPosition, location });
        // Update UI based on saved data
        $('.profile-header-card h3').text(`${firstName} ${lastName}`);
        $('.profile-header-card .profile-info > p:nth-of-type(1)').text(headline);
        $('.profile-header-card .profile-info .text-muted').text(`${location} • 500+ connections `); // Simplified update
        $('#editIntroModal').modal('hide');
    });

    $('#saveAboutBtn').on('click', function () {
        const aboutContent = $('#aboutContent').val();
        console.log('Saving About:', aboutContent);
        $('.about-section p').text(aboutContent);
        $('#editAboutModal').modal('hide');
    });

    $('#saveExperienceBtn').on('click', function () {
        const expTitle = $('#expTitle').val();
        const expCompany = $('#expCompany').val();
        const expStartDate = $('#expStartDate').val();
        const expEndDate = $('#expEndDate').val();
        const expLocation = $('#expLocation').val();
        const expDescription = $('#expDescription').val();
        console.log('Adding Experience:', { expTitle, expCompany, expStartDate, expEndDate, expLocation, expDescription });
        // In a real app, you'd dynamically add this to the experience section
        $('#addExperienceModal').modal('hide');
        $('#addExperienceModal input, #addExperienceModal textarea').val(''); // Clear fields
    });

    $('#saveEducationBtn').on('click', function () {
        const eduSchool = $('#eduSchool').val();
        const eduDegree = $('#eduDegree').val();
        const eduFieldOfStudy = $('#eduFieldOfStudy').val();
        const eduStartDate = $('#eduStartDate').val();
        const eduEndDate = $('#eduEndDate').val();
        const eduDescription = $('#eduDescription').val();
        console.log('Adding Education:', { eduSchool, eduDegree, eduFieldOfStudy, eduStartDate, eduEndDate, eduDescription });
        // In a real app, you'd dynamically add this to the education section
        $('#addEducationModal').modal('hide');
        $('#addEducationModal input, #addEducationModal textarea').val(''); // Clear fields
    });

    $('#saveLicenseBtn').on('click', function () {
        const licenseName = $('#licenseName').val();
        const licenseIssuingOrg = $('#licenseIssuingOrg').val();
        const licenseIssueDate = $('#licenseIssueDate').val();
        const licenseExpiryDate = $('#licenseExpiryDate').val();
        const credentialID = $('#credentialID').val();
        const credentialURL = $('#credentialURL').val();
        console.log('Adding License/Certification:', { licenseName, licenseIssuingOrg, licenseIssueDate, licenseExpiryDate, credentialID, credentialURL });
        // In a real app, you'd dynamically add this to the licenses section
        $('#addLicenseModal').modal('hide');
        $('#addLicenseModal input').val(''); // Clear fields
        $('#noExpiryCheckbox').prop('checked', false);
    });

    // Handle "No Expiry" checkbox for License Modal
    $('#noExpiryCheckbox').on('change', function () {
        if ($(this).is(':checked')) {
            $('#licenseExpiryDate').val('').prop('disabled', true);
        } else {
            $('#licenseExpiryDate').prop('disabled', false);
        }
    });

    // Handle "Currently working" checkbox for Experience Modal
    $('#currentJobCheckbox').on('change', function () {
        if ($(this).is(':checked')) {
            $('#expEndDate').val('').prop('disabled', true);
        } else {
            $('#expEndDate').prop('disabled', false);
        }
    });

    // Right sidebar "Connect" button
    $('.people-you-may-know-card .btn-connect').on('click', function () {
        const userName = $(this).closest('.profile-item').find('h6').text();
        console.log(`Connecting with: ${userName}`);
        // In a real app, this would send a connection request
        $(this).text('Pending').prop('disabled', true); // Change button text
    });

    // Right sidebar "View all" link
    $('.people-you-may-know-card .view-all-btn').on('click', function (e) {
        e.preventDefault();
        console.log('View all people you may know clicked.');
        // In a real app, this would navigate to a full list of suggestions
    });

    // Promoted Ad "Try Premium" button
    $('.promoted-ad-card .btn-premium').on('click', function () {
        console.log('Clicked "Try Premium for free" on promoted ad.');
        // In a real app, this would navigate to the Premium signup page
    });
});
