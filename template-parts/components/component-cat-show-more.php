<?php

$related_post_count_in_category = 0;

if( is_home() ) {
    $related_post_count_in_category = wp_count_posts()->publish;
	$category = -1;
} elseif( is_category() ) {
    $related_category = get_queried_object();
    $related_post_count_in_category = $related_category->category_count;
	$category = $related_category->term_id;
}

$default_posts_per_page = get_option( 'posts_per_page' );

// category
if($related_post_count_in_category > $default_posts_per_page) { ?>
	<div class="show-more-pagination">
		<a href="#" id="show-more-posts-in-category" data-category="<?php echo $category ; ?>" class="cta-button cta-button-light" data-page="1" data-posts-loaded="<?php echo $default_posts_per_page; ?>" data-max-posts = <?php echo  $related_post_count_in_category; ?>>See More</a>
	</div>
<?php } ?>	