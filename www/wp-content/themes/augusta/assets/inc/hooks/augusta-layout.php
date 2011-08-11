<?php
/**
 * @package Wordpress
 * @subpackage Augusta
 * @author Chris J. Lee - iam@chrisjlee.net
 * @contributor Felipe Rocha  
 * 
 * File Contains the necessary setup 
 * initialization for hooks, auto loading 
 * the necessary files as well as  creating constants.
 * 
 * This part actions more like a router. 
 * It will call the appropriate 
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

if (!function_exists('custom_layout_before_setup')) :
function augusta_layout_before_setup($output) {
  if ($output == 0) return;
  if (!$output) {
    $class = page_class(); 
    $output  = '<!--Augusta Layout Start--><div id="page" class="' . $class . ' page clearfix">';
    $class = pagewidth_class();
    $output .= '<div id="pagewidth" class=" ' . $class . 'pagewidth clearfix">';
  }
  return print apply_filters('augusta_layout_before_setup', $output);
}
add_filter('augusta_layout_before', 'augusta_layout_before_setup', $output);
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
if (!function_exists('custom_layout_after_setup') ) :
function augusta_layout_after_setup($output) {
  if ($output == 0) return;
  if (!$output) { 
    $output  = '</div>';
    $output  .= '</div><!--Augusta Layout End-->';
  }
  return print apply_filters('augusta_layout_after_setup', $output);
}
add_filter('augusta_layout_after', 'augusta_layout_after_setup');
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
    $output  = "<div id='content' class='hentry entry content'><div id='main' class='main'>";
  } else  {
    $output  = "<div id='content' class='hentry entry content'><div id='main' class='main'>";
  }
  return print apply_filters ('augusta_loop_before_setup', $output);  
}
add_filter('augusta_loop_before', 'augusta_loop_before_setup', $output);
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
function augusta_loop_after_setup ( $output ) {
  $output = "</div><!--/END #main-->\n</div><!--/END #content-->\n";
  return print apply_filters('augusta_loop_before_setup', $output);  
}
add_filter ('augusta_loop_after', 'augusta_loop_after_setup', $output);
endif;
