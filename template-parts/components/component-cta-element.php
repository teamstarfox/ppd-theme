<div class="cta-element-content">
    <div class="cta-element">
        <?php
        if( have_rows('cta_element', 'option') ) {
            while( have_rows('cta_element', 'option') ) { 
                the_row();
                echo wp_get_attachment_image( get_sub_field('icon'), 'thumbnail', '', array('class' => 'cta-icon') ); ?>
                <div class="copy">
                    <h3><?php if(get_sub_field('title')){ echo get_sub_field('title'); }; ?></h3>
                    <p><?php if(get_sub_field('copy')){ echo get_sub_field('copy'); } else { echo 'Gateway to Unforgettable Adventures - Tools, Recommendations.'; };?></p>
                </div>
            <?php
            };
        };
        get_template_part( 'template-parts/components/component', 'cta-button' );
        ?>
    </div>
</div>