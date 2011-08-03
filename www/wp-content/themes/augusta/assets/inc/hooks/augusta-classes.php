<?php /**
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
      echo "container_16";
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
if ( !function_exists('custom_page_class') ) :
  function page_class_setup($class) {
    if (!$class) {
      $class = "page clearfix"; // by default
    }    
    return apply_filters('page_class_setup', $class);
  }
  add_filter('page_class','page_class_setup', 10, 1);
endif;

// Pagewidth Class Hook 
if ( !function_exists('custom_pagewidth_class') ) :
  function pagewidth_class_setup($class) {
    if (!$class) {
      $class = "pagewidth clearfix"; // by default
    }    
    return apply_filters('pagewidth_class_setup', $class)  ;
  }
add_filter('pagewidth_class','pagewidth_class_setup', 1);
endif;

/**  Zone User Hooks */
//  User Class Hook 
if ( !function_exists('custom_zone_user_class') ) :
function zone_user_class_setup($class) {
  $class="container_16 zone";
  return print apply_filters('zone_user_class_setup', $class);
}
add_filter('zone_user_class','zone_user_class_setup', $class);
endif;

/**  Zone Header Hooks */
//  Header Class Hook 
if ( !function_exists('custom_zone_header_class') ) :
function zone_header_class_setup($class) {
  $class = "container_16 zone";
  return print apply_filters('zone_header_class_setup', $class);
}
add_filter('zone_header_class','zone_header_class_setup', $class);
endif;

/**  Zone Menu Hooks */
//  Zone Menu Class Hook
if (!function_exists('custom_zone_menu_class')) :
function zone_menu_class_setup($class) {
  $class = "container_16 zone";
  return print apply_filters('zone_class_setup', $class);
}
add_filter('zone_menu_class','zone_menu_class_setup', $class);
endif;

//  Zone Menu Class Hook
if (!function_exists('custom_zone_content_above_class')) :
function zone_content_above_class_setup($class) {
  $class = "container_16 zone";
  return print apply_filters('zone_content_above_class_setup', $class);
}
add_filter('zone_content_above_class','zone_content_above_setup');
endif;

/**  Zone Content Hooks */
//  Zone Content Class Hook
if (!function_exists('custom_zone_content_class')) :
function zone_content_class_setup($class) {
  $class = "container_16 zone";
  return print apply_filters('zone_content_class_setup', $class);
}
add_filter('zone_content_class','zone_content_class_setup', $class);
endif;

//  Zone Content Below Class Hook
if (!function_exists('custom_zone_content_below_class')) :
function zone_content_below_class_setup($class) {
  $class = "container_16 zone";
  return apply_filters('zone_content_below_class_setup', $class);
}
add_filter('zone_content_below_class','zone_content_below_class_setup', $class);
endif;

//  Zone Footer Class Hook
if (!function_exists('custom_zone_footer_class')) :
function zone_footer_class_setup($class) {
  $class = "container_16 zone";
  return print apply_filters( 'zone_footer_class_setup', $class );
}
add_filter('zone_footer_class','zone_footer_class_setup', $class);
endif;

//  Zone Meta Class Hook
if (!function_exists('custom_zone_meta_below_class')) :
function zone_meta_class_setup( $class ) {
  $class = "container_16 zone";
  return apply_filters('zone_meta_class','zone_meta_class_setup', $class);
}
add_filter('zone_meta_class','zone_meta_class_setup', $class);
endif;

// 
 // /** 
 // * Region Class Hooks
 // * 
 // * Regions are parts that make up zones 
 // * 
 // */
// //  Region Content First Class Hook  
// if ( !function_exists( 'custom_region_header_class' ) ) :
// function region_header_class_setup($output) {
  // $output = "grid_xx";
  // if (!$output) return apply_filter('region_header_class_setup', $output);
// }
// add_filter('region_header_class','region_header_class_setup', $class);
// endif;
// 
// 
// //  Region Content First Class Hook  
// if ( !function_exists( 'custom_region_content_first_class' ) ) :
// function region_content_first_class_setup() {
  // $output =  "grid_xx";
  // return apply_filter('region_content_first_class_setup', $output);
// }
// add_filter('region_content_first_class','region_content_first_class_setup', $class);
// endif;
// 
// //  Region Content Second Class Hook  
// if ( !function_exists( 'custom_region_content_second_class' ) ) :
// function region_content_second_class_setup($output) {
  // if (!$output) $output = "grid_xx";
  // return apply_filter('region_content_second_class_setup', $output);
// }
// add_filter('region_content_second_class','region_content_second_class_setup', $class);
// endif;
// 
// //  Region Content Third Class Hook  
// if ( !function_exists( 'custom_region_content_third_class' ) ) :
// function region_content_third_class_setup() {
  // echo "grid_xx";
  // return apply_filter('region_content_third_class_setup', $output);
// }
// add_filter('region_content_third_class','region_content_third_class_setup', $class);
// endif;