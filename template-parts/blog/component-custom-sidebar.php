<aside id="post-sidebar" class="widget-area">
	<?php //dynamic_sidebar( 'sidebar-1' ); ?>
	<?php echo wp_get_attachment_image( 8, 'medium', '', array('class' => 'image-shadow sidebar',) ); ?>
	<div class="sidebar-about sidebar">
		<h4>Meet Dave.</h4>
		<p>Hi, I’m Elle. I love exploring this beautiful thing called Planet Earth. My goal is to help busy people like you plan affordable yet memorable adventures jam-packed with epic views, good food, and memorable cultural experiences. All you need to do is sit back/relax, follow my travel guides, and prepare yourself to make new memories.</p>
	</div>
	<div class="sidebar-tiles">
		<div class="releated-posts sidebar-tile sidebar">
			<h4>Related Posts</h4>
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
		<div class="post-categories sidebar-tile sidebar">
			<h4>Other Categories</h4>
			<?php
				$categories = get_categories();
				foreach($categories as $category) {
					echo '<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>';
				}	
			?>
		</div>
	</div>
</aside>