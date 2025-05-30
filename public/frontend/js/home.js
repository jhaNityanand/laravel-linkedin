$(document).ready(function () {
    // Handle "Show more" button click for Recent/Groups/Events
    $('.show-more-btn').on('click', function () {
        var buttonText = $(this).text();
        if (buttonText.includes('Show more')) {
            $(this).html('Show less <i class="fas fa-chevron-up ms-1"></i>');
        } else {
            $(this).html('Show more <i class="fas fa-chevron-down ms-1"></i>');
        }
    });

    // Basic click handlers for post actions (Like, Comment, Share, Send)
    $('.post-actions .btn').on('click', function () {
        const action = $(this).text().trim();
        console.log(`Action clicked: ${action}`);
    });

    // Handle Post button click in general post modal
    $('#postModal .post-btn').on('click', function () {
        const postContent = $('#postModal textarea').val();
        if (postContent.trim() !== '') {
            console.log('New post content:', postContent);
            $('#postModal').modal('hide');
            $('#postModal textarea').val('');
        } else {
            console.log('Post content is empty.');
        }
    });

    // --- Photo/Video Upload Modals Functionality ---
    function setupFileUpload(dropzoneId, fileInputId, previewId, addBtnId, fileType) {
        const dropzone = $(`#${dropzoneId}`);
        const fileInput = $(`#${fileInputId}`);
        const previewContainer = $(`#${previewId}`);
        const addBtn = $(`#${addBtnId}`);

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
            previewContainer.empty(); // Clear previous previews
            if (files.length > 0) {
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    console.log(`Selected ${fileType}: ${file.name}`);
                    // Simulate preview
                    if (fileType === 'photo' && file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            previewContainer.append(`
                                        <div class="col">
                                            <img src="${e.target.result}" class="img-fluid rounded" alt="Preview">
                                            <p class="text-muted text-truncate mt-1" style="font-size:0.8rem;">${file.name}</p>
                                        </div>
                                    `);
                        }
                        reader.readAsDataURL(file);
                    } else if (fileType === 'video' && file.type.startsWith('video/')) {
                        previewContainer.append(`
                                    <div class="col">
                                        <video controls class="img-fluid rounded">
                                            <source src="${URL.createObjectURL(file)}" type="${file.type}">
                                            Your browser does not support the video tag.
                                        </video>
                                        <p class="text-muted text-truncate mt-1" style="font-size:0.8rem;">${file.name}</p>
                                    </div>
                                `);
                    }
                }
            }
        }

        addBtn.on('click', function () {
            const selectedFilesCount = fileInput[0].files.length;
            if (selectedFilesCount > 0) {
                console.log(`Added ${selectedFilesCount} ${fileType}(s) to post.`);
                // In a real app, you'd process these files (upload, attach to post data)
                $(`#${fileInputId}`).val(''); // Clear input
                previewContainer.empty(); // Clear preview
                $(`#${dropzoneId}`).closest('.modal').modal('hide'); // Close modal
            } else {
                console.log(`No ${fileType} selected.`);
            }
        });
    }

    setupFileUpload('photoDropzone', 'photoFileInput', 'photoPreview', 'addPhotosBtn', 'photo');
    setupFileUpload('videoDropzone', 'videoFileInput', 'videoPreview', 'addVideosBtn', 'video');

    // --- Event Modal Functionality ---
    $('#createEventBtn').on('click', function () {
        const eventName = $('#eventName').val().trim();
        const eventDescription = $('#eventDescription').val().trim();
        const eventDate = $('#eventDate').val();
        const eventTime = $('#eventTime').val();
        const eventLocation = $('#eventLocation').val().trim();

        if (eventName && eventDate && eventTime) {
            console.log('Creating Event:', {
                name: eventName,
                description: eventDescription,
                date: eventDate,
                time: eventTime,
                location: eventLocation
            });
            $('#eventModal').modal('hide');
            $('#eventName, #eventDescription, #eventDate, #eventTime, #eventLocation').val(''); // Clear fields
        } else {
            console.log('Please fill in required event fields.');
        }
    });

    // --- Article Modal Functionality ---
    $('#publishArticleBtn').on('click', function () {
        const articleTitle = $('#articleTitle').val().trim();
        const articleContent = $('#articleContent').val().trim();

        if (articleTitle && articleContent) {
            console.log('Publishing Article:', {
                title: articleTitle,
                content: articleContent.substring(0, 100) + '...' // Log snippet
            });
            $('#articleModal').modal('hide');
            $('#articleTitle, #articleContent').val(''); // Clear fields
        } else {
            console.log('Please fill in article title and content.');
        }
    });
});
