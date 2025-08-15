document.addEventListener('DOMContentLoaded', function () {
    const categoryButtons = document.querySelectorAll('.cat');
    const postContainer = document.querySelector('.post-teasers');
    const loadMoreButton = document.getElementById('show-more-posts');

    categoryButtons.forEach(button => {
        button.addEventListener('click', function () {
            const categoryID = this.getAttribute('data-id');
            const maxPosts = this.getAttribute('data-max-posts');

            // Remove active class from all buttons and add to selected one
            categoryButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            // Send AJAX request
            fetch(catToggleData.ajaxurl, {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({
                    action: 'load_more_posts_in_cat',
                    category: categoryID,
                    current_page: 0, // Reset pagination on toggle
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    postContainer.innerHTML = data.data;

                    // Update "Show More" button attributes
                    loadMoreButton.setAttribute('data-page', 1);
                    loadMoreButton.setAttribute('data-max-posts', maxPosts);
                    loadMoreButton.style.display = (parseInt(maxPosts) > 4) ? 'block' : 'none';
                } else {
                    postContainer.innerHTML = '<p>No posts found.</p>';
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
});
