<?php 
/* Template Name: About */ 
get_header();
get_template_part( 'template-parts/sections/section', 'page-hero' );
?>

<?php if( get_the_content() ): ?>
<section id="page-content" class="page">
    <div class="container">
        <div class="post-content">
            <?php the_content(); ?>
        </div>
        <?php 
        // get_sidebar();
        get_template_part( 'template-parts/components/component-block' );
        ?>
    </div>
</section>
<?php endif; ?>

<?php
get_template_part( 'template-parts/blog/section', 'related-posts' );
get_footer();
?>
