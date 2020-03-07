<?php

//---------------------------------------------------------------------
/**
 * About Iriska
 * @package Iriska
 *-------------------------------------------------------------------*/

function iriska_add_about_page() {
	add_theme_page( esc_html__( 'About Iriska', 'iriska' ), esc_html__( 'About Iriska', 'iriska' ), 'edit_theme_options', 'about-iriska', 'iriska_about_html');
}
add_action('admin_menu', 'iriska_add_about_page');

function iriska_about_page_scripts() {
	wp_enqueue_style( 'iriska-about-style', get_template_directory_uri() . '/inc/admin/css/iriska-about.css' );
	wp_enqueue_script( 'iriska-about-script', get_template_directory_uri() . '/inc/admin/js/iriska-about.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'admin_enqueue_scripts', 'iriska_about_page_scripts' );

function iriska_about_html() { ?>
	<div class="iriska-about-wrapper">
		
		<div class="iriska-about">
			<div class="iriska-tabs-wrapper">
				<ul class="iriska-tabs">
					<li class="iriska-tab iriska-about-tab" data-tab-id="0"><?php esc_html_e( 'About Iriska', 'iriska' ); ?></li>
					<li class="iriska-tab iriska-next-updates" data-tab-id="1"><?php esc_html_e( 'Documentation', 'iriska' ); ?></li>
				</ul>
			</div>	
			<div class="iriska-tabs-content-wrapper">
				<div class="iriska-tabs-content-about-background" style="background-image: url('<?php echo get_template_directory_uri() . '/inc/admin/img/Iriska.png'; ?>');">
					<div class="iriska-tabs-content iriska-about-content-wrapper" data-content-id="0">
						<div class="iriska-about-content">
							<div class="iriska-about-text">
								<h1 class="iriska-title"><?php esc_html_e( 'Iriska', 'iriska' ); ?></h1>
								<p><?php esc_html_e( 'This theme is dedicated to the Iriska. She was kind, cheerful, loved to play various games. Unfortunately, she is no more and it is very sad. She lived 13 years. Next to the text her photo, she was so awesome!', 'iriska' ); ?></p>
								<p><?php esc_html_e( 'A piece of Iriska will forever be in this theme and in all sites that use the Iriska theme.', 'iriska' ); ?></p>
							</div>
						</div>
						<div class="iriska-about-image">
							<img src="<?php echo get_template_directory_uri() . '/inc/admin/img/Iriska.png'; ?>" alt="<?php esc_html_e( 'Iriska', 'iriska' ); ?>" />
						</div>
					</div>
				</div>
				<div class="iriska-tabs-content iriska-about-documentation-content-wrapper" data-content-id="1">
					<h1 class="iriska-title"><?php esc_html_e( 'Documentation', 'iriska' ); ?></h1>
					<p><?php esc_html_e( 'The documentation describes the theme features, hooks and filters. If the documentation did not help, create a ticket to WordPress.org with question or send the question using the contact form on the page with documentation on the tab "Support". Documentation page also contains the latest changes in the theme, which files were edited and what will be added in the next version.', 'iriska' ); ?></p>
					<a href="http://iriska.myspaceship.space/documentation/" target="_blank" class="iriska-button"><?php esc_html_e( 'View documentation', 'iriska' ); ?></a>
				</div>
			</div>
		</div>
	</div>
	<?php
}