<?php
/**
 * Implements augusta_menu
 * Can be easily overriden for 
 * contextual behaviors
 * 
 */

if ( !function_exists('custom_menu_setup') ) :
function augusta_menu_setup($arg) {
if (!$arg) {
// Default arguments  
  $args = array(
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
}  
 /**
 * Footer Menu
 */ 
  if ($arg == 'footer') {
    echo "$arg";
    $args = array(
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
      'theme_location' => 'secondary'
    );
    
    return $menu = wp_nav_menu($args);
  }
  return; 
}   
endif;
add_filter('augusta_menu', 'augusta_menu_setup', $menu);

?>