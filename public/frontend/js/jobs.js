$(document).ready(function () {
    // Populate Job Details Modal when a job listing card is clicked
    $('#jobDetailsModal').on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget); // Button that triggered the modal
        const jobTitle = button.data('job-title');
        const companyName = button.data('company-name');
        const location = button.data('location');
        const postedTime = button.data('posted-time');
        const easyApply = button.data('easy-apply');
        const description = button.data('description');

        const modal = $(this);
        modal.find('#modalJobTitle').text(jobTitle);
        modal.find('#modalCompanyName').text(companyName);
        modal.find('#modalJobLocation').text(location);
        modal.find('#modalJobPosted').text(postedTime);
        modal.find('#modalJobDescription').text(description);

        const applyButton = modal.find('#modalApplyButton');
        if (easyApply) {
            applyButton.text('Easy Apply').removeClass('btn-outline-primary').addClass('btn-primary');
        } else {
            applyButton.text('Apply').removeClass('btn-primary').addClass('btn-outline-primary');
        }

        // Log job details to console for demonstration
        console.log('Job Details:', {
            jobTitle, companyName, location, postedTime, easyApply, description
        });
    });

    // Handle Apply button click in modal
    $('#modalApplyButton').on('click', function () {
        const jobTitle = $('#modalJobTitle').text();
        console.log(`Applying for job: ${jobTitle}`);
        // In a real application, this would lead to an application form or external link.
        // For now, we'll just close the modal.
        $('#jobDetailsModal').modal('hide');
        // You could show a success message or redirect here
    });

    // Handle Apply Filters button click
    $('#applyFilters').on('click', function () {
        const keywords = $('#keywords').val();
        const location = $('#location').val();
        const selectedExperience = [];
        $('input[id^="exp"]:checked').each(function () {
            selectedExperience.push($(this).val());
        });
        const selectedJobTypes = [];
        $('input[id^="type"]:checked').each(function () {
            selectedJobTypes.push($(this).val());
        });

        console.log('Applying Filters:', {
            keywords,
            location,
            selectedExperience,
            selectedJobTypes
        });
        // In a real application, you would send these filters to a backend
        // to fetch and display filtered job listings.
    });

    // Handle Clear Filters button click
    $('#clearFilters').on('click', function () {
        $('#keywords').val('');
        $('#location').val('');
        $('input[type="checkbox"]').prop('checked', false);
        console.log('Filters cleared.');
        // In a real application, this would reset the job listings to default.
    });

    // Handle "View all jobs" link
    $('.show-all-link').on('click', function (e) {
        e.preventDefault();
        console.log('View all jobs link clicked. In a real app, this would load more job listings.');
    });
});
