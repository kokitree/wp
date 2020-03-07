<?php

//---------------------------------------------------------------------
/**
 * Iriska dynamic min css
 * @package Iriska
 *-------------------------------------------------------------------*/

function iriska_dynamic_style_min_css() {
	// Main Colors
	$iriska_accent_color = iriska_sanitize_color_output( get_theme_mod( 'iriska_accent_color', '#ebced0' ) );
	$iriska_contrast_color = iriska_sanitize_color_output( get_theme_mod( 'iriska_contrast_color', '#000000' ) );
	$iriska_accent_color_hover = iriska_sanitize_color_output( get_theme_mod( 'iriska_accent_color_hover', '#ffffff' ) );
	$iriska_accent_background_hover = iriska_sanitize_color_output( get_theme_mod( 'iriska_accent_background_hover', '#000000' ) );
	// Content Links Color
	$iriska_content_links_color = iriska_sanitize_color_output( get_theme_mod( 'iriska_content_links_color', '#ebced0' ) );
	$iriska_content_links_hover_color = iriska_sanitize_color_output( get_theme_mod( 'iriska_content_links_hover_color', '#000000' ) );
	// Pages, Posts, Archives Colors
	$iriska_content_space_background = iriska_sanitize_color_output( get_theme_mod( 'iriska_content_space_background', '#f7f7f7' ) );
	$iriska_content_some_elements_color = iriska_sanitize_color_output( get_theme_mod( 'iriska_content_some_elements_color', '#000000' ) );
	$iriska_content_background = iriska_sanitize_color_output( get_theme_mod( 'iriska_content_background', '#ffffff' ) );
	$iriska_content_color = iriska_sanitize_color_output( get_theme_mod( 'iriska_content_color', '#333333' ) );
	$iriska_borders_color = iriska_sanitize_color_output( get_theme_mod( 'iriska_borders_color', '#dddddd' ) );
	// Header Color
	$iriska_header_textcolor = sanitize_text_field( get_theme_mod( 'header_textcolor' ) );
	$iriska_site_name_and_description_color = ( $iriska_header_textcolor ) ? $iriska_header_textcolor : '000000';
	$iriska_header_background = iriska_sanitize_color_output( get_theme_mod( 'iriska_header_background', '#ffffff' ) );
	$iriska_submenu_and_mobile_menu_background = iriska_sanitize_color_output( get_theme_mod( 'iriska_submenu_and_mobile_menu_background', '#ffffff' ) );
	$iriska_header_main_colors = iriska_sanitize_color_output( get_theme_mod( 'iriska_header_main_colors', '#ebced0' ) );
	$iriska_header_links_and_text_color = iriska_sanitize_color_output( get_theme_mod( 'iriska_header_links_and_text_color', '#000000' ) );
	$iriska_menu_links_hover_color = iriska_sanitize_color_output( get_theme_mod( 'iriska_menu_links_hover_color', '#ebced0' ) );
	$iriska_menu_current_link_color = iriska_sanitize_color_output( get_theme_mod( 'iriska_menu_current_link_color', '#ebced0' ) );
	$iriska_header_shadow_color = iriska_sanitize_color_output( get_theme_mod( 'iriska_header_shadow_color', '#dddddd' ) );
	// Footer Color
	$iriska_footer_copyright_area_background = iriska_sanitize_color_output( get_theme_mod( 'iriska_footer_copyright_area_background', '#ffffff' ) );
	$iriska_footer_copyright_area_color = iriska_sanitize_color_output( get_theme_mod( 'iriska_footer_copyright_area_color', '#333333' ) );
	$iriska_footer_widgets_area_background = iriska_sanitize_color_output( get_theme_mod( 'iriska_footer_widgets_area_background', '#ffffff') );
	$iriska_footer_widgets_area_color = iriska_sanitize_color_output( get_theme_mod( 'iriska_footer_widgets_area_color', '#333333') );
	$iriska_footer_widgets_area_border_color = iriska_sanitize_color_output( get_theme_mod( 'iriska_footer_widgets_area_border_color', '#dddddd') );
	// Overlay Color
	$iriska_overlay_background = iriska_sanitize_color_output( get_theme_mod( 'iriska_overlay_background', 'rgba(0, 0, 0, 0.3)' ) );
	// Single Post Layout */
	$iriska_single_post_widget_area_widgets_width = (int) get_theme_mod( 'iriska_single_post_widget_area_widgets_width', 100 );
	// Footer Layout
	$iriska_width_footer_widgets_area_1_large_screens = iriska_sanitize_integer_output( get_theme_mod( 'iriska_width_footer_widgets_area_1_large_screens', 25 ) );
	$iriska_width_footer_widgets_area_2_large_screens = iriska_sanitize_integer_output( get_theme_mod( 'iriska_width_footer_widgets_area_2_large_screens', 25 ) );
	$iriska_width_footer_widgets_area_3_large_screens = iriska_sanitize_integer_output( get_theme_mod( 'iriska_width_footer_widgets_area_3_large_screens', 25 ) );
	$iriska_width_footer_widgets_area_4_large_screens = iriska_sanitize_integer_output( get_theme_mod( 'iriska_width_footer_widgets_area_4_large_screens', 25 ) );
	$iriska_width_footer_widgets_area_1_medium_screens = iriska_sanitize_integer_output( get_theme_mod( 'iriska_width_footer_widgets_area_1_medium_screens', 50 ) );
	$iriska_width_footer_widgets_area_2_medium_screens = iriska_sanitize_integer_output( get_theme_mod( 'iriska_width_footer_widgets_area_2_medium_screens', 50 ) );
	$iriska_width_footer_widgets_area_3_medium_screens = iriska_sanitize_integer_output( get_theme_mod( 'iriska_width_footer_widgets_area_3_medium_screens', 50 ) );
	$iriska_width_footer_widgets_area_4_medium_screens = iriska_sanitize_integer_output( get_theme_mod( 'iriska_width_footer_widgets_area_4_medium_screens', 50 ) );
	$iriska_width_footer_widgets_area_1_small_screens = iriska_sanitize_integer_output( get_theme_mod( 'iriska_width_footer_widgets_area_1_small_screens', 100 ) );
	$iriska_width_footer_widgets_area_2_small_screens = iriska_sanitize_integer_output( get_theme_mod( 'iriska_width_footer_widgets_area_2_small_screens', 100 ) );
	$iriska_width_footer_widgets_area_3_small_screens = iriska_sanitize_integer_output( get_theme_mod( 'iriska_width_footer_widgets_area_3_small_screens', 100 ) );
	$iriska_width_footer_widgets_area_4_small_screens = iriska_sanitize_integer_output( get_theme_mod( 'iriska_width_footer_widgets_area_4_small_screens', 100 ) );
	// Header Layout
	$iriska_header_height_large = (int) get_theme_mod( 'iriska_header_height_large', 100 );
	$iriska_header_logo_width_large = iriska_sanitize_integer_output( get_theme_mod( 'iriska_header_logo_width_large', 80 ) );
	$iriska_sticky_header_height_large = (int) get_theme_mod( 'iriska_sticky_header_height_large', 80 );
	$iriska_sticky_header_logo_width_large = iriska_sanitize_integer_output( get_theme_mod( 'iriska_sticky_header_logo_width_large', 70 ) );
	$iriska_header_height_medium = (int) get_theme_mod( 'iriska_header_height_medium', 80 );
	$iriska_header_logo_width_medium = iriska_sanitize_integer_output( get_theme_mod( 'iriska_header_logo_width_medium', 100 ) );
	$iriska_sticky_header_height_medium = (int) get_theme_mod( 'iriska_sticky_header_height_medium', 60 );
	$iriska_sticky_header_logo_width_medium = iriska_sanitize_integer_output( get_theme_mod( 'iriska_sticky_header_logo_width_medium', 70 ) );
	$iriska_header_height_small = (int) get_theme_mod( 'iriska_header_height_small', 60 );
	$iriska_header_logo_width_small = iriska_sanitize_integer_output( get_theme_mod( 'iriska_header_logo_width_small', 80 ) );
	$iriska_sticky_header_height_small = (int) get_theme_mod( 'iriska_sticky_header_height_small', 50 );
	$iriska_sticky_header_logo_width_small = iriska_sanitize_integer_output( get_theme_mod( 'iriska_sticky_header_logo_width_small', 70 ) );
	$iriska_mobile_menu_for_all_screens = (int) get_theme_mod( 'iriska_mobile_menu_for_all_screens', 0 );
	$iriska_mobile_menu = (int) get_theme_mod( 'iriska_mobile_menu', 1200 );
	$iriska_mobile_menu = ( $iriska_mobile_menu_for_all_screens ) ? 0 : $iriska_mobile_menu;
	$iriska_mobile_menu_hidden = $iriska_mobile_menu + 1;
	// Content Layout
	$iriska_full_width_content = (int) get_theme_mod( 'iriska_full_width_content', 0 );
	$iriska_content_width = ( $iriska_full_width_content ) ? 100 : (int) get_theme_mod( 'iriska_content_width', 1170 );
	$iriska_content_width_value = ( $iriska_full_width_content ) ? '%' : 'px';
	// Typography Settings
	$iriska_content_font_css = sanitize_text_field( get_theme_mod( 'iriska_content_font_css', '"Montserrat", sans-serif;' ) );
	$iriska_content_font_weight = (int) get_theme_mod( 'iriska_content_font_weight', 400 );
	$iriska_headings_font_css = sanitize_text_field( get_theme_mod( 'iriska_headings_font_css', '"Inconsolata", sans-serif;' ) );
	$iriska_headings_font_weight = (int) get_theme_mod( 'iriska_headings_font_weight', 500 );
	$iriska_elements_font_weight = (int) get_theme_mod( 'iriska_elements_font_weight', 500 );

	// Main Colors
	$iriska_dynamic_css = "
		.iriska-page-pagination .iriska-page-pagination-item,#iriska-content .iriska-pagination-numbers .page-numbers.current,.iriska-pagination-numbers .page-numbers.current:hover,#wp-calendar #today,#iriska-content .mejs-controls .mejs-time-rail .mejs-time-current,.iriska-readmore-button,.iriska-post-preview-sticky,.iriska-fixed-button:hover,.iriska-single-post-links-nav .nav-links a,button,input[type='button'],input[type='reset'],input[type='submit'],.iriska-archive-meta-wrapper,.iriska-search-meta-wrapper,.widget_tag_cloud .tagcloud .tag-cloud-link,.iriska-latest-post .iriska-latest-post-no-thumbnail,.iriska-post-preview .iriska-post-preview-no-thumbnail,mark,ins,::selection{background-color:{$iriska_accent_color}}.iriska-close-button svg path{fill:{$iriska_accent_color}}.search-form .search-submit,form.post-password-form input[type='submit'],blockquote{border-color:{$iriska_accent_color}}.iriska-page-pagination .iriska-page-pagination-item,.iriska-pagination .page-numbers.current,#iriska-content .iriska-pagination-numbers .page-numbers.current:hover,#wp-calendar #today,.iriska-fixed-button:hover,.iriska-post-preview-sticky,#iriska-content .iriska-readmore-button,#iriska-content .iriska-readmore-button:active,#iriska-content .iriska-readmore-button:visited,.iriska-single-post-links-nav .nav-links a,.iriska-single-post-links-nav .nav-links a:active,.iriska-single-post-links-nav .nav-links a:visited,button,input[type='button'],input[type='reset'],input[type='submit'],.iriska-archive-meta-wrapper,.iriska-archive-meta-wrapper a,.widget_tag_cloud .tagcloud .tag-cloud-link,.iriska-search-meta-wrapper,mark,ins,::selection{color:{$iriska_contrast_color}}.iriska-fixed-button:hover svg path,.iriska-close-button:hover svg path{fill:{$iriska_contrast_color};stroke:{$iriska_contrast_color}}.iriska-readmore-button:hover,.iriska-single-post-links-nav .nav-links a:hover,.widget_tag_cloud .tagcloud .tag-cloud-link:hover,.iriska-page-pagination a .iriska-page-pagination-item:hover,.iriska-pagination-numbers .page-numbers:hover,.iriska-search-meta-wrapper .search-form .search-submit,button:hover,input[type='button']:hover,input[type='reset']:hover,input[type='submit']:hover{background-color:{$iriska_accent_background_hover}}.search-form .search-submit:hover,.iriska-search-meta-wrapper .search-form .search-submit{border-color:{$iriska_accent_background_hover}}#iriska-content .iriska-readmore-button:hover,.iriska-single-post-links-nav .nav-links a:hover,.widget_tag_cloud .tagcloud .tag-cloud-link:hover,.iriska-page-pagination a .iriska-page-pagination-item:hover,.iriska-pagination-numbers .page-numbers:hover,.iriska-search-meta-wrapper .search-form .search-submit,button:hover,body input[type='button']:hover,body input[type='reset']:hover,body input[type='submit']:hover{color:{$iriska_accent_color_hover}}";

	// Content Links Color
	$iriska_dynamic_css .= "
		a,a:visited,a:active{color:{$iriska_content_links_color}}a:hover{color:{$iriska_content_links_hover_color}}";

	// Pages, Posts, Archives Colors
	$iriska_dynamic_css .= "
		.iriska-wrapper-content-archive,.iriska-wrapper-content-single,.iriska-wrapper-content-page,.iriska-sidebar-wrapper,.iriska-page-pagination a .iriska-page-pagination-item,.iriska-comment-area-wrapper,.gallery-caption,.wp-caption .wp-caption-text,code,pre,kbd,body{background-color:{$iriska_content_space_background}}.iriska-page-pagination a .iriska-page-pagination-item,.iriska-comment-area-wrapper,.gallery-caption,.wp-caption .wp-caption-text,.iriska-comments-area .nav-links a,.comment-form a,code,pre,kbd,body{color:{$iriska_content_some_elements_color}}.iriska-single-latest-posts-wrapper,.iriska-single-about-author-wrapper,.iriska-sidebar .widget,.iriska-pagination-numbers .page-numbers,.iriska-single-post-content-wrapper,.iriska-single-post-widget-area,.iriska-post-preview,.iriska-fixed-button,.iriska-comments-area .comment-body,.iriska-page-content,.iriska-no-results-content,.galay-404-content-wrapper,.iriska-site-content input:not([type='button']):not([type='reset']):not([type='submit']),.iriska-site-content select,.iriska-site-content textarea{background-color:{$iriska_content_background}}.iriska-search-meta-wrapper .search-form .search-field{border-color:{$iriska_content_background}}.iriska-single-about-author-wrapper,.iriska-sidebar .widget,.iriska-pagination-numbers .page-numbers,.iriska-single-post-content-wrapper,.iriska-single-post-widget-area,.iriska-post-preview,.iriska-single-about-author-wrapper a,.iriska-sidebar .widget a,.iriska-pagination-numbers .page-numbers a,.iriska-single-post-widget-area a,.iriska-single-post-widget-area a:hover,.iriska-single-post-widget-area a:visited,.iriska-single-post-widget-area a:active,.iriska-post-preview-meta-info-wrapper a,.iriska-post-preview-meta-info-wrapper a:active,.iriska-post-preview-meta-info-wrapper a:visited,.iriska-post-preview-title a,.iriska-post-preview-title a:active,.iriska-post-preview-title a:visited,.iriska-single-post-meta-wrapper a,.iriska-single-post-meta-wrapper a:active,.iriska-single-post-meta-wrapper a:visited,.iriska-latest-post-title a,.iriska-latest-post-title a:hover,.iriska-latest-post-title a:visited,.iriska-latest-post-title a:active,#cancel-comment-reply-link,#cancel-comment-reply-link:hover,.iriska-fixed-button,.iriska-comments-area .comment-body,.iriska-comments-area .iriska-comment-list .comment-body .comment-meta a,.iriska-comments-area .iriska-comment-list .comment-body .reply a,.iriska-page-content,.iriska-no-results-content,.galay-404-content-wrapper,.iriska-site-content input:not([type='submit']),.iriska-site-content select,.iriska-site-content textarea{color:{$iriska_content_color}}.iriska-fixed-button svg path{fill:{$iriska_content_color};stroke:{$iriska_content_color}}.iriska-fixed-button,.widget_recent_comments ul li,.widget_archive ul li,.widget_recent_entries ul li,.widget_categories ul li,.widget_pages ul li,.widget_meta ul li,.widget_nav_menu ul li,input:not([type='submit']),textarea,select,fieldset,abbr,acronym,tr,tr:first-child,td,th{border-color:{$iriska_borders_color}}hr{background-color:{$iriska_borders_color}}";

	// Header Colors
	$iriska_dynamic_css .= "
		.iriska-site-header{background-color:{$iriska_header_background}}.iriska-site-menu .sub-menu{background-color:{$iriska_submenu_and_mobile_menu_background}}.iriska-site-header,.iriska-site-header a,.iriska-site-menu li a,.iriska-site-menu li a:visited,.iriska-site-menu li a:active,.iriska-site-header .iriska-back-button-menu:hover i{color:{$iriska_header_links_and_text_color}}.iriska-site-menu .iriska-open-sub-menu-button{background-color:{$iriska_header_links_and_text_color}}.iriska-open-menu-button-wrapper:hover svg path,.iriska-close-button-menu:hover svg path,.iriska-back-button-menu:hover svg path{fill:{$iriska_header_links_and_text_color};stroke:{$iriska_header_links_and_text_color}}.iriska-open-menu-button-wrapper svg path,.iriska-close-button-menu svg path,.iriska-back-button-menu svg path{fill:{$iriska_header_main_colors};stroke:{$iriska_header_main_colors}}.iriska-site-menu .sub-menu,.iriska-site-header .iriska-current-menu-item-text-wrapper{border-color:{$iriska_header_main_colors}}.iriska-site-header .iriska-current-menu-item-text{color:{$iriska_header_main_colors}}.iriska-site-menu .current-menu-item>a,.iriska-site-menu .current-menu-item>a:active,.iriska-site-menu .current-menu-item>a:visited{color:{$iriska_menu_current_link_color}}.iriska-site-menu .current-menu-item>.iriska-open-sub-menu-button-wrapper .iriska-open-sub-menu-button{background-color:{$iriska_menu_current_link_color}}#iriska-site-navigation .iriska-site-menu li:hover>a{color:{$iriska_menu_links_hover_color}}#iriska-site-navigation .iriska-site-menu li:hover>.iriska-open-sub-menu-button-wrapper .iriska-open-sub-menu-button{background-color:{$iriska_menu_links_hover_color}}.iriska-site-header{box-shadow:0 0 10px 0 {$iriska_header_shadow_color}}.iriska-main-navigation ul ul{box-shadow:0 2px 5px 0 {$iriska_header_shadow_color}}.iriska-site-title a,.iriska-site-description{color:#{$iriska_site_name_and_description_color}}";

	// Footer Colors
	$iriska_dynamic_css .= "
	 	.iriska-copyright-area{background-color:{$iriska_footer_copyright_area_background}}.iriska-copyright-area,.iriska-copyright-area a{color:{$iriska_footer_copyright_area_color}}.iriska-footer-widget-areas-wrapper,.iriska-footer-widget-areas-wrapper input:not([type='submit']),.iriska-footer-widget-areas-wrapper select,.iriska-footer-widget-areas-wrapper textarea{background-color:{$iriska_footer_widgets_area_background}}.iriska-footer-widget-areas-wrapper,.iriska-footer-widget-areas-wrapper a,.iriska-footer-widget-areas-wrapper a:hover,.iriska-footer-widget-areas-wrapper a:visited,.iriska-footer-widget-areas-wrapper a:active,.iriska-footer-widget-areas-wrapper .iriska-latest-post-title a,.iriska-footer-widget-areas-wrapper input:not([type='submit']),.iriska-footer-widget-areas-wrapper select,.iriska-footer-widget-areas-wrapper textarea{color:{$iriska_footer_widgets_area_color}}.iriska-footer-widget-areas-wrapper,.iriska-footer-widget-areas-wrapper .widget_recent_comments ul li,.iriska-footer-widget-areas-wrapper .widget_archive ul li,.iriska-footer-widget-areas-wrapper .widget_recent_entries ul li,.iriska-footer-widget-areas-wrapper .widget_categories ul li,.iriska-footer-widget-areas-wrapper .widget_pages ul li,.iriska-footer-widget-areas-wrapper .widget_meta ul li,.iriska-footer-widget-areas-wrapper .widget_nav_menu ul li,.iriska-footer-widget-areas-wrapper input:not([type='submit']),.iriska-footer-widget-areas-wrapper textarea,.iriska-footer-widget-areas-wrapper select,.iriska-footer-widget-areas-wrapper fieldset,.iriska-footer-widget-areas-wrapper abbr,.iriska-footer-widget-areas-wrapper acronym,.iriska-footer-widget-areas-wrapper tr,.iriska-footer-widget-areas-wrapper tr:first-child,.iriska-footer-widget-areas-wrapper td,.iriska-footer-widget-areas-wrapper th{border-color:{$iriska_footer_widgets_area_border_color}}.iriska-footer-widget-areas-wrapper hr{background-color:{$iriska_footer_widgets_area_border_color}}";

	// Overlay Color
	$iriska_dynamic_css .= "
		.iriska-overlay{background-color:{$iriska_overlay_background}}";

	// Single Post Layout
	$iriska_dynamic_css .= "
		.iriska-single-post-widget-area .widget{width:{$iriska_single_post_widget_area_widgets_width}%}";
		
	// Footer Layout
	$iriska_dynamic_css .= "
		.iriska-footer-widget-area-1{width:{$iriska_width_footer_widgets_area_1_large_screens}%}.iriska-footer-widget-area-2{width:{$iriska_width_footer_widgets_area_2_large_screens}%}.iriska-footer-widget-area-3{width:{$iriska_width_footer_widgets_area_3_large_screens}%}.iriska-footer-widget-area-4{width:{$iriska_width_footer_widgets_area_4_large_screens}%}@media (min-width:768px) and (max-width:992px){.iriska-footer-widget-area-1{width:{$iriska_width_footer_widgets_area_1_medium_screens}%}.iriska-footer-widget-area-2{width:{$iriska_width_footer_widgets_area_2_medium_screens}%}.iriska-footer-widget-area-3{width:{$iriska_width_footer_widgets_area_3_medium_screens}%}.iriska-footer-widget-area-4{width:{$iriska_width_footer_widgets_area_4_medium_screens}%}}@media (max-width:768px){.iriska-footer-widget-area-1{width:{$iriska_width_footer_widgets_area_1_small_screens}%}.iriska-footer-widget-area-2{width:{$iriska_width_footer_widgets_area_2_small_screens}%}.iriska-footer-widget-area-3{width:{$iriska_width_footer_widgets_area_3_small_screens}%}.iriska-footer-widget-area-4{width:{$iriska_width_footer_widgets_area_4_small_screens}%}}";
		
	// Header Layout
	$iriska_dynamic_css .= "
		.iriska-site-header{min-height:{$iriska_header_height_large}px}.iriska-site-have-sticky-header{margin-top:{$iriska_header_height_large}px}.iriska-site-branding img{width:{$iriska_header_logo_width_large}%}.iriska-sticky-header.iriska-small-fixed-header{min-height:{$iriska_sticky_header_height_large}px}.iriska-sticky-header.iriska-small-fixed-header .iriska-site-branding img{width:{$iriska_sticky_header_logo_width_large}%}@media (min-width:768px) and (max-width:992px){.iriska-site-header{min-height:{$iriska_header_height_medium}px}.iriska-site-have-sticky-header{margin-top:{$iriska_header_height_medium}px}.iriska-site-branding img{width:{$iriska_header_logo_width_medium}%}.iriska-sticky-header.iriska-small-fixed-header{min-height:{$iriska_sticky_header_height_medium}px}.iriska-sticky-header.iriska-small-fixed-header .iriska-site-branding img{width:{$iriska_sticky_header_logo_width_medium}%}}@media (max-width:768px){.iriska-site-header{min-height:{$iriska_header_height_small}px}.iriska-site-have-sticky-header{margin-top:{$iriska_header_height_small}px}.iriska-site-branding img{width:{$iriska_header_logo_width_small}%}.iriska-sticky-header.iriska-small-fixed-header{min-height:{$iriska_sticky_header_height_small}px}.iriska-sticky-header.iriska-small-fixed-header .iriska-site-branding img{width:{$iriska_sticky_header_logo_width_small}%}}";

	if ( $iriska_mobile_menu ) {
		$iriska_dynamic_css .= "@media (max-width: {$iriska_mobile_menu}px) {";
	} else {
		$iriska_dynamic_css .= "@media (min-width: 0) {";
	}
			
		$iriska_dynamic_css .= "
			.iriska-main-navigation-wrapper{position:fixed;width:100%;height:100vh;z-index:999999;left:0;top:0;text-align:center;overflow-y:auto;opacity:0;transition:0.3s;transform:translateY(-100%);background-color:{$iriska_submenu_and_mobile_menu_background}}.iriska-main-navigation-wrapper .iriska-main-navigation{display:flex;align-items:center;justify-content:center;min-height:100vh;width:100%;padding:210px 100px 100px 100px}.iriska-main-navigation-visible{opacity:1;transition:0.5s;transform:translateY(0)}.iriska-main-navigation-wrapper .iriska-close-button-wrapper{position:absolute;top:100px;right:100px}#iriska-site-navigation .iriska-site-menu>li{font-size:25px;display:block;padding:20px 0}#iriska-site-navigation .iriska-site-menu .iriska-active-menu-item{padding:0}.iriska-site-menu .menu-item-has-children{margin:0}#iriska-masthead .iriska-site-menu .menu-item-has-children>.iriska-open-sub-menu-button-wrapper{width:50px;position:relative;display:inline-block;top:0;left:0;z-index:9;opacity:1;text-align:center}.iriska-site-menu .menu-item-has-children>.iriska-open-sub-menu-button-wrapper:hover{cursor:pointer}#iriska-masthead .iriska-site-menu .iriska-open-sub-menu-button{height:12px}#iriska-masthead .iriska-site-menu .menu-item-has-children .iriska-open-sub-menu-button-element-1{right:4px;top:0}#iriska-masthead .iriska-site-menu .menu-item-has-children .iriska-open-sub-menu-button-element-2{right:-3px;top:0}.iriska-site-menu .menu-all-pages-container{width:100%}.iriska-site-menu .sub-menu.iriska-sub-menu-open{display:block;position:relative;top:0;left:0}.iriska-site-menu,.iriska-site-menu ul{list-style:none;margin:0;padding-left:0;position:relative}.iriska-site-menu .menu-item{transition:0.5s}.iriska-site-menu .iriska-hide-menu-item{transform:translateY(-100vh);opacity:0;padding:0!important;height:0;overflow:hidden}.iriska-site-menu .sub-menu{transition:0.5s;transform:translateY(100vh)!important;height:0;opacity:0;left:0!important;overflow-y:hidden;padding:0;box-shadow:none;width:auto;float:none;text-align:center}.iriska-main-navigation .iriska-site-menu .iriska-menu-animation{opacity:0}.iriska-site-menu .iriska-active-menu-item .iriska-menu-animation{opacity:1;transform:none!important;height:auto}#iriska-masthead .iriska-site-menu .menu-item a{display:inline-block}#iriska-site-navigation .iriska-site-menu a.iriska-menu-item-additional-style,#iriska-site-navigation .iriska-site-menu .iriska-open-sub-menu-button-wrapper.iriska-menu-item-additional-style.iriska-hide-menu-item{position:absolute}.iriska-current-menu-item-text-wrapper{border-bottom:1px solid;padding-bottom:10px;margin-bottom:10px;text-transform:uppercase}.iriska-visible-menu-controls{display:block}.iriska-main-navigation .iriska-site-menu .sub-menu li{padding:10px 0;font-size:20px}#iriska-masthead .iriska-site-menu .sub-menu{border-top:none;background-color:transparent}.iriska-site-menu li{margin-right:0}}";
			
	if ( $iriska_mobile_menu_for_all_screens == 0 ) {
		$iriska_dynamic_css .= "
			@media (min-width:{$iriska_mobile_menu_hidden}px){.iriska-open-menu-button-wrapper,.iriska-main-navigation-wrapper .iriska-close-button-wrapper{display:none}.iriska-main-navigation .iriska-site-menu .menu-item-has-children:hover>.sub-menu{display:block}.iriska-main-navigation .iriska-site-menu .sub-menu{width:250px;display:none}}";
	}

	// Content Layout
	$iriska_dynamic_css .= "
		.iriska-container{max-width:{$iriska_content_width}{$iriska_content_width_value}}";

	// Typography Settings
	$iriska_dynamic_css .= "
		h1,h2,h3,h4,h5,h6{font-weight:{$iriska_headings_font_weight};font-family:{$iriska_headings_font_css}}body{font-weight:{$iriska_content_font_weight};font-family:{$iriska_content_font_css}}strong,b,dt,kbd,th,optgroup,.iriska-site-menu li,.iriska-comments-area .iriska-comment-list .comment-meta a,.iriska-comments-area .comment-reply-link,.iriska-comments-area .comment-reply-login,.iriska-comments-area .iriska-no-comments,.iriska-single-about-author-name,.widget_recent_comments .comment-author-link,.widget_recent_entries .post-date,#wp-calendar tfoot a,#wp-calendar #today,.iriska-post-cat-list span,.iriska-post-tag-list span{font-weight:{$iriska_elements_font_weight}}";

	wp_add_inline_style( 'iriska-style', $iriska_dynamic_css );
}
add_action( 'wp_enqueue_scripts', 'iriska_dynamic_style_min_css' );