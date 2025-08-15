<a href="<?php the_permalink(); ?>" class="post-teaser">

    <?php
    if( has_post_thumbnail() ) {
        the_post_thumbnail();
    } else {
        echo wp_get_attachment_image( 210, 'full', '', array('class' => '') );
    }; 
    ?>
    <?php
        $categories = get_the_category();
        if ( ! empty( $categories ) ) {
            echo '<p class="post-category">' . $categories[0]->name . '</p>';
        }
    ?>
    <p class="post-date"><?php the_date(); ?></p>
    <div class="post-copy">
        <h3 class="post-title"><?php the_title(); ?></h3>
        <div class="post-excerpt"><?php the_excerpt(); ?></div>
    </div>
    
</a>