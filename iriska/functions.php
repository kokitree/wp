<?php

//---------------------------------------------------------------------
/**
 * Iriska functions and definitions
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package Iriska
 *-------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------
 * Sets up theme defaults and registers support for various WordPress features.
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails
 *---------------------------------------------------------------------------*/
function iriska_setup() {
	//Make theme available for translation
	load_theme_textdomain( 'iriska', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages
	// @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	add_theme_support( 'post-thumbnails' );
	// To image on the background looked clear
	add_image_size( 'iriska-archive-thumbnail-background', 700, 600 );
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'iriska-menu' => esc_html__( 'Primary', 'iriska' ),
	));

	// Switch default core markup for search form, comment form, and comments to output valid HTML5
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	));

	// Add theme support for selective refresh for widgets
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add support for core custom logo
	// @link https://codex.wordpress.org/Theme_Logo
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	));

	add_theme_support( 'custom-header' );
}
add_action( 'after_setup_theme', 'iriska_setup' );

//----------------------------------------------------------------------------
/**
 * Set the content width in pixels, based on the theme's design and stylesheet
 * Priority 0 to make it available to lower priority callbacks
 * @global int $content_width
 *--------------------------------------------------------------------------*/
function iriska_content_width() {
	// This variable is intended to be overruled from themes
	// Open WPCS issue: @link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	if ( !isset( $content_width ) ) {
		$iriska_content_width = (int) get_theme_mod( 'iriska_content_width', 1170 );
		$content_width = apply_filters( 'iriska_content_width', $iriska_content_width );
	}
}
add_action( 'after_setup_theme', 'iriska_content_width', 0 );

//--------------------------------------------------------------
/**
 * Adds custom classes to the array of body classes
 * @param array $classes Classes for the body element
 * @return array
 *------------------------------------------------------------*/
function iriska_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( !is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Add class "iriska-site-fixed-header" if sticky header is enabled
	$iriska_sticky_header = (int) get_theme_mod( 'iriska_sticky_header', 1 );
	if ( $iriska_sticky_header ) {
		$classes[] = 'iriska-site-fixed-header';
	}

	// Add class "iriska-smooth-scroll" if smooth scroll is enabled
	$iriska_smooth_scroll = (int) get_theme_mod( 'iriska_smooth_scroll', 1 );
	if ( $iriska_smooth_scroll ) {
		$classes[] = 'iriska-smooth-scroll';
	}

	return $classes;
}
add_filter( 'body_class', 'iriska_body_classes' );

/*---------------------------------------------------------------------------------
 * Add a pingback url auto-discovery header for single posts, pages, or attachments
 *-------------------------------------------------------------------------------*/
function iriska_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'iriska_pingback_header' );

