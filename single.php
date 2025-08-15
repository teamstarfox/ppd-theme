<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package planpackdiscover
 */

get_header();
get_template_part( 'template-parts/blog/section', 'hero' );
while ( have_posts() ) :
	the_post();
	get_template_part( 'template-parts/content', get_post_type() );
endwhile;
?>

<section id="posts" class="container">
	<?php
	if( have_rows('info_content', 'option') ) {
		while( have_rows('info_content', 'option') ) { 
			the_row(); 
			if(get_sub_field('title')) { ?><h2><?php echo get_sub_field('title'); ?></h2><?php };
			if(get_sub_field('subtitle')) { ?><p class="subtitle"><?php echo get_sub_field('subtitle'); ?></p><?php };
		}
	} elseif ( is_active_sidebar( 'post-teasers' ) ) {
		dynamic_sidebar( 'post-teasers' );
	};
	?>

	<div class="post-teasers">
		<?php
			$args		= [
				'posts_per_page'         => '4',
				'post__not_in'           => [get_the_ID()],
			];
			$all_posts 	= new WP_Query( $args );
			while ($all_posts -> have_posts()) : $all_posts -> the_post();
				get_template_part( 'template-parts/blog/component', 'post-teaser' );
			endwhile;
			wp_reset_postdata();
		?>
	</div>
</section>

<?php
get_footer();