<?php

//------------------------------------------------------------------------
/**
 * Template part for displaying posts preview
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Iriska
 *----------------------------------------------------------------------*/

$iriska_archives_posts_show_thumbnails = (int) get_theme_mod( 'iriska_archives_posts_show_thumbnails', 0 );
$iriska_class_layout = ( $iriska_archives_posts_show_thumbnails == 0 && !has_post_thumbnail( $post->ID ) ) ? 'iriska-post-preview-without-thumbnail' : '';
$iriska_read_more_text = esc_html__( 'Read more', 'iriska' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('iriska-post-preview iriska-post-preview-one'); ?>>
	<?php if ( has_post_thumbnail( $post->ID ) ) { ?>
		<a class="iriska-post-preview-thumbnail" style="background-image: url(<?php echo esc_url( get_the_post_thumbnail_url( $post->ID, 'iriska-archive-thumbnail-background' ) ); ?>);" href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>" rel="bookmark"></a>
	<?php } ?>

	<?php if ( $iriska_archives_posts_show_thumbnails && !has_post_thumbnail( $post->ID ) ) { ?>
		<a class="iriska-post-preview-thumbnail iriska-post-preview-no-thumbnail" href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>" rel="bookmark"></a>
	<?php } ?>

	<div class="iriska-post-preview-content <?php echo esc_attr( $iriska_class_layout ); ?>">
		<?php if ( is_sticky() ) { ?>
			<div class="iriska-post-preview-sticky">
				<span><?php esc_html_e( 'Sticky', 'iriska') ?></span>
			</div>
		<?php } ?>
		<div class="iriska-post-preview-header">
			<?php the_title( '<h2 class="iriska-post-preview-title"><a class="iriska-link-to-post" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		</div>

		<div class="iriska-post-preview-excerpt">
			<?php the_excerpt(); ?>
		</div>
		
		<div class="iriska-post-preview-meta-wrapper clearfix">
			<div class="iriska-post-preview-readmore-wrapper">
				<a class="iriska-readmore-button" href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>" rel="bookmark">
					<?php
						// Use this filter to change the text of the "Read more" button.
						// The value that is passed $iriska_read_more_text
						echo apply_filters( 'iriska_read_more_button_text', $iriska_read_more_text );
					?>
				</a>
			</div>
			<div class="iriska-post-preview-meta-info-wrapper">
				<div class="iriska-post-preview-meta clearfix">
					<div class="iriska-post-preview-info">
						<div class="iriska-post-preview-meta-info">
							<?php iriska_archives_posts_meta(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- .iriska-post-preview-content -->
</article>
