$(document).ready(function () {
    // Dummy data for search suggestions
    const searchSuggestions = [
        { type: 'person', name: 'Nityanand Jha', headline: 'Sr. PHP Developer at Cubiz Infotech', img: 'https://placehold.co/40x40/ccc/fff?text=NJ' },
        { type: 'person', name: 'Nikhil Godhani', headline: 'Software Developer', img: 'https://placehold.co/40x40/ccc/fff?text=NG' },
        { type: 'person', name: 'Nidhi Panchal', headline: 'HR Executive at TechFusion | HR Spe...', img: 'https://placehold.co/40x40/ccc/fff?text=NP' },
        { type: 'person', name: 'Nita Nikita Patil', headline: 'HR Manager at DroneApps Pvt. Ltd. | H...', img: 'https://placehold.co/40x40/ccc/fff?text=NN' },
        { type: 'group', name: 'Night Shift Groups', description: 'Community for night shift workers', img: 'https://placehold.co/40x40/0a66c2/fff?text=G' },
        { type: 'location', name: 'Nigeria', description: 'Country', img: 'https://placehold.co/40x40/eee/666?text=Loc' },
        { type: 'person', name: 'Niharikaa\'s Travel Experiences', headline: 'Travel Blogger', img: 'https://placehold.co/40x40/ccc/fff?text=NT' },
        { type: 'group', name: 'Nike\'s Web Community', description: 'Web Development Community', img: 'https://placehold.co/40x40/0a66c2/fff?text=G' },
        { type: 'event', name: 'Night to Shine 2023', description: 'Annual event for people with disabilities', img: 'https://placehold.co/40x40/eee/666?text=Evt' },
        { type: 'company', name: 'NinjaOne | Product + Remote Support Software', description: 'Software Company', img: 'https://placehold.co/40x40/0a66c2/fff?text=C' }
    ];

    // Handle search bar input for preview
    $('#mainSearchBar').on('keyup', function () {
        const searchTerm = $(this).val().toLowerCase();
        const searchPreview = $('#searchPreview');
        const searchPreviewResults = $('#searchPreviewResults');
        searchPreviewResults.empty();

        if (searchTerm.length > 0) {
            const filteredSuggestions = searchSuggestions.filter(item =>
                item.name.toLowerCase().includes(searchTerm) ||
                (item.headline && item.headline.toLowerCase().includes(searchTerm)) ||
                (item.description && item.description.toLowerCase().includes(searchTerm))
            ).slice(0, 5); // Show top 5 results

            if (filteredSuggestions.length > 0) {
                filteredSuggestions.forEach(item => {
                    const itemHtml = `
                                <div class="search-preview-item ${item.type === 'group' ? 'group' : ''}">
                                    <div class="profile-img" style="background-image: url('${item.img}'); background-size: cover; background-position: center;"></div>
                                    <div class="item-info">
                                        <h6>${item.name}</h6>
                                        <p>${item.headline || item.description || ''}</p>
                                    </div>
                                </div>
                            `;
                    searchPreviewResults.append(itemHtml);
                });
                searchPreview.show();
            } else {
                searchPreview.hide();
            }
        } else {
            searchPreview.hide();
        }
    });

    // Hide search preview when clicking outside
    $(document).on('click', function (e) {
        if (!$(e.target).closest('.search-bar-wrapper').length) {
            $('#searchPreview').hide();
        }
    });

    // Handle clicking on a search suggestion
    $(document).on('click', '.search-preview-item', function () {
        const itemName = $(this).find('h6').text();
        console.log(`Clicked search suggestion: ${itemName}`);
        // In a real app, this would navigate to the profile/group/company page
        $('#searchPreview').hide();
        $('#mainSearchBar').val(itemName); // Populate search bar with selected item
    });

    // Handle "See all results" link
    $(document).on('click', '.see-all-results', function (e) {
        e.preventDefault();
        const searchTerm = $('#mainSearchBar').val();
        console.log(`See all results for: ${searchTerm}`);
        // In a real app, this would navigate to a full search results page
        $('#searchPreview').hide();
    });
});
