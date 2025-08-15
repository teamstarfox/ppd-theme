<?php 
/* Template Name: Landing */ 
get_header();
get_template_part( 'template-parts/sections/section', 'page-hero' );
if( have_rows('landing_content') ): while( have_rows('landing_content') ): the_row(); 
?>

    <section id="page-content" class="post landing">
        <div class="container">
            <div class="post-content">
                <?php if( get_sub_field('image') ) { echo wp_get_attachment_image( get_sub_field('image'), 'large', '', array('class' => 'image-shadow') ); }; ?>
                <div class="copy">                
                    <?php if( get_sub_field('copy') ) { echo get_sub_field('copy'); }; ?>
                </div>
            </div>
        </div>
    </section>

<?php endwhile; endif;
get_template_part( 'template-parts/blog/section', 'related-posts' );
get_footer();