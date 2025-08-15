<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package planpackdiscover
 */

get_header(); ?>

<?php if( !is_page(386) && !is_page(719) && !is_page(721) ): ?>
	<section id="hero" style="background-image:url(<?php the_post_thumbnail_url(); ?>);">
		<div class="container">
			<h1><?php the_title(); ?></h1>
		</div>
	</section>
<?php endif; ?>

<section id="page-content" class="container">
	<?php
	if ( function_exists('yoast_breadcrumb') && !is_page(386) ) {
		yoast_breadcrumb( '<p id="breadcrumbs">','</p>' ); 
	};
	while ( have_posts() ) :
		the_post();
		the_content();
	endwhile;
	?>
</section>
<?php get_footer();