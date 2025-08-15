<?php
add_shortcode( 'ppd-ad', function($atts, $content = null){
    return '<div class="ppd-ad">' . $content . '</div>';
});

add_shortcode( 'cta-element', function($atts, $content = null){
    $a = shortcode_atts( array(
        'type'          => 'default',
        'icon'          => '',
        'title'         => '',
        'copy'          => '',
        'button_text'   => '',
        'button_link'   => '',
        'background'    => '',
    ), $atts );

    ob_start();

    $cta_button = get_field('cta_button', 'option');

    if( $a['button_text'] ) {
        $b_text = $a['button_text'];
    } elseif( $cta_button['copy'] ){ 
        $b_text = $cta_button['copy']; 
    } else { 
        $b_text = 'Start Planning';
    }; 

    if( $a['button_link'] ) {
        $b_link = $a['button_link'];
    } elseif( $cta_button['page'] ){ 
        $b_link = $cta_button['page']; 
    } else { 
        $b_link = '/app';
    };

    if($a['type'] === 'email') { ?>

        <div class="cta-element-content">

            <?php
                if( $a['background'] ) {
                    $background = $a['background'];
                } else { 
                    $background = '#F1F6F9';
                };
            ?>

            <div class="cta-element cta-email" style="background-color:<?php echo $background; ?>">
                <?php
                if( have_rows('cta_element_email', 'option') ) {
                    while( have_rows('cta_element_email', 'option') ) { 
                        the_row();

                        if( $a['icon'] ) {
                            echo '<img src="' . $a['icon'] . '" class="cta-icon" alt="cta-icon">';
                        }elseif(get_sub_field('icon')){ 
                            echo wp_get_attachment_image( get_sub_field('icon'), 'thumbnail', '', array('class' => 'cta-icon') );
                        } else { 
                            echo wp_get_attachment_image( 945, 'thumbnail', '', array('class' => 'cta-icon') );
                        };
                        ?>

                        <div class="copy">
                            
                            <h3>
                                <?php 
                                
                                    if( $a['title'] ) {
                                        echo $a['title'];
                                    } elseif( get_sub_field('title') ) { 
                                        echo get_sub_field('title'); 
                                    } else {
                                        echo 'Discover. Plan. Conquer.'; 
                                    }; 
                                
                                ?>
                            </h3>

                            <p>
                                <?php 
                                
                                    if( $a['copy'] ) {
                                        echo $a['copy']; 
                                    } elseif(get_sub_field('copy')){ 
                                        echo get_sub_field('copy'); 
                                    } else { 
                                        echo 'Gateway to Unforgettable Adventures - Tools, Recommendations.'; 
                                    };

                                ?>
                            </p>

                        </div>
                    <?php
                    };
                };
                get_template_part( 'template-parts/components/component', 'email-cta' );
                ?>
            </div>
        </div>

    <?php } else { ?>
        <div class="cta-element-content">

            <?php
                if( $a['background'] ) {
                    $background = $a['background'];
                } else { 
                    $background = '#F1F6F9';
                };
            ?>

            <div class="cta-element" style="background-color:<?php echo $background; ?>">
                <?php
                if( have_rows('cta_element', 'option') ) {
                    while( have_rows('cta_element', 'option') ) { 
                        the_row();
                        
                        if( $a['icon'] ) {
                            echo '<img src="' . $a['icon'] . '" class="cta-icon" alt="cta-icon">';
                        }elseif(get_sub_field('icon')){ 
                            echo wp_get_attachment_image( get_sub_field('icon'), 'thumbnail', '', array('class' => 'cta-icon') );
                        } else { 
                            echo wp_get_attachment_image( 945, 'thumbnail', '', array('class' => 'cta-icon') );
                        };

                        ?>
                        <div class="copy">
                            
                            <h3>
                                <?php 
                                
                                    if( $a['title'] ) {
                                        echo $a['title'];
                                    } elseif( get_sub_field('title') ) { 
                                        echo get_sub_field('title'); 
                                    } else {
                                        echo 'Discover. Plan. Conquer.'; 
                                    }; 
                                
                                ?>
                            </h3>

                            <p>
                                <?php 
                                
                                    if( $a['copy'] ) {
                                        echo $a['copy']; 
                                    } elseif(get_sub_field('copy')){ 
                                        echo get_sub_field('copy'); 
                                    } else { 
                                        echo 'Gateway to Unforgettable Adventures - Tools, Recommendations.'; 
                                    };

                                ?>
                            </p>

                        </div>
                    <?php
                    };
                }; 
                ?>
                <a href="<?php echo $b_link; ?>" class="cta-button"><?php echo $b_text; ?></a>
            </div>
        </div>
    <?php };
    
    $ret = ob_get_contents();
    ob_end_clean();

    return $ret;
});