<?php

/*
  =-=-=-=
    Blackboard Base Functions
  =-=-=-=
*/

// Add theme support for Featured Images
add_theme_support('post-thumbnails');

// Add theme support for Custom Background
add_theme_support('custom-background');

// Add theme support for Custom Header
add_theme_support('custom-header');	

// Add theme support for Automatic Feed Links
add_theme_support('automatic-feed-links');

// Add theme support for Menus
add_theme_support('menus');

// Add theme support for Post Formats
/* add_theme_support('post-formats', array(
  'aside',
  'gallery',
  'link',
  'image',
  'quote',
  'status',
  'video',
  'audio',
  'chat'
));*/

// Add Editor Style Support
function my_theme_add_editor_styles() {
  add_editor_style();
}
add_action('after_setup_theme', 'my_theme_add_editor_styles');

// No more WordPress version on the header
function wp_remove_version(){
  return '<!--This is Blackboard-->';
}
add_filter('the_generator', 'wp_remove_version');

// Set the content width for oEmbed media other forms of media
if(!isset($content_width)){
  $content_width = 600;
}

// Add .has_thumb class to post if there's a featured image
function has_thumb_class($classes){
  global $post;
  if(has_post_thumbnail($post->ID)){
	$classes[] = 'has_thumb';
  }
  return $classes;
}
add_filter('post_class', 'has_thumb_class');

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
  return '<p><a href="'.get_permalink().'" class="readMoreLink">Read More</a></p>';
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

// Add Support for Post Pagination
function custom_nextpage_links($defaults) {
  $args = array(
    'before' => '<div class="my-paginated-posts"><p>' . __('Sections &#151;','blackboard'),
    'after' => '</p></div>',
  );
  $r = wp_parse_args($args, $defaults);
  return $r;
}
add_filter('wp_link_pages_args','custom_nextpage_links');

// Make the theme translation ready
function theme_translation_setup(){
	load_theme_textdomain('blackboard', get_template_directory().'/lang');
}
add_action('after_setup_theme', 'theme_translation_setup');

// Include Scripts and CSS on the wp_head and wp_footer hooks. (uncomment if you wanna bootstrap!)
/*
function custom_enqueue_scripts() {
	wp_enqueue_style( 'bootstrap-min', 'http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css' );
	wp_enqueue_style( 'font-awesome-min', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css' );
	wp_enqueue_script( 'bootstrap-min', 'http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js', array(), '3.2.0', true );
}
add_action( 'wp_enqueue_scripts', 'custom_enqueue_scripts' );
*/

?>