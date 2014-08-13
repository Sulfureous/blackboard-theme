<?php get_header(); ?>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article <?php post_class();?>>
      <h1><?php the_title(); ?></h1>
      <?php the_content(); ?>
      <?php
        wp_link_pages(array(
		  'before' => '<div class="postPaginationCont">',
		  'after' => '</div>'
	    ));
	  ?>
    </article>
	<?php if (comments_open()){ ?>
      <?php comments_template( '', true ); ?>
    <?php } ?>
  <?php endwhile; else: ?>
    <p><?php _e('Post Not Found!', 'blvckbrd'); ?></p>
  <?php endif; ?>

<?php get_footer(); ?>