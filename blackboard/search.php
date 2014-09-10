<?php get_header(); ?>

  <p><?php _e('You searched for: ', 'blackboard')?><?php the_search_query(); ?></p>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article <?php post_class();?>>
      <p><?php the_time('F j, Y');?></p>
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <?php the_excerpt(); ?>
    </article>
  <?php endwhile; else: ?>
    <p><?php _e('There are no search results here!','blackboard'); ?></p>
  <?php endif; ?>
  
  <?php echo paginate_links(); ?>


<?php get_footer(); ?>
