<?php get_header(); ?>

  <?php
    if(isset($_GET['author_name'])) :
      $curauth = get_userdatabylogin($author_name);
    else :
      $curauth = get_userdata(intval($author));
    endif;
  ?>

  <h2><?php echo $curauth->display_name; ?></h2>

  <div class="authorAvatarCont">
	<?php
      if(function_exists('get_avatar')){
        echo get_avatar($curauth->user_email, $size = '140' );
      }
    ?>
  </div>

  <?php if($curauth->description != ''){ ?>
    <p><?php echo $curauth->description; ?></p>
  <?php } ?>

  <h3><?php _e('Recent Posts by ','blackboard'); echo $curauth->display_name; ?></h3>

  <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
    <?php static $count = 0; if ($count == "5") { break; } else { ?>
      <article>
	    <?php the_title(); ?>
        <?php the_excerpt(); ?>
      </article>
    <?php $count++; } ?>

    <?php endwhile; else: ?>
      <small><?php _e('No posts by ', 'blackboard'); echo $curauth->display_name; ?></small>
    <?php endif; ?>

  <h3><?php _e('Recent Comments by ', 'blackboard'); echo $curauth->display_name; ?></h3>

  <?php $number=5; $comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_approved = '1' and comment_author_email='$curauth->user_email' ORDER BY comment_date_gmt DESC LIMIT $number"); ?>

  <ul>
    <?php
      if($comments) : foreach ((array) $comments as $comment):
        echo '<li class="authorRecentComments">' . sprintf(__('%1$s on %2$s','blackboard'), get_comment_date(), '<a href="'. get_comment_link($comment->comment_ID) . '">' . get_the_title($comment->comment_post_ID) . '</a>') . '</li>';
      endforeach; else:
	?>
      <p><?php _e('No comments by ', 'blackboard'); echo $curauth->display_name; ?></p>
    <?php endif; ?>
  </ul>

<?php get_footer(); ?>