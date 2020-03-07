<?php

//--------------------------------------------------------------------------------------
/**
 * The template for displaying search results pages
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 * @package Iriska
 *------------------------------------------------------------------------------------*/

get_header();
$iriska_archives_show_sidebar = (int) get_theme_mod( 'iriska_archives_show_sidebar', 1 );
$iriska_active_sidebar = is_active_sidebar( 'iriska-search-page-sidebar' );
$iriska_class_layout = ( $iriska_archives_show_sidebar && $iriska_active_sidebar ) ? 'iriska-col-md-8 iriska-right-side-content' : 'iriska-col-md-12';
$iriska_class_layout_meta = ( $iriska_archives_show_sidebar && $iriska_active_sidebar ) ? 'iriska-col-md-4 iriska-left-side-content' : 'iriska-col-md-12';
?>
<div id="iriska-primary" class="iriska-content-area">
	<main id="iriska-main" class="iriska-site-main">
		<div class="iriska-wrapper-content iriska-wrapper-content-archive">
			<div class="iriska-container">
				<div class="iriska-row">
					<div class="<?php echo esc_attr( $iriska_class_layout_meta ); ?> iriska-main-sidebar-wrapper">
						<?php if ( have_posts() ) { ?>
							<div class="iriska-search-meta-wrapper">
								<div class="iriska-search-meta">
									<h1 class="iriska-search-title">
										<?php
											// translators: %s: search query
											printf( esc_html__( 'Search results for: %s', 'iriska' ), '<b>' . get_search_query() . '</b>' );
										?>
									</h1>
									<?php get_search_form(); ?>
								</div>
							</div>
						<?php } ?>
						<?php if ( $iriska_archives_show_sidebar && $iriska_active_sidebar ) { ?>
							<div class="iriska-sidebar-wrapper iriska-archive-sidebar">
								<div class="iriska-sidebar-content">
									<div class="iriska-close-button-wrapper">
										<div class="iriska-close-button iriska-close-button-sidebar">
											<?php echo iriska_close_icon_svg(); ?>
										</div>
									</div>
									<?php get_sidebar(); ?>
								</div>
							</div>
						<?php } ?>
					</div>
					<div class="<?php echo esc_attr( $iriska_class_layout ); ?> iriska-archive-content-area-wrapper">
						<?php
							if ( have_posts() ) { ?>
								<div class="iriska-posts-list">
									<?php
										// Start the Loop
										while ( have_posts() ) {
											the_post();
											// Post preview template file
											get_template_part( 'template-parts/contents/content', 'archive-layout-one' );											
										}
									?>
								</div>
								<?php get_template_part( 'template-parts/pagination/pagination', 'numbers-nav' );
							} else { ?>
								<div class="iriska-search-meta-wrapper">
									<h1 class="iriska-search-title"><?php esc_html_e( 'Nothing found', 'iriska' ); ?></h1>
									<p class="iriska-search-description"><?php esc_html_e( 'Please try again with different keywords.', 'iriska' ); ?></p>
									<?php get_search_form(); ?>
								</div>
								<?php 
							}
						?>
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