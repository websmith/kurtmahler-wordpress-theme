<?php if ( comments_open() ) : ?>
	<div id="respond">
		<h4><?php comment_form_title( 'Leave a Comment', 'Leave a Comment to %s' ); ?></h4>
		<div class="cancel-comment-reply">
			<?php cancel_comment_reply_link(); ?>
		</div>
		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
		<?php else : ?>
		<form role="form" class="form-horizontal" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
            <div class="row uniform">
				<?php if ( is_user_logged_in() ) : ?>
                <div class="12u">
    				<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.</p>
                </div>
                <div class="12u">
                    <p><a class="button" href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out</a></p>
                </div>
				<?php else : ?>
                <div class="6u 12u$(xsmall)">
    				<label class="sr-only" for="author">Name</label>
    				<input type="text" class="" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" tabindex="1" placeholder="Name" <?php if ($req) echo "aria-required='true'"; ?>>
                </div>
                <div class="6u 12u$(xsmall)">
    				<label class="sr-only" for="email">Email</label>
    				<input type="text" class="" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" tabindex="2" placeholder="Email" <?php if ($req) echo "aria-required='true'"; ?>>
                </div>
                <div class="12u">
    				<label class="sr-only" for="url">Website</label>
    				<input type="text" class="" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" tabindex="3" placeholder="Website">
                </div>
				<?php endif; ?>
                <div class="12u">
    				<label class="sr-only" for="comment">Comment</label>
    				<textarea class="" name="comment" id="comment" tabindex="4" placeholder="Type your comment here..."></textarea>
                </div>
                <div class="6u">
    				<input type="submit" class="button special" tabindex="5" value="Post Comment">
                </div>
            </div>
			<?php comment_id_fields(); ?>
			<?php do_action('comment_form', $post->ID); ?>
		</form>
		<?php endif; ?>
	</div>
    <hr>
<?php endif; ?>

<?php if ( have_comments() ) : ?>
	<h4 id="comments"><?php comments_number('No Comments', '1 Comment', '% Comments' );?></h4>
    <a class="button icon fa-plus" href="#respond"><i class=""></i>&nbsp; Leave a Comment</a>

	<ul class="comment-list">
		<?php wp_list_comments(); ?>
	</ul>
<?php endif; ?>
