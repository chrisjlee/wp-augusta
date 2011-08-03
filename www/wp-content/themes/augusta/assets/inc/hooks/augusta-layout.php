<?php
/**
 * @package Wordpress
 * @subpackage Augusta
 * @author Chris J. Lee - iam@chrisjlee.net
 * @contributor Felipe Rocha  
 * @description File Contains the necessary setup 
 * initialization for hooks, auto loading 
 * the necessary files as well as  creating constants
 * 
 */ 
 
/**
 * Augusta Layout Start
 * 
 * These functions wrap the content area
 * Layout start begins usually with two divs
 * #page, #pagewidth
 * 
 * This is where you can add additional 
 * wrappers. Just make sure you add a closing <div>
 * in the augusta_layout_end_setup().
 * 
 * Uses child function custom_layout_start_setup() 
 * to be overriden by a child theme/function
 * 
 */ 

if (!function_exists('custom_header_start_setup')) :
function augusta_header_setup($output) {
  $class = do_action('region_header_class_setup');
  if (!$output) {
    $output = "<!--Augusta Region Start-->\n<div id='region-header' class='" . $class . "'></div>";
  }
  echo $output = apply_filters('augusta_header_setup', $output);
}
add_filter('augusta_header', 'augusta_header_setup', $output);
endif;

/**
 * Augusta Layout Start
 * 
 * This function usually contains the 
 * <div>'s necessary to close #page, #pagewidth  
 *
 * This function also allows you the flexibility 
 * to add any markup that always proceeds the closing tags of
 * #page and #pagewidth 
 */ 
if (!function_exists('custom_layout_start_setup')) :
function augusta_layout_start_setup($output) {
  if (!$output) {
    $class = do_action('page_class'); 
    $output  = '<!--Augusta Layout Start--><div id="page" class="page clearfix">';
    $class = do_action('pagewidth_class');
    $output .= '<div id="pagewidth" class="pagewidth clearfix">';
  }
  apply_filters('augusta_layout_start_setup', $output);
}
add_filter('augusta_layout_start', 'augusta_layout_start_setup', $output);
endif;

/**
 * Augusta Layout End
 * 
 * This function usually contains the 
 * <div>'s necessary to close #page, #pagewidth  
 *
 * This function also allows you the flexibility 
 * to add any markup that always proceeds the closing tags of
 * #page and #pagewidth 
 */ 
if (!function_exists('custom_layout_end_setup') ) :
function augusta_layout_end_setup($output) {
  if (!$output) { 
    $output  = '</div>';
    $output  .= '</div><!--Augusta Layout End-->';
  }
  echo apply_filters('augusta_layout_end_setup', $output);
}
add_action('augusta_layout_end', 'augusta_layout_end_setup');
endif;

/**
 * Augusta Loop Before Setup 
 * 
 * Add Conditional logic 
 * here with built in wordpress
 * conditionals like is_front_page(), is_page(), etc. to display 
 * parts of the loop differently
 * 
 */
if (!function_exists('custom_loop_before_setup') ) :
function augusta_loop_before_setup($output) { 
  if ( is_front_page() ) {
    $output  ="<div id='content-post' class='hentry entry'>";
  } else  {
    $output  ="<div id='content-post' class='hentry entry'>";
  }
  return apply_filter ('augusta_loop_before','augusta_loop_before_setup', $output);  
}
add_filter('augusta_loop_before', $output);
endif;

/**
 * Augusta Loop After
 *  
 * Add Conditional logic 
 * here with built in wordpress
 * conditionals like is_front_page(), is_page(), etc. to display 
 * parts of the loop differently
 * 
 */
if (!function_exists('custom_loop_after_setup') ) :
function augusta_loop_after_setup() {
  
  $output = "</div>";
  
  return apply_filter ('augusta_loop_before','augusta_loop_before_setup', $output);  
}
add_filter ('augusta_loop_after', 'augusta_loop_after_setup');
endif;

if ( !function_exists('custom_meta_setup') ) :
function augusta_meta_setup() {
  // Do something
}
add_action('augusta_meta','augusta_meta_setup');
endif;
add_action('augusta_meta', 'grs_generator', 50);


