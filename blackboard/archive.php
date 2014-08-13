<?php get_header(); ?>

  <?php if(is_archive()): ?>
    <div class="archivesDateCont">
      <?php if(is_day()): ?>
        <p><?php printf( __('Daily Archives: <span>%s</span>','blvckbrd'), get_the_date()); ?></p>
      <?php elseif(is_month()): ?>
        <p><?php printf( __('Monthly Archives: <span>%s</span>','blvckbrd'), get_the_date('F Y')); ?></p>
      <?php elseif(is_year()): ?>
        <p><?php printf( __('Yearly Archives: <span>%s</span>','blvckbrd'), get_the_date('Y')); ?></p>
      <?php else: ?>
        <p>Blog Archives</p>
      <?php endif; ?>
    </div>
  <?php endif; ?>
  
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article <?php post_class();?>>
      <p><?php the_time('F j, Y');?></p>
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <?php the_excerpt(); ?>
    </article>
  <?php endwhile; else: ?>
    <p><?php _e('There are no posts here?!', 'blvckbrd'); ?></p>
    <p><?php _e('We apologize for any inconvenience, please go back on your browser.', 'blvckbrd'); ?></p>
  <?php endif; ?>

<?php get_footer(); ?>