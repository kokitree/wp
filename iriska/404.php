<?php

//----------------------------------------------------------------
/**
 * The template for displaying 404 pages (not found)
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 * @package Iriska
 *--------------------------------------------------------------*/

get_header();
$iriska_404_page_show_sidebar = (int) get_theme_mod( 'iriska_404_page_show_sidebar', 1 );
$iriska_active_sidebar = is_active_sidebar( 'iriska-404-page-sidebar' );
$iriska_class_layout = ( $iriska_404_page_show_sidebar && $iriska_active_sidebar ) ? 'iriska-col-md-8 iriska-right-side-content' : 'iriska-col-md-12';
?>
<div id="iriska-primary" class="iriska-content-area">
	<main id="iriska-main" class="iriska-site-main">
		<div class="iriska-wrapper-content iriska-wrapper-content-404">
			<div class="iriska-container">
				<div class="iriska-row">
					<?php if ( $iriska_404_page_show_sidebar && $iriska_active_sidebar ) { ?>
						<div class="iriska-col-md-4 iriska-left-side-content iriska-main-sidebar-wrapper">
							<div class="iriska-sidebar-wrapper iriska-404-sidebar">
								<div class="iriska-sidebar-content">
									<div class="iriska-close-button-wrapper">
										<div class="iriska-close-button iriska-close-button-sidebar">
											<?php echo iriska_close_icon_svg(); ?>
										</div>
									</div>
									<?php get_sidebar(); ?>
								</div>
							</div>
						</div>
					<?php } ?>
					<div class="<?php echo esc_attr( $iriska_class_layout ); ?>">
						<article class="iriska-error-404 iriska-not-found">
							<div class="galay-404-content-wrapper">
								<div class="iriska-page-header">
									<h1 class="iriska-page-title"><?php esc_html_e( 'Page not found', 'iriska' ); ?></h1>
								</div>
								<div class="iriska-content-page">
									<p><?php esc_html_e( 'Use the form below to search the site.', 'iriska' ); ?></p>
									<?php get_search_form(); ?>
								</div>
							</div>
						</article>
					</div>
					<div class="iriska-fixed-button-wrapper">
						<?php
							// Use this action to add other buttons. Add a class "iriska-fixed-button" so that the button is in the same design.
							do_action( 'iriska_fixed_button_before' );

							iriska_sidebar_button();
							
							// Use this action to add other buttons. Add a class "iriska-fixed-button" so that the button is in the same design.
							do_action( 'iriska_fixed_button_after' );
						?>
					</div>
				</div>
			</div>
		</div><!-- .iriska-wrapper-content -->
	</main><!-- #iriska-main -->
</div><!-- #iriska-primary -->
<?php get_footer();
