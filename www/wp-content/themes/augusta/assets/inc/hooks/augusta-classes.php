<?php
/**
 * Augusta Class Hooks
 * @author Chris J. Lee
 * @since 1.0.0
 * 
 * This will allow you to write and 
 * override any classes for each zone.
 * The class hooks acts as routers. They
 * provide the developer to write rules
 * for each context and have it product classes
 * 
 * Each hook has a setup hook.
 *  - hook_class -> hook_class_setup
 * Each setup hook contains the name of the zone
 * 
 * Implementing Child Hooks:
 * 
 * If you need to override any hook 
 * each function will look for a function with
 * the prefix of 'custom_' before the hook and the hook
 * will not be initiated.
 * 
 */

/**
 * Template for zone class hooks 
 * Copy the following if you need to add a hook

    START >>>
    
    //   Class Hook  
    if ( !function_exists( 'custom_zone__class' ) ) :
    function zone__class_setup() {
      echo "container-16";
    }
    add_filter('zone__class','zone__class_setup', $class);
    endif;
    
    <<< END

 */

/**
 * Template for Region class hooks 
 * Copy the following if you need to add a hook
 * 
  
  START >>>
  //  Region Content Second Class Hook  
  if ( !function_exists( 'custom_region__class' ) ) :
  function region__class_setup() {
    echo "grid_xx";
  }
  add_filter('region__class','region__class_setup', $class);
  endif; 
  <<< END
 
 */
 
 
/**  Container Hooks */
// Page Class Hook  */
if (!function_exists('custom_page_class')) {

  function page_class_setup($class) {
    if (!$class) {
      $class = "page clearfix"; // by default
    }    
    return apply_filters('page_class_setup', $class);
  }
  add_filter('page_class', 'page_class_setup', $class);

}

// Pagewidth Class Hook 
if (!function_exists('custom_pagewidth_class')) {

  function pagewidth_class_setup($class) {
    if (!$class) {
      $class = "pagewidth clearfix"; // by default
    }    
    return apply_filters('pagewidth_class_setup', $class);
  }
  add_filter('pagewidth_class','pagewidth_class_setup', 1);

}

// Pagewidth Class Hook 
if (!function_exists('custom_content_class')) {

  function content_class_setup($class) {
    if (!$class) {
      $class = "hentry entry content"; // by default
    }    
    return apply_filters('content_class_setup', $class);
  } 
  add_filter('content_class','content_class_setup', 1);

}

/**  Zone User Hooks */
//  User Class Hook 
if (!function_exists('custom_zone_user_class')) {

  function zone_user_class_setup($class) {
    if (!$class) $class = "zone";
    return print apply_filters('zone_user_class_setup', $class);
  }
  add_filter('zone_user_class','zone_user_class_setup', $class);

}

//  Header Class Hook 
if (!function_exists('custom_zone_header_class')) {

  function zone_header_class_setup($class) {
    if (!$class) $class = "zone";
    return print apply_filters('zone_header_class_setup', $class);
  }
  add_filter('zone_header_class','zone_header_class_setup', $class);

}

//  Zone Menu Class Hook
if (!function_exists('custom_zone_menu_class')) {

  function zone_menu_class_setup($class) {
    if (!$class) $class = "zone";
    return print apply_filters('zone_class_setup', $class);
  }
  add_filter('zone_menu_class','zone_menu_class_setup', $class);

}

//  Zone Content Class Hook
if (!function_exists('custom_zone_content_class')) {

  function zone_content_class_setup($class) {
    if (!$class) $class = "zone";
    return print apply_filters('zone_content_class_setup', $class);
  }
  add_filter('zone_content_class','zone_content_class_setup', $class);

}

//  Zone Footer Class Hook
if (!function_exists('custom_zone_footer_class')) {

  function zone_footer_class_setup($class) {
    if (!$class) $class = "zone";
    return print apply_filters('zone_footer_class_setup', $class);
  }
  add_filter('zone_footer_class','zone_footer_class_setup', $class);

}

//  Zone Meta Class Hook
if (!function_exists('custom_zone_meta_below_class')) {

  function zone_meta_class_setup( $class ) {
    if (!$class) $class = "zone";
    return print apply_filters('zone_meta_class_setup', $class);
  }
  add_filter('zone_meta_class','zone_meta_class_setup', $class);

}

//  Zone Sidebar Class Hook
if (!function_exists('zone_custom_sidebar_class')) {

  function zone_sidebar_class_setup( $class ) {
    if (!$class) {
      $class = "grid-4";
    }
    // Grid Class for Front Page
    if (is_front_page()) {
      $class = 'grid-4';
    }
    // Not Front or blog page
    if ( !is_front_page() || !is_home() ) {
      // Float your sidebar left
      $class = 'grid-4 bfl';
    }
    return print apply_filters('zone_sidebar_class_setup', $class);
  }
  add_filter('zone_sidebar_class','zone_sidebar_class_setup', $class);

}

/**
 * Augusta: Section  Classes
 * 
 * Section wraps regions
 * 
 */
/**  Section Header Class Hook */
if (!function_exists('custom_region_content_class')) {

  function section_content_class_setup($class) {
    if (!$class) $class = "container-16";
    return apply_filters('section_content_class_setup', $class);
  }
  add_filter('section_content_class','section_content_class_setup', $class);

}

/**
 * Augusta: Regions Classes
 */
/**  Region Header Class Hook */
if (!function_exists('custom_region_header_class')) {

  function region_header_class_setup($class) {
    if (!$class) $class = "region";
    return apply_filters('region_header_class_setup', $class);
  }
  add_filter('region_header_class','region_header_class_setup', $class);

}

/**  Region Content Class Hook */
if (!function_exists('custom_region_menu_class')) {

  function region_menu_class_setup($class) {
    if (!$class) $class = "container-16";
    return print apply_filters('region_menu_class_setup', $class);
  }
  add_filter('region_menu_class','region_menu_class_setup', $class);

}

/**  Region Content Class Hook */
if (!function_exists('custom_region_content_class')) {

  function region_content_class_setup($class) {
    if (!$class) $class = "region";
    return print apply_filters('region_content_class_setup', $class);
  }
  add_filter('region_content_class','region_content_class_setup', $class);

}

/**  Region Footer Class Hook */
if (!function_exists('custom_region_footer_class')) {

  function region_footer_class_setup($class) {
    if (!$class) $class = "region";
    return print apply_filters('region_footer_class_setup', $class);
  }
  add_filter('region_footer_class','region_footer_class_setup', $class);

}
