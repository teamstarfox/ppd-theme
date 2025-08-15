<?php
/* Template Name: Blog */ 

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package planpackdiscover
 */

get_header();
if ( have_posts() ) : 
get_template_part( 'template-parts/blog/section', 'featured-post' );
get_template_part( 'template-parts/blog/section', 'related-posts' );
endif; 
get_footer(); ?>
