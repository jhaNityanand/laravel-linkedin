$(document).ready(function () {
    // Function to handle file upload and preview
    function setupFileUpload(dropzoneId, fileInputId, previewId, saveButtonId, isProfilePhoto = false) {
        const dropzone = $(`#${dropzoneId}`);
        const fileInput = $(`#${fileInputId}`);
        const previewElement = $(`#${previewId}`);
        const saveButton = $(`#${saveButtonId}`);
        const modal = dropzone.closest('.modal');

        let fileToUpload = null;

        // Handle file selection via input (triggered by click on the invisible input)
        fileInput.on('change', function (event) {
            const files = event.target.files;
            handleFiles(files);
        });

        // Handle drag events directly on the dropzone for visual feedback
        dropzone.on('dragover', function (e) {
            e.preventDefault();
            e.stopPropagation();
            dropzone.addClass('hover');
        });

        dropzone.on('dragleave dragend', function (e) {
            e.preventDefault();
            e.stopPropagation();
            dropzone.removeClass('hover');
        });

        // Handle dropped files on the dropzone
        dropzone.on('drop', function (e) {
            e.preventDefault();
            e.stopPropagation();
            dropzone.removeClass('hover');
            const files = e.originalEvent.dataTransfer.files;
            handleFiles(files);
        });

        function handleFiles(files) {
            if (files.length > 0) {
                const file = files[0]; // Only take the first file
                fileToUpload = file;

                // Optional: Add file type and size validation here before previewing/uploading

                const reader = new FileReader();
                reader.onload = function (e) {
                    previewElement.attr('src', e.target.result).show();
                }
                reader.readAsDataURL(file);
                saveButton.prop('disabled', false); // Enable save button
            } else {
                fileToUpload = null;
                previewElement.hide();
                saveButton.prop('disabled', true); // Disable save button if no file
            }
        }

        saveButton.on('click', function () {
            if (fileToUpload) {
                const formData = new FormData();
                formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
                formData.append(isProfilePhoto ? 'profile_picture' : 'cover_photo', fileToUpload);

                const url = isProfilePhoto ? updateProfilePictureRoute : updateCoverPhotoRoute;

                // Show loading indicator if available
                saveButton.prop('disabled', true); // Disable button during upload
                // saveButton.text('Uploading...');

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        if (response.success) {
                            // Update the actual image on the page
                            if (isProfilePhoto) {
                                // Remove initials div and existing img tag, then add the new image
                                $('#auth-user-profile-img').empty().css('background-image', ''); // Clear potential background initials
                                $('#auth-user-profile-img').html(`<img src="${response.file_url}" alt="Profile Picture">`);
                            } else {
                                $('.profile-bg').css({
                                    'background-image': `url(${response.file_url})`,
                                    'background-size': 'cover',
                                    'background-position': 'center'
                                });
                            }
                            modal.modal('hide');
                            // Optionally show a success message
                            // alert(response.message);
                        } else {
                            alert('Error uploading file: ' + response.message);
                        }
                    },
                    error: function (xhr) {
                        if (xhr.status === 422) { // Validation error
                            const errors = xhr.responseJSON.errors;
                            let errorMessage = 'Validation Error:\n';
                            for (const field in errors) {
                                errorMessage += `- ${errors[field][0]}\n`;
                            }
                            alert(errorMessage);
                        } else {
                            alert('An error occurred during file upload.');
                        }
                    }
                }).always(function () {
                    // Reset state regardless of success or failure
                    fileToUpload = null;
                    previewElement.attr('src', '').hide();
                    fileInput.val(''); // Clear the file input
                    saveButton.prop('disabled', false); // Ensure button is re-enabled
                    // saveButton.text('Save Photo'); // Reset button text
                });
            } else {
                console.log(`No ${isProfilePhoto ? 'profile photo' : 'banner'} selected.`);
            }
        });

        // Clear input and preview when modal is shown
        modal.on('show.bs.modal', function () {
            fileToUpload = null;
            previewElement.attr('src', '').hide();
            fileInput.val(''); // Clear the file input
            saveButton.prop('disabled', true); // Disable save button by default
        });
    }

    // Setup for Profile Photo Upload Modal
    setupFileUpload('profilePhotoDropzone', 'profilePhotoInput', 'profilePhotoPreview', 'saveProfilePhotoBtn', true);

    // Setup for Banner Upload Modal
    setupFileUpload('bannerPhotoDropzone', 'bannerFileInput', 'bannerPhotoPreview', 'saveBannerBtn', false); // Corrected previewId and dropzoneId


    // Handle save button clicks for other modals via AJAX
    $('#saveIntroBtn').on('click', function () {
        const firstName = $('#firstName').val();
        const lastName = $('#lastName').val();
        const headline = $('#headline').val();
        const location = $('#location').val();
        const industry = $('#industry').val();

        // Disable save button during AJAX call
        // $('#saveIntroBtn').prop('disabled', true).text('Saving...');

        $.ajax({
            url: updateIntroRoute,
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                first_name: firstName,
                last_name: lastName,
                headline: headline,
                location: location,
                industry: industry,
            },
            success: function (response) {
                if (response.success) {
                    // Update UI based on saved data
                    $('.profile-header-card h3').text(`${firstName} ${lastName}`);
                    $('.profile-header-card .profile-info > p:nth-of-type(1)').text(headline);
                    $('.profile-header-card .profile-info .text-muted:first').text(`${location} • 500+ connections `); // Target the first text-muted paragraph
                    $('#editIntroModal').modal('hide');
                    // Optionally show a success message
                    // alert(response.message);
                } else {
                    alert('Error updating intro: ' + response.message);
                }
            },
            error: function (xhr) {
                if (xhr.status === 422) { // Validation error
                    const errors = xhr.responseJSON.errors;
                    let errorMessage = 'Validation Error:\n';
                    for (const field in errors) {
                        errorMessage += `- ${errors[field][0]}\n`;
                    }
                    alert(errorMessage);
                } else {
                    alert('An error occurred while saving intro.');
                }
            }
        }).always(function () {
            // Re-enable save button regardless of success or failure
            // $('#saveIntroBtn').prop('disabled', false).text('Save');
        });
    });

    $('#saveAboutBtn').on('click', function () {
        const aboutContent = $('#aboutContent').val();

        // Disable save button during AJAX call
        // $('#saveAboutBtn').prop('disabled', true).text('Saving...');

        $.ajax({
            url: updateAboutRoute,
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                about: aboutContent
            },
            success: function (response) {
                if (response.success) {
                    $('.about-section p').text(aboutContent);
                    $('#editAboutModal').modal('hide');
                    // Optionally show a success message
                    // alert(response.message);
                } else {
                    alert('Error updating about: ' + response.message);
                }
            },
            error: function (xhr) {
                if (xhr.status === 422) { // Validation error
                    const errors = xhr.responseJSON.errors;
                    let errorMessage = 'Validation Error:\n';
                    for (const field in errors) {
                        errorMessage += `- ${errors[field][0]}\n`;
                    }
                    alert(errorMessage);
                } else {
                    alert('An error occurred while saving about.');
                }
            }
        }).always(function () {
            // Re-enable save button regardless of success or failure
            // $('#saveAboutBtn').prop('disabled', false).text('Save');
        });
    });

    // Handle adding new experience
    $('#saveExperienceBtn').on('click', function () {
        const expTitle = $('#expTitle').val();
        const expCompany = $('#expCompany').val();
        const expStartDate = $('#expStartDate').val();
        const expEndDate = $('#expEndDate').val();
        const expLocation = $('#expLocation').val();
        const expDescription = $('#expDescription').val();
        const isCurrent = $('#currentJobCheckbox').is(':checked');

        // Disable save button during AJAX call
        // $('#saveExperienceBtn').prop('disabled', true).text('Adding...');

        $.ajax({
            url: addExperienceRoute,
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                title: expTitle,
                company: expCompany,
                start_date: expStartDate,
                end_date: isCurrent ? null : expEndDate, // Send null if current job
                location: expLocation,
                description: expDescription
            },
            success: function (response) {
                if (response.success) {
                    // Dynamically add the new experience to the UI
                    // This is a basic append, consider a more sophisticated approach for ordering/editing
                    const experienceHtml = `
                        <div class="experience-item">
                            <div class="company-logo"><i class="fas fa-briefcase"></i></div>
                            <div class="details">
                                <h6>${response.experience.title}</h6>
                                <p>${response.experience.company}</p>
                                <p class="text-muted">${response.experience.start_date} – ${response.experience.end_date ?? 'Present'}</p>
                                <p class="text-muted">${response.experience.location}</p>
                                <p class="description">${response.experience.description}</p>
                            </div>
                        </div>
                    `;
                    $('.card-body:has(.experience-item, p:contains("No experience added yet.")):first').find('p:contains("No experience added yet."):first').remove(); // Remove empty message
                    $('.card-body:has(.experience-item, .experience-item:last)').append(experienceHtml); // Append new item
                    $('#addExperienceModal').modal('hide');
                    // Clear form fields after successful submission
                    $('#addExperienceModal input, #addExperienceModal textarea').val('');
                    $('#currentJobCheckbox').prop('checked', false);
                    $('#expEndDate').prop('disabled', false);
                    // Optionally show a success message
                    // alert(response.message);
                } else {
                    alert('Error adding experience: ' + response.message);
                }
            },
            error: function (xhr) {
                if (xhr.status === 422) { // Validation error
                    const errors = xhr.responseJSON.errors;
                    let errorMessage = 'Validation Error:\n';
                    for (const field in errors) {
                        errorMessage += `- ${errors[field][0]}\n`;
                    }
                    alert(errorMessage);
                } else {
                    alert('An error occurred while adding experience.');
                }
            }
        }).always(function () {
            // Re-enable save button regardless of success or failure
            // $('#saveExperienceBtn').prop('disabled', false).text('Save');
        });
    });

    // TODO: Implement AJAX for saving Education, Licenses, Skills, and Languages

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