//-------------------------------------------------------------------------------------------
/**
 * Register widget area.
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *-----------------------------------------------------------------------------------------*/
function iriska_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar for archives', 'iriska' ),
		'id'            => 'iriska-archives-sidebar',
		'description'   => esc_html__( 'For the sidebar to be displayed, the corresponding setting must be enabled.', 'iriska' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="iriska-widget-title widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar for posts', 'iriska' ),
		'id'            => 'iriska-single-post-sidebar',
		'description'   => esc_html__( 'For the sidebar to be displayed, the corresponding setting must be enabled.', 'iriska' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="iriska-widget-title widget-title">',
		'after_title'   => '</h4>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Widget area for post (after content)', 'iriska' ),
		'id'            => 'iriska-single-post-widgets',
		'description'   => esc_html__( 'For the widget area to be displayed, the corresponding setting must be enabled.', 'iriska' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="iriska-widget-title widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar for pages', 'iriska' ),
		'id'            => 'iriska-single-page-sidebar',
		'description'   => esc_html__( 'For the sidebar to be displayed, the corresponding setting must be enabled.', 'iriska' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="iriska-widget-title widget-title">',
		'after_title'   => '</h4>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar for 404 page', 'iriska' ),
		'id'            => 'iriska-404-page-sidebar',
		'description'   => esc_html__( 'For the sidebar to be displayed, the corresponding setting must be enabled.', 'iriska' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="iriska-widget-title widget-title">',
		'after_title'   => '</h4>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar for search page', 'iriska' ),
		'id'            => 'iriska-search-page-sidebar',
		'description'   => esc_html__( 'For the sidebar to be displayed, the corresponding setting must be enabled.', 'iriska' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="iriska-widget-title widget-title">',
		'after_title'   => '</h4>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Footer widget area 1', 'iriska' ),
		'id'            => 'iriska-footer-widget-area-1',
		'description'   => esc_html__( 'You can set the width of the area in the appropriate settings.', 'iriska' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="iriska-widget-title widget-title">',
		'after_title'   => '</h4>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Footer widget area 2', 'iriska' ),
		'id'            => 'iriska-footer-widget-area-2',
		'description'   => esc_html__( 'You can set the width of the area in the appropriate settings.', 'iriska' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="iriska-widget-title widget-title">',
		'after_title'   => '</h4>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Footer widget area 3', 'iriska' ),
		'id'            => 'iriska-footer-widget-area-3',
		'description'   => esc_html__( 'You can set the width of the area in the appropriate settings.', 'iriska' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="iriska-widget-title widget-title">',
		'after_title'   => '</h4>',
	));

	register_sidebar( array(
		'name'          => esc_html__( 'Footer widget area 4', 'iriska' ),
		'id'            => 'iriska-footer-widget-area-4',
		'description'   => esc_html__( 'You can set the width of the area in the appropriate settings.', 'iriska' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="iriska-widget-title widget-title">',
		'after_title'   => '</h4>',
	));
}
add_action( 'widgets_init', 'iriska_widgets_init' );

/*--------------------------------------------------------------
 * Enqueue scripts and styles
 *------------------------------------------------------------*/
function iriska_scripts() {
	wp_enqueue_style( 'iriska-style', get_template_directory_uri() . '/assets/minified/css/iriska.min.css' );
	wp_enqueue_script( 'iriska-script', get_template_directory_uri() . '/assets/minified/js/iriska.min.js', array( 'jquery' ), '1.0.0', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Fonts
	wp_enqueue_style( 'content-font', esc_url( get_theme_mod( 'iriska_content_font', 'https://fonts.googleapis.com/css?family=Montserrat:400,500' ) ) );
	wp_enqueue_style( 'headings-font', esc_url( get_theme_mod( 'iriska_headings_font', 'https://fonts.googleapis.com/css?family=Inconsolata' ) ) );
}
add_action( 'wp_enqueue_scripts', 'iriska_scripts' );

/*--------------------------------------------------------------
 * Customizer settings
 *------------------------------------------------------------*/
require get_template_directory() . '/inc/customizer/customizer.php';

/*--------------------------------------------------------------
 * Dynamic min css
 *------------------------------------------------------------*/
require get_template_directory() . '/inc/dynamic-min-css.php';

/*--------------------------------------------------------------
 * SVG icons
 *------------------------------------------------------------*/
require get_template_directory() . '/inc/iriska-icons.php';

/*--------------------------------------------------------------
 * Theme page
 *------------------------------------------------------------*/
require get_template_directory() . '/inc/admin/theme-page.php';

/*--------------------------------------------------------------
 * Limit excerpt to a number of words
 *------------------------------------------------------------*/
if ( !function_exists( 'iriska_excerpt_length' ) ) {
	function iriska_excerpt_length($length) {
	  return (int) get_theme_mod( 'iriska_archives_post_preview_content_length', 25 );
	}
}
add_filter('excerpt_length', 'iriska_excerpt_length');

/*--------------------------------------------------------------
* Change end of the excerpt
*-------------------------------------------------------------*/
if ( !function_exists( 'iriska_end_excerpt' ) ) {
	function iriska_end_excerpt($more_string) {
		$iriska_end_excerpt_text = '...';
	  return apply_filters( 'iriska_end_excerpt_filter', $iriska_end_excerpt_text );
	}
}
add_filter('excerpt_more', 'iriska_end_excerpt');

/*--------------------------------------------------------------
 * Change comments form
 *------------------------------------------------------------*/
if ( !function_exists( 'iriska_comment_fields' ) ) {
	function iriska_comment_fields( $fields ){
		$new_fields = array();
		$new_order = array( 'author', 'email', 'url', 'comment' );
		foreach( $new_order as $key ) {
			$new_fields[ $key ] = $fields[ $key ];
			unset( $fields[ $key ] );
		}
		if ( $fields ) {
			foreach( $fields as $key => $val ) {
				$new_fields[ $key ] = $val;
			}
		}
		return $new_fields;
	}
}
add_filter('comment_form_fields', 'iriska_comment_fields' );

/*-------------------------------------------------------------------------
 * Prints HTML with meta information for the post preview
 *-----------------------------------------------------------------------*/
if ( !function_exists( 'iriska_archives_posts_meta' ) ) {
	function iriska_archives_posts_meta() {
		$iriska_archives_posts_show_post_date = (int) get_theme_mod( 'iriska_archives_posts_show_post_date', 1 );
		$iriska_archives_posts_show_author = (int) get_theme_mod( 'iriska_archives_posts_show_author', 1 );
		$iriska_archives_posts_show_comments = (int) get_theme_mod( 'iriska_archives_posts_show_comments', 1 );
		$iriska_archives_posts_show_categories = (int) get_theme_mod( 'iriska_archives_posts_show_categories', 1 );
		$iriska_archives_posts_show_tags = (int) get_theme_mod( 'iriska_archives_posts_show_tags', 1 );

		$time_string = '<time class="iriska-entry-date iriska-date-published iriska-date-updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="iriska-entry-date iriska-date-published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = '<span class="iriska-meta-item iriska-postdate">' . $time_string . '</span>';

		$byline = '<span class="iriska-meta-item iriska-author iriska-vcard"><a class="iriska-link-to-author-posts" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';
		?>
		<div class="iriska-post-meta">
			<?php
				if ( $iriska_archives_posts_show_post_date ) {
					echo $posted_on;
				}

				if ( $iriska_archives_posts_show_author ) {
					echo $byline;
				}

				if ( !post_password_required() && comments_open() && get_comments_number() && $iriska_archives_posts_show_comments ) {
					// translators: %1$d: comment count
					echo '<span class="iriska-meta-item iriska-comment-count"><span>' . sprintf( esc_html__( 'Comments (%1$d)', 'iriska' ), get_comments_number() ) . '</span></span>';
				}
			?>
		</div>
		<?php
		if ( get_post_type() === 'post' ) {
			$categories_list = get_the_category_list( ', ' );
			if ( $categories_list && $iriska_archives_posts_show_categories ) {
				echo '<div class="iriska-post-cat-list"><span>' . esc_html__( 'Categories:', 'iriska' ) . '</span>' . $categories_list . '</div>';
			}

			$tags_list = get_the_tag_list( '', ', ' );
			if ( $tags_list && $iriska_archives_posts_show_tags ) {
				echo '<div class="iriska-post-tag-list"><span>' . esc_html__( 'Tags:', 'iriska' ) . '</span>' . $tags_list . '</div>';
			}
		}
	}
}

/*-------------------------------------------------------------------------
 * Prints HTML with meta information for the single post
 *-----------------------------------------------------------------------*/
if ( !function_exists( 'iriska_single_post_meta' ) ) {
	function iriska_single_post_meta() {
		$iriska_single_post_show_post_date = (int) get_theme_mod( 'iriska_single_post_show_post_date', 1 );
		$iriska_single_post_show_author = (int) get_theme_mod( 'iriska_single_post_show_author', 1 );
		$iriska_single_post_show_comments = (int) get_theme_mod( 'iriska_single_post_show_comments', 1 );
		$iriska_single_post_show_categories = (int) get_theme_mod( 'iriska_single_post_show_categories', 1 );
		$iriska_single_post_show_tags = (int) get_theme_mod( 'iriska_single_post_show_tags', 1 );

		$time_string = '<time class="iriska-entry-date iriska-date-published iriska-date-updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="iriska-entry-date iriska-date-published" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = '<span class="iriska-meta-item iriska-postdate">' . $time_string . '</span>';

		$byline = '<span class="iriska-meta-item iriska-author iriska-vcard"><a class="iriska-link-to-author-posts" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';
		?>
		<div class="iriska-post-meta iriska-post-meta-info">
			<?php
				if ( $iriska_single_post_show_post_date ) {
					echo $posted_on;
				}

				if ( $iriska_single_post_show_author ) {
					echo $byline;
				}

				if ( !post_password_required() && comments_open() && get_comments_number() && $iriska_single_post_show_comments ) {
					// translators: %1$d: comment count
					echo '<span class="iriska-meta-item iriska-comment-count"><span>' . sprintf( esc_html__( 'Comments (%1$d)', 'iriska' ), get_comments_number() ) . '</span></span>';
				}
			?>
		</div>
		<?php
		if ( get_post_type() === 'post' ) {
			$categories_list = get_the_category_list( ', ' );
			if ( $categories_list && $iriska_single_post_show_categories ) {
				echo '<div class="iriska-post-meta iriska-post-taxonomy-meta iriska-post-cat-list"><span>' . esc_html__( 'Categories:', 'iriska' ) . '</span>' . $categories_list . '</div>';
			}

			$tags_list = get_the_tag_list( '', ', ' );
			if ( $tags_list && $iriska_single_post_show_tags ) {
				echo '<div class="iriska-post-meta iriska-post-taxonomy-meta iriska-post-tag-list"><span>' . esc_html__( 'Tags:', 'iriska' ) . '</span>' . $tags_list . '</div>';
			}
		}
	}
}

/*--------------------------------------------------------------
 * Latest Posts Widget
 *------------------------------------------------------------*/
// Iriska | Latest posts
if ( !function_exists( 'iriska_latest_posts_widget_init' ) ) {
	function iriska_latest_posts_widget_init() {
	  register_widget( 'iriska_latest_posts_widget' );
	}
}
add_action( 'widgets_init', 'iriska_latest_posts_widget_init' );
// Iriska | Latest posts
if ( !class_exists( 'iriska_latest_posts_widget' ) ) {
	class iriska_latest_posts_widget extends WP_Widget {
		function __construct() {
			parent::__construct( 'iriska_latest_posts', esc_html__( 'Iriska | Latest posts', 'iriska' ) );
		}
		
		// Html of the widget
		public function widget( $args, $instance ) {
			global $post;
			$title = isset( $instance['title'] ) ? esc_html( apply_filters( 'widget_title', $instance['title'] ) ) : '';
			$numberposts = isset( $instance['numberposts'] ) ? absint( $instance['numberposts'] ) : 6;
			$title_length = isset( $instance['title_length'] ) ? absint( $instance['title_length'] ) : 30;
			$show_thumbnails = isset( $instance['show_thumbnails'] ) ? (bool) $instance['show_thumbnails'] : true;
			$show_post_date = isset( $instance['show_post_date'] ) ? (bool) $instance['show_post_date'] : true;
			$categories = isset( $instance['categories'] ) ? esc_attr( $instance['categories'] ) : '';
			$tags = isset( $instance['tags'] ) ? esc_attr( $instance['tags'] ) : '';
			$include = isset( $instance['include'] ) ? esc_attr( $instance['include'] ) : '';
			$exclude = isset( $instance['exclude'] ) ? esc_attr( $instance['exclude'] ) : '';

			// Output
			$output = $args['before_widget'];
				// The title of the widget
				if ( !empty( $instance['title'] ) ) {
		  		$output .= $args['before_title'] . $title . $args['after_title'];
		  	}

	  		// Exclude the currently viewed post from the widget
	  		$default_exclude = '';
	  		if ( is_single() ) {
	  			$post_type = get_post_type( $post->ID );
	  			$default_exclude = ( $post_type == 'post' ) ? $post->ID : '';
	  		}

	  		// Get posts
				$latest_posts = get_posts(
			  	array(
		      	'post_type' => 'post',
		      	'order' => 'desc',
		      	'numberposts' => $numberposts,
		      	'include' => $include,
		      	'exclude' => $default_exclude . ',' . $exclude,
		      	'category_name' => $categories,
		      	'tag' => $tags
		    	)
		    );

				if ( $latest_posts ) {
					$output .= '<div class="iriska-latest-posts">';
				    foreach( $latest_posts as $latest_post ) {
				    	// Set the length of the title and remove html tags from the title,
				    	// since they do not close after setting the length of the title.
				    	$latest_post_title = strip_tags( $latest_post->post_title );
							$latest_post_title = mb_substr( $latest_post_title, 0, $title_length );
							if ( mb_strlen( $latest_post_title ) >= $title_length ) {
								$latest_post_title .= '...';
							}

							// Post thumbnail
				    	$latest_post_thumbnail = '<div class="iriska-latest-post-thumbnail"><a style="background-image: url(' . esc_url( get_the_post_thumbnail_url( $latest_post->ID, 'thumbnail' ) ) . ');" href="' . esc_url( get_permalink( $latest_post->ID ) ) . '"></a></div>';
							if ( !has_post_thumbnail( $latest_post->ID ) && $show_thumbnails ) {
								$latest_post_thumbnail = '<div class="iriska-latest-post-thumbnail iriska-latest-post-no-thumbnail"><a href="' . esc_url( get_permalink( $latest_post->ID ) ) . '"></a></div>';
							}

							$posted_on = '';
							if ( $show_post_date ) {
								$time_string = '<time class="iriska-lstest-posts-entry-date" datetime="%1$s">%2$s</time>';

								$time_string = sprintf( $time_string,
									esc_attr( get_the_date( DATE_W3C, $latest_post->ID ) ),
									esc_html( get_the_date( get_option( 'date_format' ), $latest_post->ID ) )
								);

								$posted_on = '<span class="iriska-latest-posts-postdate">' . $time_string . '</span>';
							}

				    	$output .= '<div class="iriska-latest-post clearfix">';
					    	$output .= $latest_post_thumbnail;
					    	$output .= '<div class="iriska-latest-post-content">';
						    	$output .= '<h4 class="iriska-latest-post-title"><a href="' . esc_url( get_permalink( $latest_post->ID ) ) . '">' . esc_html( $latest_post_title ) . '</a></h4>';
						    	$output .= $posted_on;
						    $output .= '</div>';
				    	$output .= '</div>';
				    }
				  $output .= '</div>';
				}
			$output .= $args['after_widget'];
			echo $output;
		}
		
		// Settings of the widget
		public function form( $instance ) { 
			$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
			$numberposts = isset( $instance['numberposts'] ) ? absint( $instance['numberposts'] ) : 6;
			$title_length = isset( $instance['title_length'] ) ? absint( $instance['title_length'] ) : 30;
			$show_thumbnails = isset( $instance['show_thumbnails'] ) ? (bool) $instance['show_thumbnails'] : true;
			$show_post_date = isset( $instance['show_post_date'] ) ? (bool) $instance['show_post_date'] : true;
			$categories = isset( $instance['categories'] ) ? esc_attr( $instance['categories'] ) : '';
			$tags = isset( $instance['tags'] ) ? esc_attr( $instance['tags'] ) : '';
			$include = isset( $instance['include'] ) ? esc_attr( $instance['include'] ) : '';
			$exclude = isset( $instance['exclude'] ) ? esc_attr( $instance['exclude'] ) : '';
			?>
			<p>
	      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'iriska' ); ?></label>
	      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>">
	   	</p>
	   	<p>
	      <label for="<?php echo $this->get_field_id( 'numberposts' ); ?>"><?php esc_html_e( 'Number of posts:', 'iriska' ); ?></label>
	      <input class="widefat" id="<?php echo $this->get_field_id( 'numberposts' ); ?>" name="<?php echo $this->get_field_name( 'numberposts' ); ?>" type="number" step="1" min="1" value="<?php echo $numberposts; ?>">
	   	</p>
	   	<p>
	      <label for="<?php echo $this->get_field_id( 'title_length' ); ?>"><?php esc_html_e( 'Titles length:', 'iriska' ); ?></label>
	      <input class="widefat" id="<?php echo $this->get_field_id( 'title_length' ); ?>" name="<?php echo $this->get_field_name( 'title_length' ); ?>" type="number" step="1" min="1" value="<?php echo $title_length; ?>">
	   	</p>
	   	<p>
	   		<input  class="checkbox" id="<?php echo $this->get_field_id('show_thumbnails'); ?>" name="<?php echo $this->get_field_name('show_thumbnails'); ?>" type="checkbox" <?php checked( $show_thumbnails ); ?> />
				<label for="<?php echo $this->get_field_id('show_thumbnails'); ?>"><?php esc_html_e( 'Display thumbnails in posts without thumbnails', 'iriska' ); ?></label>
				<p class="iriska-widget-description"><?php echo esc_html__( 'Accent color is displayed.', 'iriska' ); ?></p> 
			</p>
			<p>
	   		<input  class="checkbox" id="<?php echo $this->get_field_id('show_post_date'); ?>" name="<?php echo $this->get_field_name('show_post_date'); ?>" type="checkbox" <?php checked( $show_post_date ); ?> />
				<label for="<?php echo $this->get_field_id('show_post_date'); ?>"><?php esc_html_e( 'Display publication date', 'iriska' ); ?></label>
			</p>
			<p>
	      <label for="<?php echo $this->get_field_id( 'categories' ); ?>"><?php esc_html_e( 'From categories:', 'iriska' ); ?></label>
	      <input class="widefat" id="<?php echo $this->get_field_id( 'categories' ); ?>" name="<?php echo $this->get_field_name( 'categories' ); ?>" type="text" value="<?php echo $categories; ?>">
	   	</p>
	   	<p>
	      <label for="<?php echo $this->get_field_id( 'tags' ); ?>"><?php esc_html_e( 'From tags:', 'iriska' ); ?></label>
	      <input class="widefat" id="<?php echo $this->get_field_id( 'tags' ); ?>" name="<?php echo $this->get_field_name( 'tags' ); ?>" type="text" value="<?php echo $tags; ?>">
	   	</p>
	   	<p>
	      <label for="<?php echo $this->get_field_id( 'include' ); ?>"><?php esc_html_e( 'Include:', 'iriska' ); ?></label>
	      <input class="widefat" id="<?php echo $this->get_field_id( 'include' ); ?>" name="<?php echo $this->get_field_name( 'include' ); ?>" type="text" value="<?php echo $include; ?>">
	   	</p>
	   	<p>
	      <label for="<?php echo $this->get_field_id( 'exclude' ); ?>"><?php esc_html_e( 'Exclude:', 'iriska' ); ?></label>
	      <input class="widefat" id="<?php echo $this->get_field_id( 'exclude' ); ?>" name="<?php echo $this->get_field_name( 'exclude' ); ?>" type="text" value="<?php echo $exclude; ?>">
	   	</p>
	   	<?php
		}
		
		// Save settings
		public function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = sanitize_text_field( $new_instance['title'] );
			$instance['numberposts'] = (int) $new_instance['numberposts'];
			$instance['title_length'] = (int) $new_instance['title_length'];
			$instance['show_thumbnails'] = isset( $new_instance['show_thumbnails'] ) ? (bool) $new_instance['show_thumbnails'] : false;
			$instance['show_post_date'] = isset( $new_instance['show_post_date'] ) ? (bool) $new_instance['show_post_date'] : false;
			$instance['categories'] = sanitize_text_field( $new_instance['categories'] );
			$instance['tags'] = sanitize_text_field( $new_instance['tags'] );
			$instance['include'] = sanitize_text_field( $new_instance['include'] );
			$instance['exclude'] = sanitize_text_field( $new_instance['exclude'] );
			return $instance;
		}
	}
}

