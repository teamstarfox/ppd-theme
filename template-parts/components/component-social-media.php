<?php if( have_rows('social_media_content', 'option') ) : ?>
    <div class="social-media">
        <h5>Follow Dave</h5>
        <div class="icons">
            <?php
                while( have_rows('social_media_content', 'option') ) : 
                    the_row();
                    echo '<a href="' . get_sub_field('link') . '" class="icon-link">';
                    echo wp_get_attachment_image( get_sub_field('icon'), 'thumbnail', '', array('class' => 'cta-icon') );
                    echo '</a>';
                endwhile;
            ?>
        </div>
    </div>
<?php endif; ?>