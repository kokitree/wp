<?php

//------------------------------------------------------------------------
/**
 * Template part for displaying header
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Iriska
 *----------------------------------------------------------------------*/

$iriska_display_site_meta = '';
if ( display_header_text() ) {
	$iriska_display_site_meta = 'iriska-display-site-meta';
	$iriska_description = get_bloginfo( 'description' );
	$iriska_site_name = get_bloginfo( 'name' );
}

?>
<div class="iriska-menu-logo-wrapper iriska-logo-position-left clearfix">
	<div class="iriska-site-branding-wrapper iriska-col-md-3 iriska-col-sm-3 iriska-col-xs-4">
		<div class="iriska-site-branding">
			<div class="iriska-site-logo <?php echo esc_attr( $iriska_display_site_meta ); ?>">
				<?php the_custom_logo(); ?>
			</div>
			<?php if ( display_header_text() ) { ?>
				<div class="iriska-site-meta">
					<p class="iriska-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( $iriska_site_name ); ?></a></p>
					<?php if ( $iriska_description ) { ?>
						<p class="iriska-site-description"><?php echo esc_html( $iriska_description ); /* WPCS: xss ok. */ ?></p>
					<?php } ?>
				</div>
			<?php } ?>
		</div><!-- .iriska-site-branding -->
	</div><!-- .iriska-site-branding-wrapper -->
	<div class="iriska-main-site-navigation-wrapper iriska-col-md-9 iriska-col-sm-9 iriska-col-xs-8">
		<div class="iriska-main-navigation-wrapper">
			<div class="iriska-close-button-wrapper">
				<div class="iriska-close-button iriska-close-button-menu">
					<?php echo iriska_close_icon_svg(); ?>
				</div>
			</div>
			<nav id="iriska-site-navigation" class="iriska-main-navigation">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'iriska-menu',
						'menu_id' => 'iriska-primary-menu',
						'menu_class' => 'iriska-site-menu clearfix',
						'items_wrap' => '<div class="iriska-back-button-menu-wrapper"><span class="iriska-back-button-menu">' . iriska_arrow_left_icon_svg() . '</span></div><div class="iriska-current-menu-item-text-wrapper"><span class="iriska-current-menu-item-text"></span></div><ul id="%1$s" class="%2$s">%3$s</ul>',
						'after' => '<div class="iriska-open-sub-menu-button-wrapper"><span class="iriska-open-sub-menu-button iriska-open-sub-menu-button-element-1"></span><span class="iriska-open-sub-menu-button iriska-open-sub-menu-button-element-2"></span></div>',
						'fallback_cb' => 'iriska_menu_placeholder'
					) );
				?>
			</nav><!-- #iriska-site-navigation -->
		</div>
		<div class="iriska-open-menu-button-wrapper">
			<?php echo iriska_sidebar_icon_svg(); ?>
		</div>
	</div><!-- .iriska-main-site-navigation-wrapper -->
</div><!-- .iriska-logo-position-left -->