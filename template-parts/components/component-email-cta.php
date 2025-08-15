<div id="tsf-mc-form">
    <div id="tsf-mc-success">
        <?php
        $cta_element = get_field('cta_element_email', 'option');
        if($cta_element['success']){
            echo $cta_element['success'];
        } else {
            echo 'Thank you!';
        };
        ?>
    </div>
    <form id="tsf-mc-email">
        <input type="email" name="email" placeholder="<?php if( get_sub_field('placeholder') ) { echo get_sub_field('placeholder'); } else { ?>Email Address<?php }; ?>" class="email">
        <input type="submit" value="<?php if( get_sub_field('button') ) { echo get_sub_field('button'); } else { ?>Submit<?php }; ?>" class="cta-button">
    </form>
</div>