<?php

//------------------------------------------------------------------------
/**
 * Template part for displaying page content in page.php
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Iriska
 *----------------------------------------------------------------------*/

?>
<?php
	$iriska_pagination_args = array(
		'before' => '<div class="iriska-page-pagination"><span class="iriska-page-pagination-title">' . esc_html__( 'Pages:', 'iriska' ) . '</span>',
		'after' => '</div>',
		'link_before' => '<span class="iriska-page-pagination-item">',
		'link_after' => '</span>',
		'next_or_number' => 'number',
	);

	$iriska_comment_button = '';
?>
<article id="iriska-page-<?php the_ID(); ?>" <?php post_class( 'iriska-single-page' ); ?>>

	<?php do_action( 'iriska_before_single_page_content' ); ?>

	<div class="iriska-single-page-content-wrapper">
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="iriska-page-thumbnail-wrapper">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php } ?>

		<div class="iriska-page-content">
			<div class="iriska-page-header">
				<?php the_title( '<h1 class="iriska-page-title">', '</h1>' ); ?>
			</div>
			<?php the_content(); ?>
			<?php wp_link_pages( $iriska_pagination_args ); ?>
		</div>
	</div>

	<?php do_action( 'iriska_after_single_page_content' ); ?>

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


</article><!-- #post-<?php the_ID(); ?> -->
