<?php 
if (is_home()) {

    $current_cat = -1;

    if (isset($_GET['cat'])) {
        $current_cat = $_GET['cat'];
    }

    $categories = get_categories([
        'orderby' => 'name',
        'order'   => 'ASC'
    ]);

    if ($categories && count($categories) > 1) {
        echo '<div class="cat-nav">';

        // Count total posts that are published AND do NOT have the "Omit" tag
        $args_count = [
            'posts_per_page' => -1,
            'post_status'    => 'publish',
            'tag__not_in'    => [14] // Exclude "Omit" tagged posts
        ];

        $query_count = new WP_Query($args_count);
        $total_filtered_posts = $query_count->found_posts;
        wp_reset_postdata();

        echo '<div class="cat '.(-1 == $current_cat ? 'active' : '').'" data-id="-1" data-max-posts="'.$total_filtered_posts.'">All</div>';

        foreach ($categories as $category) {
            // Count valid posts for this specific category
            $args_cat_count = [
                'posts_per_page' => -1,
                'post_status'    => 'publish',
                'tag__not_in'    => [14],
                'cat'            => $category->term_id
            ];
            $query_cat_count = new WP_Query($args_cat_count);
            $total_filtered_posts_in_category = $query_cat_count->found_posts;
            wp_reset_postdata();

            echo '<div class="cat '.($category->term_id == $current_cat ? 'active' : '').'" 
                 data-id="' . $category->term_id . '" 
                 data-max-posts="'.$total_filtered_posts_in_category.'">' 
                 . $category->name . 
                 '</div>';
        }

        echo '</div>';				
    }

    wp_enqueue_script('cat-toggle-functions', get_template_directory_uri() . '/assets/js/cat-toggle.js', [], _S_VERSION, false);
    wp_localize_script('cat-toggle-functions', 'catToggleData', [
        'ajaxurl' => admin_url('admin-ajax.php')
    ]);
}
?>