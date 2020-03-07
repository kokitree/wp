<?php

//------------------------------------------------------------------------
/**
 * Template part for displaying single posts
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Iriska
 *----------------------------------------------------------------------*/

?>
<?php 
	$iriska_latest_posts = get_posts(
		array(
	  	'post_type' => 'post',
	  	'order' => 'desc',
	  	'numberposts' => (int) get_theme_mod( 'iriska_single_post_latest_posts_count', 6 ),
	  	'exclude' => $post->ID
		)
	);

	$iriska_latest_posts_title_length = (int) get_theme_mod( 'iriska_single_post_latest_title_length', 30 );

	$iriska_post_nav = get_the_post_navigation( array(
		'next_text' => esc_html__( 'Previous post', 'iriska' ),
		'prev_text' => esc_html__( 'Next post', 'iriska' ),
	));

	$iriska_pagination_args = array(
		'before' => '<div class="iriska-page-pagination"><span class="iriska-page-pagination-title">' . esc_html__( 'Pages:', 'iriska' ) . '</span>',
		'after' => '</div>',
		'link_before' => '<span class="iriska-page-pagination-item">',
		'link_after' => '</span>',
		'next_or_number' => 'number',
	);

	$iriska_author_id = get_the_author_meta( 'ID' );
	$iriska_author_avatar = get_avatar_url( $iriska_author_id );
	$iriska_author_name = get_the_author_meta( 'display_name' );
	$iriska_author_info = esc_html( get_the_author_meta( 'user_description' ) );
	$iriska_author_info_text = ( $iriska_author_info ) ? get_the_author_meta( 'user_description' ) : iriska_about_author_placeholder();
	$iriska_author_link = get_author_posts_url( $iriska_author_id );
?>

<?php do_action( 'iriska_before_single_post_content' ); ?>

