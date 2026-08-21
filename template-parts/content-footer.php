<div class="content-footer">
    <?php if (is_single()) : ?>
    <div class="content-footer__related">
        <div class="releated-posts sidebar-tile sidebar">
            <h3>Related Posts</h3>
            <?php
                $args		= [
                    'cat' => get_query_var('cat'),
                    'order' => 'ASC',
                    'post__not_in'           => [get_the_ID()],
                ];
                $all_posts 	= new WP_Query( $args );
                while ($all_posts -> have_posts()) : $all_posts -> the_post(); ?>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <?php 
                endwhile;
                wp_reset_postdata();
            ?>
        </div>
    </div>
    <?php endif; ?>
    <?php 
    if( have_rows('about_content', 'option') ):
        $cta_post = get_field('about_cta_post', 'option');
        $cta_page = get_field('about_cta_page', 'option');
        while( have_rows('about_content', 'option') ): 
            the_row();
            echo '<div class="content-footer__about">';
                echo wp_get_attachment_image( get_sub_field('image'), 'medium', '', array('class' => 'sidebar',) );
                if(get_sub_field('copy')){ 
                    echo '<div class="copy">' . get_sub_field('copy');
                    get_template_part( 'template-parts/blog/component', 'social-follow' );

                    if(is_single()):
                        if($cta_post):
                            $cta_url = $cta_post['url'];
                            $cta_title = $cta_post['title'];
                        endif;
                    else:
                        if($cta_page):
                            $cta_url = $cta_page['url'];
                            $cta_title = $cta_page['title'];
                        endif;
                    endif;
                    echo '<a class="cta" href="' . $cta_url . '" class="button">';
                    echo $cta_title;
                    get_template_part( 'template-parts/svg/arrow-right' );
                    echo '</a>';
                    echo '</div>'; 
                };
                echo '</div>';
        endwhile; 
    endif;
    ?>
</div>