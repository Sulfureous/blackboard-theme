<?php get_header(); ?>

  <h2><?php printf( __( 'Category Archives: %s', 'blackboard'), '<span>'.single_cat_title('', false).'</span>'); ?></h2>
  <p><?php echo tag_description(); ?></p>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article <?php post_class();?>>
      <p><?php the_time('F j, Y');?></p>
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <?php the_excerpt(); ?>
    </article>
  <?php endwhile; else: ?>
    <p><?php _e('There are no posts here?!', 'blackboard'); ?></p>
    <p><?php _e('We apologize for any inconvenience, please go back on your browser.', 'blackboard'); ?></p>
  <?php endif; ?>

<?php get_footer(); ?>