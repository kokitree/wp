		<footer id="site-footer">

			<?php if ( is_active_sidebar( 'footer-one' ) || is_active_sidebar( 'footer-two' ) || is_active_sidebar( 'footer-three' ) ) : ?>

				<div class="footer-widgets-outer-wrapper section-inner">

					<div class="footer-widgets-wrapper">

						<div class="footer-widgets">
							<?php dynamic_sidebar( 'footer-one' ); ?>
						</div>

						<div class="footer-widgets">
							<?php dynamic_sidebar( 'footer-two' ); ?>
						</div>

						<div class="footer-widgets">
							<?php dynamic_sidebar( 'footer-three' ); ?>
						</div>

					</div><!-- .footer-widgets-wrapper -->

				</div><!-- .footer-widgets-outer-wrapper.section-inner -->

			<?php endif; ?>

			<div class="footer-bottom section-inner">

				<div class="footer-credits">

					<p class="footer-copyright">&copy; <?php echo date( 'Y' ); ?> <?php echo bloginfo( 'name' ); ?></p>

					<p class="theme-credits">
/
					</p><!-- .theme-credits -->

				</div><!-- .footer-credits -->

				<?php if ( has_nav_menu( 'footer-menu' ) ) : ?>

					<ul class="footer-nav reset-list-style">
						<?php
						wp_nav_menu( array(
							'container' 		=> '',
							'depth'				=> 1,
							'items_wrap' 		=> '%3$s',
							'theme_location' 	=> 'footer-menu',
						) );
						?>
					</ul><!-- .site-nav -->

				<?php endif; ?>

			</div><!-- .footer-bottom -->

		</footer><!-- #site-footer -->
		
		<?php wp_footer(); ?>

	</body>
</html>
