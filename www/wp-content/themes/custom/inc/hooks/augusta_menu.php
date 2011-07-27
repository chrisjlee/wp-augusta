<?php
/**
 * Implements augusta_menu
 */
if ( !function_exists('augusta_menu') ) :
   function custom_augusta_menu(){
    $args = array(
              'container'       => 'div', 
              'container_class' => 'bfr grid_4 menu omega', 
              'menu'            => 'Social Media', 
              'menu_id'         => 'menu-sm-ul',
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

add_action('augusta_menu', 'custom_augusta_menu');