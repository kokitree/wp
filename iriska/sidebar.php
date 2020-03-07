<?php

//--------------------------------------------------------------------------------------
/**
 * The sidebar containing the main widget areas
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Iriska
 *------------------------------------------------------------------------------------*/
?>

<div id="iriska-main-widgets-area" class="iriska-sidebar widget-area">
	<?php
		if ( is_archive() || is_home() ) {
			dynamic_sidebar( 'iriska-archives-sidebar' );
		}

		if ( is_single() ) {
			dynamic_sidebar( 'iriska-single-post-sidebar' );
		}

		if ( is_page() ) {
			dynamic_sidebar( 'iriska-single-page-sidebar' );
		}

		if ( is_404() ) {
			dynamic_sidebar( 'iriska-404-page-sidebar' );
		}

		if ( is_search() ) {
			dynamic_sidebar( 'iriska-search-page-sidebar' );
		}
	?>
</div>
