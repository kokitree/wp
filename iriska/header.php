<?php

//--------------------------------------------------------------------------------------------------------------
/**
 * The header for our theme
 * This is the template that displays all of the <head> section and everything up until <div id="iriska-content">
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Iriska
 *------------------------------------------------------------------------------------------------------------*/

$iriska_sticky_header_setting = (int) get_theme_mod( 'iriska_sticky_header', 1 );
$iriska_sticky_header = ( $iriska_sticky_header_setting ) ? 'iriska-sticky-header' : '';
$iriska_site_have_sticky_header = ( $iriska_sticky_header_setting ) ? 'iriska-site-have-sticky-header' : '';
?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<?php wp_head(); ?>
		
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-249504-35"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-249504-35');
</script>
		
		
	</head>
	<body <?php body_class('iriska-theme'); ?>>
		<?php
			if ( function_exists( 'wp_body_open' ) ) {
				wp_body_open();
			}
		?>
		<div id="iriska-page" class="iriska-site-wrapper">
			<a class="iriska-skip-link screen-reader-text" href="#iriska-content"><?php esc_html_e( 'Skip to content', 'iriska' ); ?></a>
			<?php do_action( 'iriska_before_header' ); ?>

			<?php if ( has_header_image() ) { ?>
				<header id="iriska-masthead" class="iriska-site-header iriska-site-header-with-image <?php echo esc_attr( $iriska_sticky_header ); ?>" style="background-image: url( <?php header_image(); ?>">
			<?php } else { ?>
				<header id="iriska-masthead" class="iriska-site-header <?php echo esc_attr( $iriska_sticky_header ); ?>">
			<?php } ?>
				<div class="iriska-header-wrapper">
					<div class="iriska-container">
						<div class="iriska-row">
				    	<?php get_template_part( '/template-parts/header/header', 'logo-left' ); ?>
						</div>
					</div>
				</div><!-- .iriska-header-wrapper -->
			</header><!-- #iriska-masthead -->
			<?php do_action( 'iriska_after_header' ); ?>
			<div id="iriska-content" class="iriska-site-content <?php echo esc_attr( $iriska_site_have_sticky_header ); ?>">