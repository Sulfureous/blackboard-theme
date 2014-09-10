<?php get_header(); ?>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article <?php post_class();?>>
      <h1><?php the_title(); ?></h1>
      
      Author: <?php the_author(); ?><br>
      Date: <?php the_date(); ?><br>
      Time: <?php the_time(); ?><br>
      Category(s): <?php the_category(', '); ?><br>
      <?php the_tags('Tags(s): ',', ',''); ?>
      
      <?php the_content(); ?>
      <?php posts_nav_link() ?>
      <?php
        wp_link_pages(array(
		  'before' => '<div class="postPaginationCont">',
		  'after' => '</div>'
	    ));
	  ?>
    </article>
	<?php if (comments_open()){ ?>
      <?php comments_template('', true); ?>
    <?php } ?>
  <?php endwhile; else: ?>
    <p><?php _e('Post Not Found!', 'blackboard'); ?></p>
  <?php endif; ?>

<?php get_footer(); ?>