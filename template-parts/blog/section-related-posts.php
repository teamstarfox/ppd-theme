<section id="posts" class="container">
    <?php 
    if( !empty($title) ) { 
        echo '<h2>' . esc_html($title) . '</h2>';
    }
    if( !empty($subtitle) ) { 
        echo '<p class="subtitle">' . esc_html($subtitle) . '</p>';
    }
    get_template_part( 'template-parts/blog/component', 'cat-toggle' ); 
    ?>

    <div class="post-teasers">
        <?php
        $posts_per_page = 4;

        // Determine the currently selected category from the toggle
        $current_cat = isset($_GET['cat']) ? intval($_GET['cat']) : -1;

        // Get the first valid post for this category (excluding "Omit")
        $initial_query_args = [
            'posts_per_page' => 1,
            'post_status'    => 'publish',
            'tag__not_in'    => [14], // Exclude "Omit" tagged posts
        ];

        if ($current_cat > 0) {
            $initial_query_args['cat'] = $current_cat;
        }

        $initial_query = new WP_Query($initial_query_args);
        $first_valid_post_id = null;

        if ($initial_query->have_posts()) {
            $initial_query->the_post();
            $first_valid_post_id = get_the_ID();
        }
        wp_reset_postdata();

        // Query related posts while skipping the first valid post
        $args = [
            'posts_per_page' => $posts_per_page,
            'post_status'    => 'publish',
            'tag__not_in'    => [14], // Exclude "Omit" tagged posts
            'post__not_in'   => $first_valid_post_id ? [$first_valid_post_id] : [], // Exclude first valid post
        ];

        if ($current_cat > 0) {
            $args['cat'] = $current_cat;
        }

        $related_posts = new WP_Query($args);

        if ($related_posts->have_posts()) :
            while ($related_posts->have_posts()) : $related_posts->the_post();
                get_template_part('template-parts/blog/component', 'post-teaser');
            endwhile;
        else :
            echo '<p>No related posts available.</p>';
        endif;

        wp_reset_postdata();
        ?>
    </div>
    
    <?php
    // Count total available posts for "Show More" button
    $args_count = [
        'posts_per_page' => 1,
        'post_status'    => 'publish',
        'tag__not_in'    => [14], // Exclude "Omit" tagged posts
        'post__not_in'   => $first_valid_post_id ? [$first_valid_post_id] : [], // Exclude first valid post
    ];

    if ($current_cat > 0) {
        $args_count['cat'] = $current_cat;
    }

    $query_count = new WP_Query($args_count);
    $total_posts = $query_count->found_posts;
    wp_reset_postdata();
    
    if ($total_posts > $posts_per_page) : ?>
        <div class="show-more-pagination">
            <a href="#" id="show-more-posts" 
               data-page="1" 
               data-posts-loaded="<?php echo esc_attr($posts_per_page); ?>" 
               data-max-posts="<?php echo esc_attr($total_posts); ?>" 
               class="cta-button cta-button-light">See More</a>
        </div>
    <?php endif; ?>
</section>
