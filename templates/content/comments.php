<?php
/**
 * The template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage karuto_starter_theme
 * @since 1.0.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
*/
if ( post_password_required() ) {
	return;
}

$discussion = twentynineteen_get_discussion_data();
?>

<div id="comments" class="<?php echo comments_open() ? 'comments-area' : 'comments-area comments-closed'; ?>">
	<div class="<?php echo $discussion->responses > 0 ? 'comments-title-wrap' : 'comments-title-wrap no-responses'; ?>">
		<?php get_template_part( 'templates/content/comments-title' ); ?>
		<?php
			// Only show discussion meta information when comments are open and available.
		if ( have_comments() && comments_open() ) {
			get_template_part( 'templates/content/comments-discussion-meta' );
		}
		?>
	</div><!-- .comments-title-flex -->
	<?php
	if ( have_comments() ) :

		// Show comment form at top if showing newest comments at the top.
		if ( comments_open() ) {
			twentynineteen_comment_form( 'desc' );
		}

		?>
		<ul class="comment-list">
			<?php
			wp_list_comments(
				array(
					'walker'      => new TwentyNineteen_Walker_Comment(),
					'avatar_size' => 60,
					'short_ping'  => true,
					'style'       => 'ul',
				)
			);
			?>
		</ul><!-- .comment-list -->
		<?php

		// Show comment form at bottom if showing newest comments at the bottom.
		if ( comments_open() && 'asc' === strtolower( get_option( 'comment_order', 'asc' ) ) ) :
			?>
			<div class="comment-form-flex">
				<span class="screen-reader-text"><?php _e( 'Leave a comment', 'twentynineteen' ); ?></span>
				<?php twentynineteen_comment_form( 'asc' ); ?>
				<h2 class="comments-title" aria-hidden="true"><?php _e( 'Leave a comment', 'twentynineteen' ); ?></h2>
			</div>
			<?php
		endif;

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments">
				<?php _e( 'Comments are closed.', 'twentynineteen' ); ?>
			</p>
			<?php
		endif;

	else :

		// Show comment form.
		twentynineteen_comment_form( true );

	endif; // if have_comments();
	?>
</div><!-- #comments -->
