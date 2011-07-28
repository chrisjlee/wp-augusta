<?
/*
 * @package WordPress
 * @subpackage Augusta
 * @author Chris J. Lee - iam@chrisjlee.net
 * @contributor Felipe Rocha
 * @since Augusta v1.0.0
 * 
 * Augusta Custom Hooks
 * 
 * This is where you override augusta (parent) 
 * theme hooks. Augusta will look for 
 * child theme hooks first before 
 * executing it's own hooks. Thus effectively 
 * overriding it quickly and easily
 * 
 *  
 */
 
 function custom_augusta_menu_setup() {
  $args = array(
    'container'       => 'div', 
    'container_class' => 'grid_10 menu alpha', 
    'menu'            => 'Footer', 
    'menu_id'         => 'menu-footer-ul',
    'menu_class'      => 'sxn menu', 
    'container_id'    => 'menu-footer', 
    'fallback_cb'     => 'wp_page_menu',
    'before'          => '',
    'after'           => '',
    'link_before'     => '<span>',
    'link_after'      => '</span>',
    'depth'           => 0,
    'walker'          => ''
    //'theme_location' => 'footer'
  );
  return wp_nav_menu($args);
}

add_filter('augusta_menu_setup','custom_augusta_menu', 10);