<?php $source = ''; ?>

<section id="post-hero" class="container">
	<h1 id="post-title">
		<?php
		if( get_field('title') ) {
			echo get_field('title');
		} else {
			the_title();
		}; 
		if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb( '<p id="breadcrumbs">','</p>' ); 
		};
		?>
	</h1>
	<?php if( !is_page_template('landing.php') ) { ?>
		<div id="featured-image">
			<?php 
			if( !is_page_template('landing.php') ) {
				if( has_post_thumbnail() ) {
					the_post_thumbnail();
				} else {
					echo wp_get_attachment_image( 210, 'full', '', array('class' => '') );
				};
			};
			?>
		</div>
	<?php }; ?>
	<?php 
	if( !is_page_template('landing.php') ) {
		get_template_part( 'template-parts/components/component', 'cta-element' ); 
	};
	?>
</section>