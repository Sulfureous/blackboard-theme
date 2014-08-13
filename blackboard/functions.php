<?php

/*
  =-=-=-=
    Blackboard Base Functions
  =-=-=-=
*/

// Add featured images support
add_theme_support('post-thumbnails');

// Add Custom background support
add_custom_background();

// Add the Theme "Menus" support
add_theme_support('menus');

// Add Post Format Theme Support
add_theme_support('post-formats', array(
  'aside',
  'gallery',
  'link',
  'image',
  'quote',
  'status',
  'video',
  'audio',
  'chat'
));

// No more WordPress version on the header
function wp_remove_version(){
  return '<!--This is Blackboard-->';
}
add_filter('the_generator', 'wp_remove_version');

// Add .has_thumb class to post if there's a featured image
function has_thumb_class($classes){
  global $post;
  if(has_post_thumbnail($post->ID)){
	$classes[] = 'has_thumb';
  }
  return $classes;
}
add_filter('post_class', 'has_thumb_class');

// Removes trackbacks from the comments count
function comment_count($count){
  if(!is_admin()){
    global $id;
    $comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
    return count($comments_by_type['comment']);
  } else {
    return $count;
  }
}
add_filter('get_comments_number', 'comment_count', 0);

// Encourage RSS subscribers to comment on posts
function rss_comment_footer($content){
  if(is_feed()){
    if(comments_open()){
      $content .= 'Comments open. <a href="'.get_permalink().'">Leave a comment</a>';
    }
  }
  return $content;
}

// Remove login errors for security
add_filter('login_errors',create_function('$a', "return null;"));

// Excerpt Read More Ellipsis
function custom_excerpt_ellipsis($more){
  return '...<a href="'.get_permalink().'" class="readMoreLink">Read More</a>';
}
add_filter('excerpt_more', 'custom_excerpt_ellipsis');

// Category ID in body element and the post classes
function category_id_class($classes){
  global $post;
  foreach((get_the_category($post->ID)) as $category)
    $classes [] = 'cat-'.$category->cat_ID.'-id';
  return $classes;
}
add_filter('post_class', 'category_id_class');
add_filter('body_class', 'category_id_class');

// Adds the post thumbnail to the RSS feed
function rss_post_thumbnail($content) {
  global $post;
  if(has_post_thumbnail($post->ID)) {
    $content = '<p>'.get_the_post_thumbnail($post->ID).'</p>'.get_the_content();
  }
  return $content;
}
add_filter('the_excerpt_rss', 'rss_post_thumbnail');
add_filter('the_content_feed', 'rss_post_thumbnail');

// Register WordPress Menus
if (function_exists('register_nav_menus')){
  register_nav_menus(
    array(
      'header-menu' => 'Header Menu',
      'footer-menu' => 'Footer Menu'
    )
  );
}

// Register widget areas here
if (function_exists('register_sidebar'))
register_sidebar(array(
  'name' => 'Sidebar Widget Area',
  'before_widget' => '<div class="widgetCont">',
  'after_widget' => '</div>',
  'before_title' => '<h3 class="widgetTitle">',
  'after_title' => '</h3>'
));

?>