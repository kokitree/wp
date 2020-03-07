<?php

//--------------------------------------------------------------------------------------
/**
 * The template for displaying the footer
 * Contains the closing of the #iriska-content div and all content after
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Iriska
 *------------------------------------------------------------------------------------*/

// translators: %1$s: link to WordPress, %2$s: link to Iriska Theme
$iriska_footer_copyright_text = get_theme_mod( 'iriska_footer_copyright_text', sprintf( esc_html__( 'Site powered by %1$s | Theme: %2$s', 'iriska' ), '<a href="https://wordpress.org/">WordPress</a>', '<a href="http://iriska.myspaceship.space">Iriska</a>' ) );
?>
			</div><!-- #iriska-content -->
			<footer id="iriska-footer" class="iriska-site-footer">
				<?php if ( is_active_sidebar( 'iriska-footer-widget-area-1' ) || is_active_sidebar( 'iriska-footer-widget-area-2' ) || is_active_sidebar( 'iriska-footer-widget-area-3' ) || is_active_sidebar( 'iriska-footer-widget-area-4' ) ) { ?>
					<div class="iriska-footer-widget-areas-wrapper">
						<div class="iriska-container">
							<div class="iriska-row">
								<div class="iriska-col-md-12">
									<div class="iriska-footer-widget-areas clearfix">
										<div class="iriska-footer-widget-area iriska-footer-widget-area-1">
											<?php dynamic_sidebar( 'iriska-footer-widget-area-1' ); ?>
										</div>
										<div class="iriska-footer-widget-area iriska-footer-widget-area-2">
											<?php dynamic_sidebar( 'iriska-footer-widget-area-2' ); ?>
										</div>
										<div class="iriska-footer-widget-area iriska-footer-widget-area-3">
											<?php dynamic_sidebar( 'iriska-footer-widget-area-3' ); ?>
										</div>
										<div class="iriska-footer-widget-area iriska-footer-widget-area-4">
											<?php dynamic_sidebar( 'iriska-footer-widget-area-4' ); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
				<?php if ( $iriska_footer_copyright_text ) { ?>
					<div class="iriska-copyright-area">
						<div class="iriska-container">
							<div class="iriska-row">
								<div class="iriska-col-md-12">
									<div class="iriska-site-info">
										<?php
											// Used the "wpautop" function to wrap the text with the tag "<p>"
											echo wp_kses_post( wpautop( $iriska_footer_copyright_text ) );
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</footer><!-- #iriska-footer -->
		</div><!-- #iriska-page -->
		<?php wp_footer(); ?>
	</body>
</html>
