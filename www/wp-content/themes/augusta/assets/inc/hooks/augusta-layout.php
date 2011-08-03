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
if (!function_exists('custom_layout_start_setup')) :
function augusta_layout_start_setup($output) {
  if (!$output) {
    $class = do_action('page_class'); 
    $output  = '<!--Augusta Layout Start--><div id="page" class="' . $class . '">';
    $class = do_action('pagewidth_class');
    $output .= '<div id="pagewidth" class="' . $class . '">';
  }
  echo apply_filters('augusta_layout_start_setup', $output);
add_action ('augusta_layout_start', 'augusta_layout_start_setup');
}
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
 * Augusta Content Setup
 * @todo documentating
 */
function augusta_content_setup() {
  get_template_part('assets/layout/loop/loop');
}
add_action ('augusta_content', 'augusta_content_setup');

/**
 * Augusta Content Single Setup
 * @todo documentating
 */
function augusta_content_single_setup() {
  get_template_part('assets/layout/loop/loop', 'single');
}
add_action ('augusta_content_single', 'augusta_content_single_setup');

/**
 * Augusta Loop Before 
 * @todo documentating
 */
if (!function_exists('custom_loop_before_setup') ) :
function augusta_loop_before_setup() { 
  if ( is_front_page() ) {
  ?>
  <div id="entries" class="hentry entry">
  <?php }
  else  { ?>
  <div id="entry" class="hentry entry"  
  <?php }
  add_action ('augusta_loop_before', 'augusta_loop_before_setup');
}
endif;

/**
 * Augusta Loop After 
 * @todo documentating
 */
if (!function_exists('custom_loop_after_setup') ) :
function augusta_loop_after_setup() {
  echo "</div>";
}
endif;
add_action ('augusta_loop_after', 'augusta_loop_after_setup');

