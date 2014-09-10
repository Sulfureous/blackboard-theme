<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>  
    <title>
	  <?php 
	    if(is_category()){ echo 'Category Archive for &quot;'; single_cat_title(); echo '&quot; | '; bloginfo('name') ;}
		elseif (is_tag()){ echo 'Tag Archive for &quot;'; single_tag_title(); echo '&quot; | '; bloginfo('name'); }
        elseif (is_front_page()){ the_title(); echo ' | '; bloginfo('name') ;}
        elseif (is_archive()){ wp_title(); echo ' Archive | '; bloginfo('name') ;}
        elseif (is_search()){ echo 'Search for &quot;'.wp_specialchars($s).'&quot; | '; bloginfo('name') ;}
        elseif (is_home()){ bloginfo('name'); echo ' | '; bloginfo('description') ;}
        elseif (is_404()){ echo 'Error 404 Not Found | '; bloginfo('name') ;}
        elseif (is_single()){ wp_title();}
        else { echo wp_title() ;}
      ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta charset="<?php bloginfo('charset'); ?>">
    <link rel="icon" href="<?php get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('rss2_url'); ?>">
    <link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?>" href="<?php bloginfo('atom_url'); ?>">
    <?php if (is_singular())wp_enqueue_script('comment-reply'); ?>
    <?php wp_head(); ?> 
  </head>
  <body <?php body_class(); ?>>
  
  <header>
    <h1><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
    <p><?php bloginfo('description'); ?></p>
    
    <?php
      wp_nav_menu(array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => '',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
	  ));
	?>
    
  </header>