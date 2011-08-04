<?php
/**
 * Implements augusta_menu
 * Can be easily overriden for 
 * contextual behaviors
 * 
 */

if ( !function_exists('custom_menu_setup') ) :
function augusta_menu_setup( $arg="", $menu="") {
  if (!$arg && !menu) {
    $menu = array(
      'container'       => 'div', 
      'container_class' => 'menu ', 
      'menu'            => 'Primary Menu', 
      'menu_id'         => 'menu-primary-ul',
      'menu_class'      => 'sxn menu omega', 
      'container_id'    => 'menu-sm', 
      'fallback_cb'     => 'wp_page_menu',
      'before'          => '',
      'after'           => '',
      'link_before'     => '<span>',
      'link_after'      => '</span>',
      'depth'           => 0,
      'walker'          => '',
      'theme_location' => 'primary' 
    );
    return wp_nav_menu( apply_filters('augusta_menu_setup', $menu) );
  }  
 /**
 * Footer Menu
 */ 
  if ($arg == 'footer') {
    $menu = array(
      'container'       => 'div', 
      'container_class' => 'menu ', 
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
      'walker'          => '',
      'theme_location' => 'footer'
    );
    
  }
  if ($arg == 'primary') {
    $menu = array(
      'container'       => 'div', 
      'container_id'    => 'menu-primary', 
      'container_class' => 'menu ', 
      'menu'            => 'Primary', 
      'menu_id'         => 'menu-primary-ul',
      'menu_class'      => 'menu', 
      'fallback_cb'     => 'wp_page_menu',
      'before'          => '',
      'after'           => '',
      'link_before'     => '<span>',
      'link_after'      => '</span>',
      'depth'           => 0,
      'theme_location' => 'primary',
      'walker'          => ''
    );
    
  }
  return wp_nav_menu( apply_filters('augusta_menu_setup', $menu ) ); 
}   
endif;
add_filter('augusta_menu', 'augusta_menu_setup', $arg, $menu);

?>