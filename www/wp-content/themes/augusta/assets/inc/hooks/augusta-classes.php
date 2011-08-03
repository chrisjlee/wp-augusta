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
    add_action('zone__class','zone__class_setup');
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
  add_action('region__class','region__class_setup');
  endif; 
  <<< END
 
 */
 
 
/**  Container Hooks */
// Page Class Hook  */
if ( !function_exists('custom_page_class') ) :
  function page_class_setup($output) {
    if (!$class) {
      $default = "page"; // by default
    }    
    return print apply_filters('page_class_setup', $class);
  }
  add_action('page_class','page_class_setup');
endif;

// Pagewidth Class Hook 
if ( !function_exists('custom_pagewidth_class') ) :
  function pagewidth_class_setup($class) {
    if (!$class) {
      $default = ""; // by default
    }    
    return print apply_filters('pagewidth_class_setup', $class)  ;
  }
  add_action('pagewidth_class','pagewidth_class_setup', 1);
endif;


/**  Zone User Hooks */
//  User Class Hook 
if ( !function_exists('custom_zone_user_class') ) :
function zone_user_class_setup() {
  echo "container_16 zone";
}
add_action('zone_user_class','zone_user_class_setup');
endif;

/**  Zone Header Hooks */
//  Header Class Hook 
if ( !function_exists('custom_zone_header_class') ) :
function zone_header_class_setup() {
  echo "container_16 zone";
}
add_action('zone_header_class','zone_header_class_setup');
endif;

/**  Zone Menu Hooks */
//  Zone Menu Class Hook
if (!function_exists('custom_zone_menu_class')) :
function zone_menu_class_setup() {
  echo "container_16 zone";
}
add_action('zone_menu_class','zone_menu_class_setup');
endif;

//  Zone Menu Class Hook
if (!function_exists('custom_zone_content_above_class')) :
function zone_content_above_class_setup() {
  echo "container_16 zone";
}
add_action('zone_content_above_class','zone_content_above_setup');
endif;

/**  Zone Content Hooks */
//  Zone Content Class Hook
if (!function_exists('custom_zone_content_class')) :
function zone_content_class_setup() {
  echo "container_16 zone";
}
add_action('zone_content_class','zone_content_class_setup');
endif;

//  Zone Content Below Class Hook
if (!function_exists('custom_zone_content_below_class')) :
function zone_content_below_class_setup() {
  echo "container_16";
}
add_action('zone_content_below_class','zone_content_below_class_setup');
endif;

//  Zone Footer Class Hook
if (!function_exists('custom_zone_footer_class')) :
function zone_footer_class_setup() {
  echo "container_16 zone";
}
add_action('zone_footer_class','zone_footer_class_setup');
endif;

//  Zone Meta Class Hook
if (!function_exists('custom_zone_meta_below_class')) :
function zone_meta_below_class_setup() {
  echo "container_16 zone";
}
add_action('zone_meta_class','zone_meta_class_setup');
endif;


 /** 
 * Region Class Hooks
 * 
 * Regions are parts that make up zones 
 * 
 */
//  Region Content First Class Hook  
if ( !function_exists( 'custom_region_header_class' ) ) :
function region_header_class_setup($output) {
  $output = "grid_xx";
  if (!$output) return apply_filter('region_header_class', 'region_header_class_setup', $output);
}
add_filter('region_header_class','region_header_class_setup');
endif;


//  Region Content First Class Hook  
if ( !function_exists( 'custom_region_content_first_class' ) ) :
function region_content_first_class_setup() {
  echo "grid_xx";
}
add_action('region_content_first_class','region_content_first_class_setup');
endif;

//  Region Content Second Class Hook  
if ( !function_exists( 'custom_region_content_second_class' ) ) :
function region_content_second_class_setup() {
  echo "grid_xx";
}
add_action('region_content_second_class','region_content_second_class_setup');
endif;

//  Region Content Third Class Hook  
if ( !function_exists( 'custom_region_content_third_class' ) ) :
function region_content_third_class_setup() {
  echo "grid_xx";
}
add_action('region_content_third_class','region_content_third_class_setup');
endif;

// @todo - dynamic hook generation 
// $zones = array();
// $zones = array('page','pagewidth','header','content','content_above','content_below');
// while (list(, $value) = each($zones)) {
  // //$fn = 'zone_{$value}_class_setup';
  //add_action('zone_{$value}_class','zone_{$value}_class_setup' );
// }