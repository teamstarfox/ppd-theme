jQuery(document).ready(function($) {
    // Wait for the document to be ready

    // .wppd__new-trip event listener
    $(document).on('click', '.wppd__new-trip', function(e) {
        // Add a class to the logout link to identify it
        e.preventDefault(); // Prevent the default behavior of the link
        // alert('logout');

        var logoutUrl = $(this).attr('href'); // Get the logout URL

        // Perform your custom actions before logging out (if needed)

        // Remove 'plannarData' from sessionStorage
        sessionStorage.removeItem('plannerData');

        // Redirect to the logout URL
        window.location.href = logoutUrl;
    });
    
    $(document).on('click', '.wppd__logout-link', function(e) {
        // Add a class to the logout link to identify it
        e.preventDefault(); // Prevent the default behavior of the link
        // alert('logout');

        var logoutUrl = $(this).attr('href'); // Get the logout URL

        // Perform your custom actions before logging out (if needed)

        // Remove 'plannarData' from sessionStorage
        sessionStorage.removeItem('plannerData');

        // Redirect to the logout URL
        window.location.href = logoutUrl;
    });
	
	$(document).on('submit', '#place_form', function(e) {
        sessionStorage.removeItem('plannerData');
    });
	
});
