<?php

if ( post_password_required() ) {
	return;
}
?>

<?php 
	$count=absint(get_comments_number());

?>
<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">

<?php if($count >0):?>
	<h2><?= $count  ?> Commentaire<?=$count >1 ? 's' :'';  ?>	</h2>
	<h2>Laisser un commentaire</h2>	
<?php endif; ?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'monthem' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( __( 'Older Comments', 'monthem' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments', 'monthem' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; ?>

		<div class="media-list comment-list">
			<?php
			
			$args = array(
				
				'max_depth'         => '',
				'style'             => 'ul',
				'callback'          => null,
				'end-callback'      => null,
				'type'              => 'all',
				'reply_text'        => 'Répondre',
				'page'              => '',
				'per_page'          => '',
				'avatar_size'       => 36,
				'reverse_top_level' => null,
				'reverse_children'  => '',
				'format'            => 'html5',
				'short_ping'        => false,
				'echo'              => true
			);
			 wp_list_comments($args);
			?>
		</div><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'monthem' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php //previous_comments_link( __( 'Older Comments', 'pixova-lite' ) ); ?></div>
				<div class="nav-next"><?php //next_comments_link( __( 'Newer Comments', 'pixova-lite' ) ); ?></div>
				<?php paginate_comments_links(); ?>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php endif; ?>

	<?php endif; ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
	<p class="no-comments"><?php _e( 'Comments are closed.', 'monthem' ); ?></p>
	<?php endif; ?>

	<?php //comment_form(); ?>
	<?php if(comments_open()): ?>
		
		<?php comment_form(['title_reply' => '']); ?> <!-- class_form,class_submit -->
	<?php endif; ?>
</div><!-- #comments -->




