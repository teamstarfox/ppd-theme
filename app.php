<?php
/* Template Name: App */ 

get_header(); ?>

<section id="page-content" class="container">
	<?php
	while ( have_posts() ) :
		the_post();
		the_content();
	endwhile;
	?>
</section>
<? get_footer();