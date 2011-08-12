<?php 
/**
 * @package Wordpress
 * @subpackage Augusta
 * @author Chris J. Lee - iam@chrisjlee.net
 * @contributor Felipe Rocha  
 */

 
/**
 * Augusta Meta Before
 * Opens #region-header You can rewrite this to add another wrapper
 * 
 */
if ( !function_exists('custom_meta_before_setup') ) :
function augusta_meta_before_setup($output='', $class='') {
  // If output = 0 it turns this zone off
  // Utilize region_meta_class hook
  $class = meta_class();
  if (!$class) $class = "container-16";
  if (!$output) {
    $output = "<!--Augusta Meta Region Start-->\n<div id='region-meta' class='" . $class . "'>";
  }
  return print apply_filters('augusta_meta_before_setup', $output, $class);
} add_filter('augusta_meta_before', 'augusta_meta_before_setup', $output, $class);
endif;

/**
 * Augusta Meta Before
 * Closes header. You can rewrite this to add another wrapper
 * 
 */ 
if ( !function_exists('custom_meta_after_setup') ) :
function augusta_meta_after_setup($output='') {
  if (!$output) {
    $output = "\n</div><!--Augusta Meta END-->\n";
  }
  return print apply_filters('augusta_meta_after_setup', $output);
} add_filter('augusta_meta_after', 'augusta_meta_after_setup', $output);
endif;
