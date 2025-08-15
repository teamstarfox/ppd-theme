<div class="cta-element-content">
    <div class="cta-element cta-email">
        <?php
        if( have_rows('cta_element_email', 'option') ) {
            while( have_rows('cta_element_email', 'option') ) { 
                the_row();
                echo wp_get_attachment_image( get_sub_field('icon'), 'thumbnail', '', array('class' => 'cta-icon') ); ?>
                <div class="copy">
                    <h3>
                        <?php 
                            
                            // WRITE CODE TO DISPLAY CUSTOM TEXT IN POSTS

                            // PROBABLY FIGURE OUT HOW TO MOVE VARIABLES/SHORTCODE ATTRIBUTES TO THE TEMPLATE PART FILE

                            if(get_sub_field('title')){ 
                                echo get_sub_field('title'); 
                            } else { 
                                echo 'Discover. Plan. Conquer.'; 
                            }; 
                        ?>
                    </h3>
                    <p><?php if(get_sub_field('copy')){ echo get_sub_field('copy'); } else { echo 'Gateway to Unforgettable Adventures - Tools, Recommendations.'; };?></p>
                </div>
            <?php
            };
        };
        get_template_part( 'template-parts/components/component', 'email-cta' );
        ?>
    </div>
</div>