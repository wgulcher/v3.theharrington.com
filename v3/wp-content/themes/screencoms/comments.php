<?php
/**
 * @package WordPress
 * @subpackage D1g1tal_Theme
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
	
	global $d1_content_width;
?>

<!-- You can start editing here. -->

<div class="comments-holder">

	<!-- ?php comment_form(); ? -->



                                    <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                                    
                                
                                    
                                    <p class="postmetadata">
                                        
                                        <h4 class='comments-options'>Comment Options:</h4>
                                         
                                            <?php post_comments_feed_link('Follow responses via RSS'); ?> | 
                    
                                            <?php if ( comments_open() && pings_open() ) {
                                                // Both Comments and Pings are open ?>
                                                <a href="#respond">Leave a response now</a> | <a href="<?php trackback_url(); ?>" rel="trackback">Trackback from a site</a>
                    
                                            <?php } elseif ( !comments_open() && pings_open() ) {
                                                // Only Pings are Open ?>
                                                Responses are currently closed, but you can <a href="<?php trackback_url(); ?> " rel="trackback">Trackback from your own site</a> 
                    
                                            <?php } elseif ( comments_open() && !pings_open() ) {
                                                // Comments are open, Pings are not ?>
                                                You can skip to the end and leave a response. Pinging is currently not allowed.
                    
                                            <?php } elseif ( !comments_open() && !pings_open() ) {
                                                // Neither Comments, nor Pings are open ?>
                                                Both comments and pings are currently closed.
                    
                                            <?php }  ?>
                    
                                        
                                    </p> 



<?php if ( have_comments() ) : ?>


	<h4 id="comments"><?php comments_number('No comments!', 'Comments: 1', 'Comments (%)' );?> </h4>



	<ol class="commentlist">
		<?php 
	
		 $args = array(
			'walker'            => null,
			'max_depth'         => '',
			'style'             => 'ul',
			'callback'          => null,
			'end-callback'      => null,
			'type'              => 'all',
			'reply_text'        => 'Reply',
			'page'              => '',
			'per_page'          => '',
			'avatar_size'       => 60,
			'reverse_top_level' => null,
			'reverse_children'  => '',
			'format'            => 'xhtml', //or html5 @since 3.6
			'short_ping'        => false // @since 3.6
		);

		wp_list_comments(); ?>
	</ol>


 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->
        

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"></p>

	<?php endif; ?>
<?php endif; ?>


<?php if ( comments_open() ) : ?>

<div id="respond">

<h4><?php comment_form_title( 'Leave a Comment...', 'Leave a Comment on %s' ); ?></h4>

<div class="cancel-comment-reply">
	<small><?php cancel_comment_reply_link(); ?></small>
</div>

<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
<small>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</small>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( is_user_logged_in() ) : ?>

<small>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></small>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="author"><small>Your Full Name <?php if ($req) echo "(required)"; ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
<label for="email"><small>Your Email <?php if ($req) echo "(required)"; ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
<label for="url"><small>Your Website or Company</small></label></p>

<?php endif; ?>

<!--p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p -->

<p><textarea name="comment" id="comment" cols="75" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
<?php comment_id_fields(); ?>
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>


<?php paginate_comments_links(); ?>

</div>