/*--------------------------------------------------------------
 * Sidebar Button
 *------------------------------------------------------------*/
if ( !function_exists( 'iriska_sidebar_button' ) ) {
	function iriska_sidebar_button() {
		// Settings
		$iriska_single_post_show_sidebar = (int) get_theme_mod( 'iriska_single_post_show_sidebar', 1 );
		$iriska_archives_show_sidebar = (int) get_theme_mod( 'iriska_archives_show_sidebar', 1 );
		$iriska_404_page_show_sidebar = (int) get_theme_mod( 'iriska_404_page_show_sidebar', 1 );
		$iriska_single_page_show_sidebar = (int) get_theme_mod( 'iriska_single_page_show_sidebar', 1 );

		// Button
		$iriska_sidebar_button_text = esc_html__( 'Sidebar', 'iriska' );
		$iriska_sidebar_button = '<span class="iriska-fixed-button iriska-sidebar-open-button">' . iriska_sidebar_icon_svg() . '<span class="iriska-fixed-button-text">'
			// Use this filter to change the text of the "Sidebar" button.
			// The value that is passed $iriska_sidebar_button_text
			. apply_filters( 'iriska_sidebar_button_text_filter', $iriska_sidebar_button_text ) . 
			'</span></span>';


		if ( is_single() && $iriska_single_post_show_sidebar && is_active_sidebar( 'iriska-single-post-sidebar' ) ) {
			echo $iriska_sidebar_button;
		}

		if ( ( is_archive() || is_home() ) && $iriska_archives_show_sidebar && is_active_sidebar( 'iriska-archives-sidebar' ) ) {
			echo $iriska_sidebar_button;
		}

		if ( is_404() && $iriska_404_page_show_sidebar && is_active_sidebar( 'iriska-404-page-sidebar' ) ) {
			echo $iriska_sidebar_button;
		}

		if ( is_page() && $iriska_single_page_show_sidebar && is_active_sidebar( 'iriska-single-page-sidebar' ) ) {
			echo $iriska_sidebar_button;
		}

		if ( is_search() && $iriska_archives_show_sidebar && is_active_sidebar( 'iriska-search-page-sidebar' ) ) {
			echo $iriska_sidebar_button;
		}
	}
}

