<section id="featured-post" class="container">
	
    <?php 
    if ( function_exists('yoast_breadcrumb') ) { 
        yoast_breadcrumb( '<p id="breadcrumbs">','</p>' ); 
    }
    ?>

	<a href="<?php the_permalink(); ?>" class="featured-post-hero">
        <h1 class="post-title"><?php the_title(); ?></h1>
        <div class="post-meta">
            <?php
                $categories = get_the_category();
                if ( ! empty( $categories ) ) {
                    echo '<span class="post-category">' . $categories[0]->name . '</span>';
                }
                echo ' | ';
                the_date();
            ?>
        </div>
        <div class="featured-image">
            <?php
            if( has_post_thumbnail() ) {
                the_post_thumbnail();
            } else {
                echo wp_get_attachment_image( 210, 'full', '', array('class' => '') );
            }; 
            ?>
        </div>
    </a>
	<?php get_template_part( 'template-parts/components/component', 'cta-element' ); ?>
    
</section>