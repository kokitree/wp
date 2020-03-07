<?php

//------------------------------------------------------------------------
/**
 * The template for displaying all pages
 * This is the template that displays all pages by default
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Iriska
 *----------------------------------------------------------------------*/

get_header();
$iriska_single_page_show_sidebar = (int) get_theme_mod( 'iriska_single_page_show_sidebar', 1 );
$iriska_active_sidebar = is_active_sidebar( 'iriska-single-page-sidebar' );
$iriska_class_layout = ( $iriska_single_page_show_sidebar && $iriska_active_sidebar ) ? 'iriska-col-md-8 iriska-right-side-content' : 'iriska-col-md-12';
?>
<div id="iriska-primary" class="iriska-content-area">
	<main id="iriska-main" class="iriska-site-main">
		<div class="iriska-wrapper-content iriska-wrapper-content-page">
			<div class="iriska-container">
				<div class="iriska-row">
					<?php if ( $iriska_single_page_show_sidebar && $iriska_active_sidebar ) { ?>
						<div class="iriska-col-md-4 iriska-left-side-content iriska-main-sidebar-wrapper">
							<div class="iriska-sidebar-wrapper iriska-page-sidebar">
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
					<div class="<?php echo esc_attr( $iriska_class_layout ); ?> iriska-content-page-area-wrapper">
						<?php if ( have_posts() ) { ?>
							<div class="iriska-content-page">
								<?php
									// Start the Loop
									while ( have_posts() ) {
										the_post();
										// Single page template file
										get_template_part( 'template-parts/contents/content', 'single-page-layout-one' );
									}
								?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div><!-- .iriska-wrapper-content -->
	</main><!-- #iriska-main -->
</div><!-- #iriska-primary -->
<?php get_footer();