/*--------------------------------------------------------------
 * Comments Button
 *------------------------------------------------------------*/
if ( !function_exists( 'iriska_comments_button' ) ) {
	function iriska_comments_button() {
		// Button
		// translators: %1$d: comment count
		$iriska_comments_button_text = sprintf( esc_html__( 'Comments (%1$d)', 'iriska' ), get_comments_number() );
		$iriska_comments_button = '<span class="iriska-fixed-button iriska-comment-open-button">' . iriska_comments_icon_svg() . '<span class="iriska-fixed-button-text">'
			// Use this filter to change the text of the "Comments (%1$d)" button.
			// When calling the filter use the function get_comments_number() to get the number of comments
			// The value that is passed $iriska_comments_button_text
			.	apply_filters( 'iriska_comments_button_text_filter', $iriska_comments_button_text ) . 
			'</span></span>';

		if ( ( comments_open() || get_comments_number() ) && !post_password_required() ) {
			echo $iriska_comments_button;
		}
	}
}

/*--------------------------------------------------------------
 * Menu Placeholder
 *------------------------------------------------------------*/
// Display a hint if the menu is not set in the primary area
// This is done in order not to create new styles and a script for the menu,
// since there are no classes in it that are in the set menu.
// Function call in file "header-logo-left.php"
if ( !function_exists( 'iriska_menu_placeholder' ) ) {
	function iriska_menu_placeholder() {
		if ( current_user_can( 'edit_theme_options' ) ) {
			esc_html_e( 'Menu not set. Go to Admin Panel > Appearance > Menus and set the menu in the primary area. Site visitors do not see this notice.', 'iriska' );
		}
	}
}

