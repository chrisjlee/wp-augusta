<?php 
/**
 * @package WordPress
 * @subpackage Augusta
 * @author Chris J. Lee - iam@chrisjlee.net
 * @since Augusta v1.0.0
 * 
 * 
 */

 /** Register sidebars by running augusta_widgets_init() on the widgets_init hook. */
  add_action( 'widgets_init', 'augusta_widgets_init' );
  /*
 * Implements widgets_init
 */
if ( !function_exists( 'custom_widgets_init' ) ) :
  function augusta_widgets_init() {
    //register_widget( 'Augusta_Widget' );
  register_sidebar( array(
    'name' => __( 'Front: Sidebar', 'augusta' ),
    'description' => __('', 'augusta'),
    'id' => 'front',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<div class="widget-title"><h2>',
    'after_title' => '</h2></div>',
  ) );

  register_sidebar( array(
    'name' => __( 'Page: Sidebar', 'augusta' ),
    'id' => 'page',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<div class="widget-title"><h2>',
    'after_title' => '</h2></div>',
  ) );

  register_sidebar( array(
    'name' => __( 'Sidebar Second ', 'augusta' ),
    'id' => 'second',
    'description' => __( 'Second Sidebar', 'augusta' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s sidebar-second">',
    'after_widget' => "</div>",
    'before_title' => '<div class="widget-title"><h2>',
    'after_title' => '</h2></div>',
  ) );
  
  register_sidebar( array(
    'name' => __( 'Blog: Primary Sidebar ', 'augusta' ),
    'id' => 'blog-primary',
    'description' => __( 'Sidebar for the blog', 'augusta' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s sidebar-blog">',
    'after_widget' => "</div>",
    'before_title' => '<div class="widget-title"><h2>',
    'after_title' => '</h2></div>',
  ) );
  
  register_sidebar( array(
    'name' => __( 'Blog: Primary Sidebar ', 'augusta' ),
    'id' => 'blog-secondary',
    'description' => __( 'Sidebar for the blog', 'augusta' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s sidebar-blog">',
    'after_widget' => "</div>",
    'before_title' => '<div class="widget-title"><h2>',
    'after_title' => '</h2></div>',
  ) );

  register_sidebar( array(
    'name' => __( 'Footer Area One', 'augusta' ),
    'id' => 'footer-first',
    'description' => __( 'An optional widget area for your site footer', 'augusta' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<div class="widget-title"><h2>',
    'after_title' => '</h2></div>',
  ) );

  register_sidebar( array(
    'name' => __( 'Footer Area Two', 'augusta' ),
    'id' => 'footer-second',
    'description' => __( 'An optional widget area for your site footer', 'augusta' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<div class="widget-title"><h2>',
    'after_title' => '</h2></div>',
  ) );

  register_sidebar( array(
    'name' => __( 'Footer Area Three', 'augusta' ),
    'id' => 'footer-third',
    'description' => __( 'An optional widget area for your site footer', 'augusta' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<div class="widget-title"><h2>',
    'after_title' => '</h2></div>',
  ) );
  }
endif; 
  

/**
 * Augusta Sidebar Before
 * @todo documentating
 */
function augusta_sidebar_before_setup($output='', $class='') {
  $class = sidebar_class();
  if ( !empty($class) ) {
    $output = '<div id="region-sidebar" class="region-content'. $class .'">';
  } else {
    $output = '<div id="region-sidebar" class="region-content grid-4 grid-default">';
  }
  return print apply_filters('augusta_sidebar_before_setup', $output, $class);
}
add_filter('augusta_sidebar_before', 'augusta_sidebar_before_setup');

/**
 * Augusta Sidebar Before
 * @todo documentating
 */
function augusta_sidebar_after_setup($output) {
  $output = '</div>';
  return print apply_filters('augusta_content_after_setup', $output);
}
add_filter('augusta_sidebar_after', 'augusta_content_after_setup');


