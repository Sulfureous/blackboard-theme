<div id="comments" class="comments-area">

	<?php if(!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])): ?>
	    <?php die('Please do not load this page directly or we will hunt you down. Thanks and have a great day!'); ?>
	<?php endif; ?>
	
	<?php if(!empty($post->post_password)): ?>
	  <?php if($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password): ?>
	  <?php endif; ?>
	<?php endif; ?>
	
	<?php if($comments) : ?>
      <h3><?php comments_number('No comments', 'One comment', '% comments'); ?></h3>

	  <ol class="commentlist comment-list">
		<?php
          wp_list_comments(array(
            'style' => 'ol',
            'short_ping' => true,
            'avatar_size' => 50,
            'format' => 'html5'
          ));
        ?>
	  </ol>

	  <?php if ($trackback == true) { ?>
        <h3>Trackbacks</h3>
		  <ol>
		    <?php foreach ($comments as $comment) : ?>
			  <?php $comment_type = get_comment_type(); ?>
			  <?php if($comment_type != 'comment') { ?>
			    <li><?php comment_author_link() ?></li>
			  <?php } ?>
			<?php endforeach; ?>
		  </ol>
	  <?php } ?>
      
	<?php else : ?>
	  <p><?php _e('No comments yet.', 'blvckbrd'); ?></p>
	<?php endif; ?>
    
    <hr>
	
	<?php
	  comment_form(array(
	    'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label></p><p><textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
	    'cancel_reply_link' => '<div class="cancelReplyCont"><span>Cancel Reply</span></div>'
	  ));
	?>
    
</div>