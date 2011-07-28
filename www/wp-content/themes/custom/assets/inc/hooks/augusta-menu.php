<?php
/**
 * Implements augusta_menu
 */
if ( !function_exists('augusta_menu_setup') ) :
   function augusta_menu_setup(){
    $args = array(
      'container'       => 'div', 
      'container_class' => 'menu omega', 
      'menu'            => 'Primary Menu', 
      'menu_id'         => 'menu-primary',
      'menu_class'      => 'sxn menu omega', 
      'container_id'    => 'menu-sm', 
      'fallback_cb'     => 'wp_page_menu',
      'before'          => '',
      'after'           => '',
      'link_before'     => '<span>',
      'link_after'      => '</span>',
      'depth'           => 0,
      'walker'          => '',
      'theme_location' => 'secondary'
    );
    wp_nav_menu($args);
   }  
endif;

add_action('augusta_menu', 'augusta_menu_setup');
?>