<?php

//------------------------------------------------------------------------------------------------
/**
 * The template for displaying comments
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Iriska
 *----------------------------------------------------------------------------------------------*/

/*--------------------------------------------------------------
 * If the current post is protected by a password and
 * the visitor has not yet entered the password content will
 * return early without loading the comments
 *------------------------------------------------------------*/

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="iriska-comments-area">
	<?php
		if ( have_comments() ) {
			$iriska_comment_count = get_comments_number(); ?>
			<h3 class="iriska-comments-title">
				<?php
					// translators: %1$d: comment count, %2$s: post title
					printf( esc_html__( 'Comments (%1$d) for post &ldquo;%2$s&rdquo;', 'iriska' ), $iriska_comment_count, get_the_title() );
				?>
			</h3>
			<?php the_comments_navigation(); ?>
			<?php $iriska_coments_no_avatar = ( get_option( 'show_avatars' ) ) ? 'iriska-comments-avatar' : ''; ?>
			<ul class="iriska-comment-list <?php echo esc_attr( $iriska_coments_no_avatar ); ?>">
				<?php
					wp_list_comments( array(
						'style' => 'ul',
						'short_ping' => true,
					));
				?>
			</ul><!-- .iriska-comment-list -->
			<?php the_comments_navigation();

				// Note if comments are closed
				if ( !comments_open() ) { ?>
					<p class="iriska-no-comments"><?php esc_html_e( 'Comments are closed.', 'iriska' ); ?></p>
					<?php
				}
		} else { ?>
			<h3 class="iriska-comments-title"><?php esc_html_e( 'No comments yet.', 'iriska' ); ?></h3>
			<?php
		}

		// Customizing form comments
		$iriska_commenter = wp_get_current_commenter();
		$iriska_aria_req = ( get_option( 'require_name_email' ) ) ? ' required=required aria-required=true' : '';
		$iriska_req_field = ( get_option( 'require_name_email' ) ) ? '*' : '';
		$iriska_comments_args = array(
			'fields' => array(
				'author' => '<div class="iriska-comment-form-field iriska-comment-form-author"><input class="iriska-comment-form-author-input" placeholder="' . esc_attr__( 'Name', 'iriska' ) . $iriska_req_field . '" name="author" type="text" value="' . esc_attr( $iriska_commenter['comment_author'] ) . '" size="30"' . esc_attr( $iriska_aria_req ) . ' /></div>',

				'email' => '<div class="iriska-comment-form-field iriska-comment-form-email"><input class="iriska-comment-form-email-input" placeholder="' . esc_attr__( 'Email', 'iriska' ) . $iriska_req_field . '" name="email" type="text" value="' . esc_attr(  $iriska_commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . esc_attr( $iriska_aria_req ) . ' /></div>',

				'url' => '<div class="iriska-comment-form-field iriska-comment-form-url"><input class="iriska-comment-form-url-input" placeholder="' . esc_attr__( 'Website', 'iriska' ) . '" name="url" type="text" value="' . esc_attr( $iriska_commenter['comment_author_url'] ) . '" size="30" /></div>',
			),

			'comment_field' => '<div class="iriska-comment-form-field iriska-comment-form-comment"><textarea class="iriska-comment-form-comment-textarea" placeholder="' . esc_attr__( 'Comment', 'iriska' ) . '" name="comment" cols="45" rows="8"  aria-required="true" required="required"></textarea></div>',

			'submit_field' => '<div class="iriska-comment-form-submit">%1$s %2$s</div>',
		);

		comment_form( $iriska_comments_args );
	?>
</div><!-- #comments -->