/*--------------------------------------------------------------
 * About Author Placeholder
 *------------------------------------------------------------*/
// Display a hint in the section about the author in a single post, if the information is missing.
// Function call in file "content-single-post-layout-one.php"
if ( !function_exists( 'iriska_about_author_placeholder' ) ) {
	function iriska_about_author_placeholder() {
		if ( current_user_can( 'edit_theme_options' ) ) {
			return esc_html__( 'Information about the author is missing. Go to Admin Panel > Users. On the user edit page, place the text in the "Biographical Info" field. Or hide the section about the author in the Admin Panel > Appearance > Customize > Theme Layout Settings > Single post layout. Site visitors do not see this notice.', 'iriska' );
		}
	}
}

/*--------------------------------------------------------------
 * Notice that the theme currently does not support some plugins
 *------------------------------------------------------------*/
function iriska_admin_notices() {
  $current_user_id = get_current_user_id();
  // Jetpack
  if ( defined( 'JETPACK__VERSION' ) && !get_user_meta( $current_user_id, 'iriska_jetpack_notice_dismissed' ) ) {
    echo '<div class="notice notice-warning is-dismissible"><p>' . esc_html__( 'Iriska notice: At the moment, the theme Iriska does not support the infinite scrolling function in the "Jetpack" plugin. This feature will be added in future versions of the Irirska theme.', 'iriska' ) . '<a href="?iriska_jetpack_notice_dismiss" style="margin-left:5px;">' . esc_html__( 'Never show this notice again', 'iriska' ) . '</a></p></div>';
  }

  // WooCommerce
  if ( class_exists( 'WooCommerce' ) && !get_user_meta( $current_user_id, 'iriska_woocommerce_notice_dismissed' ) ) {
    echo '<div class="notice notice-warning is-dismissible"><p>' . esc_html__( 'Iriska notice: At the moment, the Iriska theme does not fully support the WooCommerce plugin. This means that the plugin will work correctly, but the design of the elements and settings of WooCommerce will be standard. Full WooCommerce support will be added in future versions of the Iriska theme.', 'iriska' ) . '<a href="?iriska_woocommerce_notice_dismiss" style="margin-left:5px;">' . esc_html__( 'Never show this notice again', 'iriska' ) . '</a></p></div>';
  }
}
add_action( 'admin_notices', 'iriska_admin_notices' );

// Make notices dismissible
function iriska_admin_notices_dismissed() {
  $current_user_id = get_current_user_id();
  // Jetpack
  if ( isset( $_GET['iriska_jetpack_notice_dismiss'] ) ) {
    add_user_meta( $current_user_id, 'iriska_jetpack_notice_dismissed', true, true );
  }

  // WooCommerce
  if ( isset( $_GET['iriska_woocommerce_notice_dismiss'] ) ) {
    add_user_meta( $current_user_id, 'iriska_woocommerce_notice_dismissed', true, true );
  }
}
add_action( 'admin_init', 'iriska_admin_notices_dismissed' );