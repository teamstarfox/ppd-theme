<?php

if( have_rows('cta_button', 'option') ) {
    while( have_rows('cta_button', 'option') ) { 
        the_row();
        ?>
            <a href="<?php echo get_sub_field('page'); ?>" class="cta-button"><?php if(get_sub_field('copy')) { echo get_sub_field('copy'); } else { echo 'Start Planning'; } ?></a>
        <?php
    }
};

?>