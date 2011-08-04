<?php
/**
 * @package Wordpress
 * @subpackage Augusta
 * @author Chris J. Lee - iam@chrisjlee.net
 * @contributor Felipe Rocha  
 */

/**
 * Augusta Footer Before
 * Opens #region-header You can rewrite this to add another wrapper
 * 
 */
if ( !function_exists('custom_footer_before_setup') ) :
function augusta_footer_before_setup($output='', $class='') {
  // If output = 0 it turns this zone off
  if ($output === 0) return; 
  
  // Utilize region_footer_class hook
  $_class = do_action('region_footer_class');
  if ( !empty($_class) ) $_class = $class;
  if (!$class) $class = "container-16";
  if (!$output) {
    $output = "<!--Augusta Footer Region Start-->\n<div id='region-footer' class='" . $class . "'>";
  }
  return print apply_filters('augusta_footer_before_setup', $output, $class);
}
add_filter('augusta_footer_before', 'augusta_footer_before_setup', $output, $class);
endif;

/**
 * Augusta Footer Before
 * Closes header. You can rewrite this to add another wrapper
 * 
 */ 
if ( !function_exists('custom_footer_after_setup') ) :
function augusta_footer_after_setup($output='') {
  if ($output === 0) return; 
  if (!$output) {
    $output = "\n</div><!--Augusta Footer END-->\n";
  }
  return print apply_filters('augusta_footer_after_setup', $output);
}
add_filter('augusta_footer_after', 'augusta_footer_after_setup', $output);
endif;

/**
 * Augusta Footer 
 * Router function that loads the template file.
 * can be overriden by function to load 
 * a different file 
 * 
 */ 
if ( !function_exists('custom_footer_start_setup') ) :
function augusta_footer_setup() {
  do_action('augusta_footer_after_setup');
  get_template_part ('assets/layout/region/region','footer');
  do_action('augusta_footer_before_setup');
}
add_filter('augusta_footer', 'augusta_footer_setup');
endif;

if ( !function_exists('custom_meta_setup') ) :
function augusta_meta_setup() {
  get_template_part('assets/layout/region/region', 'meta');
}
add_action('augusta_meta','augusta_meta_setup');
endif;
add_action('augusta_meta', 'grs_generator', 50);

 
