<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if ( post_password_required() ) { ?>
		<p class="no-comments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>
<!-- You can start editing here. -->
<?php if ( have_comments() ) : ?>
	<h3><?php comments_number('No Comments', 'One Comment', '% Comments' );?></h3>
	<div id="comments-content">
		<ol class="commentlist">
			<?php wp_list_comments('type=comment&avatar_size=60&callback=leetpress_comment'); ?>
		</ol>
		<div id="comments_pagination" class="paginate-com">
			<?php
			//Create pagination links for the comments on the current post, with single arrow heads for previous/next
			paginate_comments_links( array('prev_text' => '<i class="fa fa-arrow-left"></i>', 'next_text' => '<i class="fa fa-arrow-right"></i>'));
			?>
		</div>
	</div>
<?php else : // this is displayed if there are no comments so far ?>
	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="no-comments">Comments are closed</p>
	</div>
	<?php endif; ?>
<?php endif; ?>
<?php if ( comments_open() ) : ?>
<div id="respond">
	<h3><?php comment_form_title( 'Add a new comment', 'Add a new comment' ); ?></h3>
	<div id="respond-content">
		<p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>
		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
			<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
		<?php else : ?>
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" class="myform" id="mycomment">
			<?php if ( is_user_logged_in() ) : ?>
			<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a> . <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
			<div id="comment-textarea-admin">
				<label class="hidden-lg hidden-md hidden-sm hidden-xs" for="comment">Comment</label>
				<textarea name="comment" id="comment" placeholder="Join the discussion..." rows="3" class="form-control input-lg requiredField textarea-comment"></textarea>
			</div>
			<div id="comment-submit-admin">
				<p><input name="submit" type="submit" id="submit" tabindex="5" value="Post Comment" class="btn btn-block comment-submit" /></p>
				<?php comment_id_fields(); ?>
				<?php do_action('comment_form', $post->ID); ?>
			</div>
			<?php else : ?>
			<div id="comment-input">
				<div id="comment-textarea" >
					<label class="hidden-lg hidden-md hidden-sm hidden-xs" for="comment">Comment</label>
					<textarea name="comment" id="comment" placeholder="Join the discussion..." rows="3" class="form-control input-lg requiredField textarea-comment" data-error-empty="Please enter comment"></textarea>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6 comments-label-div">
						<label class="hidden-lg hidden-md hidden-sm hidden-xs" for="author">Name <span class="hidden-lg req"><?php if ($req) echo "(required)"; ?></span></label>
						<input type="text" name="author" id="author" placeholder="Name" value="<?php echo esc_attr($comment_author); ?>" <?php if ($req) echo "aria-required='true'"; ?> class="form-control input-lg requiredField input-name" data-error-empty="Please enter name" />
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 ">
						<label class="hidden-lg hidden-md hidden-sm hidden-xs" for="email">Email <span class="hidden-lg req"><?php if ($req) echo "(required)"; ?></span></label>
						<input type="text" name="email" id="email" placeholder="Email" value="<?php echo esc_attr($comment_author_email); ?>" <?php if ($req) echo "aria-required='true'"; ?> class="form-control input-lg requiredField input-email" data-error-empty="Please enter email" data-error-invalid="Invalid email address" />
					</div>
				</div>
				<div class="row comments-label">
					<div class="col-xs-12 col-sm-6 col-md-6 comments-label-div">
						<label class="hidden-lg hidden-md hidden-sm hidden-xs" for="url">Website</label>
						<input type="text" name="url" id="url" placeholder="Website" value="<?php echo esc_attr($comment_author_url); ?>" class="form-control input-lg input-website" />
					</div>
					<div id="comment-submit" class="col-xs-12 col-sm-6 col-md-6">
						<button name="submit" type="submit" id="submit" value="Send Comment" class="btn btn-block comment-submit" data-error-message="Error!" data-sending-message="Sending..." data-ok-message="Comment Sent" >Send Comment</button>
						<?php comment_id_fields(); ?>
						<?php do_action('comment_form', $post->ID); ?>
					</div>
				</div>
			<?php endif; ?>
		</form>
	</div>
	<?php endif; // If registration required and not logged in ?>
</div>
<?php endif; // if you delete this the sky will fall on your head ?>