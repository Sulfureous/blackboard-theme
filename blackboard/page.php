<?php get_header(); ?>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article <?php post_class();?>>
      <h2><?php the_title(); ?></h2>
      <?php the_content(); ?>
    </article>

	<?php if (comments_open()){ ?>
      <?php comments_template('', true); ?>
    <?php } ?>

  <?php endwhile; else: ?>
    <p><?php _e('There is no page found here.','blackboard'); ?></p>
    <p><?php _e('We apologize for any inconvenience, please go back on your browser.','blackboard'); ?></p>
  <?php endif; ?>

<?php get_footer(); ?>