document.addEventListener('DOMContentLoaded', function () {

    // Call function for both selectors
    attachDevelopmentAlert('.profile-actions');
    attachDevelopmentAlert('.promoted-ad-card');

    // Add event listener for the Save Education button
    const saveEducationBtn = document.getElementById('saveEducationBtn');
    if (saveEducationBtn) {
        saveEducationBtn.addEventListener('click', function () {
            // Gather education data from the modal form
            const school = document.getElementById('eduSchool').value;
            const degree = document.getElementById('eduDegree').value;
            const fieldOfStudy = document.getElementById('eduFieldOfStudy').value;
            const startDate = document.getElementById('eduStartDate').value;
            const endDate = document.getElementById('eduEndDate').value;
            const description = document.getElementById('eduDescription').value;

            // Create data object
            const educationData = {
                school: school,
                degree: degree,
                field_of_study: fieldOfStudy,
                start_date: startDate,
                end_date: endDate,
                description: description,
                _token: csrfToken // Include CSRF token for Laravel
            };

            // Send data to the backend
            fetch(addEducationRoute, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken // Include CSRF token in headers
                },
                body: JSON.stringify(educationData)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message); // Or use a toast message
                        // Optionally, close the modal and update the UI
                        // $('#addEducationModal').modal('hide'); // If using Bootstrap 5
                        location.reload(); // Simple reload to see the change
                    } else {
                        alert('Error adding education: ' + data.message); // Display error message
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while adding education.');
                });
        });
    }

    // Script for Save License/Certification button
    const saveLicenseBtn = document.getElementById('saveLicenseBtn');
    if (saveLicenseBtn) {
        saveLicenseBtn.addEventListener('click', function () {
            // Gather license/certification data from the modal form
            const name = document.getElementById('licenseName').value;
            const issuingOrganization = document.getElementById('licenseIssuingOrg').value;
            const issueDate = document.getElementById('licenseIssueDate').value;
            const expiryDate = document.getElementById('licenseExpiryDate').value;
            const credentialId = document.getElementById('credentialID').value;
            const credentialUrl = document.getElementById('credentialURL').value;
            const doesNotExpire = document.getElementById('noExpiryCheckbox').checked;

            // Create data object
            const licenseData = {
                name: name,
                issuing_organization: issuingOrganization,
                issue_date: issueDate,
                expiry_date: doesNotExpire ? null : expiryDate, // Set expiry_date to null if it does not expire
                credential_id: credentialId,
                credential_url: credentialUrl,
                _token: csrfToken // Include CSRF token for Laravel
            };

            // Send data to the backend
            fetch(addLicenseOrCertificationRoute, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken // Include CSRF token in headers
                },
                body: JSON.stringify(licenseData)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message); // Or use a toast message
                        // Optionally, close the modal and update the UI
                        // $('#addLicenseModal').modal('hide'); // If using Bootstrap 5
                        location.reload(); // Simple reload to see the change
                    } else {
                        alert('Error adding license or certification: ' + data.message); // Display error message
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while adding license or certification.');
                });
        });
    }

    // Script for Save Skill button
    const saveSkillBtn = document.getElementById('saveSkillBtn');
    if (saveSkillBtn) {
        saveSkillBtn.addEventListener('click', function () {
            const skillName = document.getElementById('skillName').value;

            const skillData = {
                name: skillName,
                _token: csrfToken
            };

            fetch(addSkillRoute, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify(skillData)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('Error adding skill: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while adding skill.');
                });
        });
    }

    // Script for Save Language button
    const saveLanguageBtn = document.getElementById('saveLanguageBtn');
    if (saveLanguageBtn) {
        saveLanguageBtn.addEventListener('click', function () {
            const languageName = document.getElementById('languageName').value;
            const languageProficiency = document.getElementById('languageProficiency').value;

            const languageData = {
                name: languageName,
                proficiency: languageProficiency,
                _token: csrfToken
            };

            fetch(addLanguageRoute, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify(languageData)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('Error adding language: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while adding language.');
                });
        });
    }
});

function attachDevelopmentAlert(selector) {
    const containers = document.querySelectorAll(selector);

    containers.forEach(container => {
        const buttons = container.querySelectorAll('button');
        buttons.forEach(button => {
            // Check if listener is already attached to avoid duplicates
            if (!button.dataset.alertAttached) {
                button.addEventListener('click', function () {
                    alert('This feature is still under development.');
                });

                // Mark the button so it won't get duplicate listeners
                button.dataset.alertAttached = 'true';
            }
        });
    });
}
