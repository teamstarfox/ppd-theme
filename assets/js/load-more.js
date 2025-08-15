(function () {
    const loadMoreButton = document.getElementById('show-more-posts');
    if (loadMoreButton) {
        loadMoreButton.addEventListener('click', function (e) {
        e.preventDefault();
        
        // Retrieve data attributes from the button
        let currentPage = parseInt(loadMoreButton.getAttribute("data-page"));
        let postsLoaded = parseInt(loadMoreButton.getAttribute("data-posts-loaded"));
        const maxPosts = parseInt(loadMoreButton.getAttribute("data-max-posts"));
        
        // Prepare the AJAX request
        const xhr = new XMLHttpRequest();
        xhr.open("POST", ppdData.ajax_url, true);  // assuming load-more.js uses ppdData as localized object
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
            // Create a temporary element to hold the response HTML
            const tempDiv = document.createElement("div");
            tempDiv.innerHTML = this.responseText;
            
            // Append each new post teaser to the .post-teasers container
            const postTeasers = tempDiv.querySelectorAll('.post-teaser');
            const container = document.querySelector('.post-teasers');
            postTeasers.forEach(function(teaser) {
                container.appendChild(teaser);
            });
            
            // Update the page and postsLoaded counters
            currentPage++;
            postsLoaded += postTeasers.length;
            loadMoreButton.setAttribute("data-page", currentPage);
            loadMoreButton.setAttribute("data-posts-loaded", postsLoaded);
            
            // Hide the button if we've loaded all posts
            if (postsLoaded >= maxPosts || postTeasers.length === 0) {
                loadMoreButton.style.display = 'none';
            }
            }
        };

        // Send AJAX request with current_page parameter. (Add &category=XYZ if needed)
        xhr.send('action=load_more_posts&current_page=' + currentPage);
        });
    }
})();  