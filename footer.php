			<?php
				echo '<div id=main__top>';
				echo '<a href="#content" aria-label="Scroll to top" class="scroll-to-top">';
				get_template_part( 'template-parts/svg/arrow-up' );
				echo '</a>';
				echo '</div>';
			?>
			
			</main>

			<footer id="colophon" class="site-footer">
				<div class="container">
					<div class="footer-logo">
						<?php the_custom_logo(); ?>
						<p class="tagline">Adventure awaits,<br>but preparation comes first.</p>
					</div>
					<div class="footer-menu">
						<h4>Discover</h4>
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-2',
									'menu_id'        => 'discover-menu',
								)
							);
						?>
					</div>
					<div class="footer-menu">
						<h4>Company</h4>
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-3',
									'menu_id'        => 'company-menu',
								)
							);
						?>
					</div>
					<div class="footer-menu social-menu">
						<h4>Follow Us</h4>
						<div class="social-icons">
							<?php get_template_part( 'template-parts/blog/component', 'social-follow-icons' ); ?>
						</div>
					</div>
				</div>

				<div class="copyright">
					<div class="container">
						<p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
						<p>Adventure Responsibly</p>
					</div>
				</div>
			</footer>			
		<?php wp_footer(); ?>
	</body>
</html>
