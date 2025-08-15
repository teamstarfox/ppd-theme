<div class="block">
    <?php if (is_single()) : ?>
    <div class="block__related">
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
        <!-- <div class="post-categories sidebar-tile sidebar">
            <h4>Other Categories</h4>
            <?php
                // $categories = get_categories();
                // foreach($categories as $category) {
                // 	echo '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>';
                // }	
            ?>
        </div> -->
    </div>
    <?php endif; ?>
    <?php 
    if( have_rows('about_content', 'option') ):
        while( have_rows('about_content', 'option') ): 
            the_row();
            echo '<div class="block__about">';
                echo wp_get_attachment_image( get_sub_field('image'), 'medium', '', array('class' => 'sidebar',) );
                if(get_sub_field('copy')){ 
                    echo '<div class="copy">' . get_sub_field('copy');
                    get_template_part( 'template-parts/blog/component', 'social-follow' );

                    if(is_single()):
                        echo '<a href="/about" class="cta">More about me and Plan | Pack | Discover';
                    else:
                        echo '<a href="/app" class="cta">Try the App!';
                    endif;
                    
                    get_template_part( 'template-parts/svg/arrow-right' );
                    echo '</a>';
                    echo '</div>'; 
                };
                echo '</div>';
        endwhile; 
    endif;
    ?>
</div>