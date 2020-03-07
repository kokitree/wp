<?php

//--------------------------------------------------------------
/**
 * Template Name: Template For Page Builder
 * Template Post Type: page, post
 * @package Iriska
 *------------------------------------------------------------*/

get_header();
?>
<div id="iriska-primary" class="iriska-content-area">
	<main id="iriska-main" class="iriska-site-main">
		<div class="iriska-wrapper-content iriska-wrapper-content-simple-page">
			<div class="iriska-content-page-area-wrapper">
				<div class="iriska-content-page">
					<?php
						while ( have_posts() ) {
							the_post();
							// Page content
							the_content();

							if ( comments_open() || get_comments_number() ) {
								if ( !post_password_required() ) { ?>
									<section class="iriska-comment-section">
										<div class="iriska-comment-area-wrapper">
											<div class="iriska-comment-area">
												<div class="iriska-close-button-wrapper">
													<div class="iriska-close-button iriska-close-button-comment">
														<?php echo iriska_close_icon_svg(); ?>
													</div>
												</div>
												<?php comments_template(); ?>
											</div>
										</div>
									</section>
									<?php 
								}
							}
						}
					?>
					
					<div class="iriska-fixed-button-wrapper">
						<?php
							// Use this action to add other buttons. Add a class "iriska-fixed-button" so that the button is in the same design.
							do_action( 'iriska_fixed_button_before' );

							iriska_comments_button();
							
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