<article id="iriska-post-<?php the_ID(); ?>" <?php post_class( 'iriska-single-post' ); ?>>
	<section class="iriska-single-post-content-section">
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="iriska-single-post-thumbnail-wrapper">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php } ?>

		<div class="iriska-single-post-content-wrapper">
			<div class="iriska-single-post-meta-wrapper">
				<div class="iriska-single-post-meta-info">
					<?php iriska_single_post_meta(); ?>
				</div>
			</div>
			<div class="iriska-single-post-header">
				<?php the_title( '<h1 class="iriska-single-post-title">', '</h1>' ); ?>
			</div>
			<div class="iriska-single-post-content">
				<?php the_content(); ?>
			</div>
			<div class="iriska-pagination iriska-single-post-links-nav-wrapper clearfix">
				<?php 
					wp_link_pages( $iriska_pagination_args );
					$iriska_display_single_post_nav_links = (int) get_theme_mod( 'iriska_display_single_post_nav_links', 1 );
					if ( $iriska_display_single_post_nav_links && $iriska_post_nav ) { ?>
						<div class="iriska-single-post-links-nav">
							<?php echo $iriska_post_nav; ?>
						</div>
						<?php
					}
				?>
			</div>
		</div>
	</section>

	<?php do_action( 'iriska_after_single_post_content' ); ?>

	<?php if ( get_post_type() === 'post' ) {
		$iriska_display_single_post_author_info = (int) get_theme_mod( 'iriska_display_single_post_author_info', 1 );
		if ( $iriska_display_single_post_author_info ) { ?>
			<section class="iriska-single-about-author-section">
				<div class="iriska-single-about-author-wrapper">
					<div class="iriska-single-about-author clearfix">
						<div class="iriska-single-about-author-avatar">
							<?php echo '<img src="' . esc_url( $iriska_author_avatar ) . '" alt="' . esc_attr__( 'Avatar', 'iriska' ) . '" />'; ?>
						</div>
						<div class="iriska-single-about-author-info-wrapper">
							<div class="iriska-single-about-author-name">
								<a href="<?php echo esc_url( $iriska_author_link ); ?>" title="<?php echo esc_attr( $iriska_author_name ); ?>"><?php echo esc_html( $iriska_author_name ); ?></a>
							</div>
							<div class="iriska-single-about-author-info">
								<?php echo wpautop( $iriska_author_info_text ); ?>
							</div>
						</div>
					</div>
				</div>
			</section>
		<?php } ?>

		<?php $iriska_display_single_post_latest_posts = (int) get_theme_mod( 'iriska_display_single_post_latest_posts', 1 );
			if ( $iriska_latest_posts && $iriska_display_single_post_latest_posts ) { ?>
				<aside class="iriska-single-latest-posts-wrapper">
					<h3 class="iriska-single-latest-post-title"><?php esc_html_e( 'Latest posts', 'iriska' ); ?></h3>
					<div class="iriska-single-latest-posts">
						<?php
					    foreach( $iriska_latest_posts as $iriska_latest_post ) {
								$iriska_latest_post_title = strip_tags( $iriska_latest_post->post_title );
								$iriska_latest_post_title = mb_substr( $iriska_latest_post_title, 0, $iriska_latest_posts_title_length );
								if ( mb_strlen( $iriska_latest_post_title ) >= $iriska_latest_posts_title_length ) {
									$iriska_latest_post_title .= '...';
								}

								$iriska_latest_post_thumbnail = '<div class="iriska-latest-post-thumbnail"><a style="background-image: url(' . esc_url( get_the_post_thumbnail_url( $iriska_latest_post->ID, 'thumbnail' ) ) . ');" href="' . esc_url( get_permalink( $iriska_latest_post->ID ) ) . '"></a></div>';
								$iriska_single_post_latest_posts_show_thumbnails = (int) get_theme_mod( 'iriska_single_post_latest_posts_show_thumbnails', 1 ); 
								if ( $iriska_single_post_latest_posts_show_thumbnails && !has_post_thumbnail( $iriska_latest_post->ID ) ) {
									$iriska_latest_post_thumbnail = '<div class="iriska-latest-post-thumbnail iriska-latest-post-no-thumbnail"><a href="' . esc_url( get_permalink( $iriska_latest_post->ID ) ) . '"></a></div>';
								}

								$iriska_posted_on = '';
								$iriska_single_post_latest_posts_show_post_date = (int) get_theme_mod( 'iriska_single_post_latest_posts_show_post_date', 1 );
								if ( $iriska_single_post_latest_posts_show_post_date ) {
									$iriska_time_string = '<time class="iriska-lstest-posts-entry-date" datetime="%1$s">%2$s</time>';

									$iriska_time_string = sprintf( $iriska_time_string,
										esc_attr( get_the_date( DATE_W3C, $iriska_latest_post->ID ) ),
										esc_html( get_the_date( get_option( 'date_format' ), $iriska_latest_post->ID ) )
									);

									$iriska_posted_on = '<span class="iriska-latest-posts-postdate">' . $iriska_time_string . '</span>';
								}

					    	$iriska_output = '<div class="iriska-latest-post clearfix">';
						    	$iriska_output .= $iriska_latest_post_thumbnail;
						    	$iriska_output .= '<div class="iriska-latest-post-content">';
							    	$iriska_output .= '<h4 class="iriska-latest-post-title"><a href="' . esc_url( get_permalink( $iriska_latest_post->ID ) ) . '">' . esc_html( $iriska_latest_post_title ) . '</a></h4>';
							    	$iriska_output .= $iriska_posted_on;
							    $iriska_output .= '</div>';
					    	$iriska_output .= '</div>';
					    	echo $iriska_output;
					    }
					  ?>
				  </div>
				</aside>
		<?php } ?>

		<?php $iriska_display_single_post_widgets_area = (int) get_theme_mod( 'iriska_display_single_post_widgets_area', 1 );
		if ( $iriska_display_single_post_widgets_area && is_active_sidebar( 'iriska-single-post-widgets' ) ) { ?>
			<div class="iriska-single-post-widget-area-wrapper">
				<div class="iriska-single-post-widget-area clearfix">
					<?php dynamic_sidebar( 'iriska-single-post-widgets' ); ?>
				</div>
			</div>
		<?php } ?>
	<?php } ?>

	<?php do_action( 'iriska_after_single_widgets_area' ); ?>

	<?php if ( ( comments_open() || get_comments_number() ) && !post_password_required() ) { ?>
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
	<?php } ?>

</article>
