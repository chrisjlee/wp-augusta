<?php
/**
 * 
 * @package Wordpress
 * @subpackage Augusta
 * @author Chris J. Lee - iam@chrisjlee.net
 * @contributor Felipe Rocha
 * 
 */

/**
 * Augusta Header Before
 * Opens #region-header You can rewrite this to add another wrapper
 * 
 */
if ( !function_exists('custom_header_before_setup') ) :
function augusta_header_before_setup($output='', $class='') {
  // If output = 0 it turns this zone off
  if ($output == 0) return; 
  
  // Utilize region_header_class hook
  $_class = do_action('region_header_class');
  if ( !empty($_class) ) $_class = $class;
  if (!$class) $class = "grid-16";
  if (!$output) {
    $output = "<!--Augusta Region Start-->\n<div id='region-header' class='" . $class . "'>";
  }
  return print apply_filters('augusta_header_before_setup', $output, $class);
}
add_filter('augusta_header_before', 'augusta_header_before_setup', $output, $class);
endif;

/**
 * Augusta Header Before
 * Closes header. You can rewrite this to add another wrapper
 * 
 */ 
if ( !function_exists('custom_header_after_setup') ) :
function augusta_header_after_setup($output='') {
  if ($output == 0) return; 
  if (!$output) {
    $output = "\n</div><!--Augusta Header END-->\n";
  }
  return print apply_filters('augusta_header_after_setup', $output);
}
add_filter('augusta_header_after', 'augusta_header_after_setup', $output);
endif;

// Augusta Header 
if ( !function_exists('custom_header_start_setup') ) :
function augusta_header_setup() {
  get_template_part ('assets/layout/region/region','header');
}
add_filter('augusta_header', 'augusta_header_setup');
endif;

/**
 * Augusta Default Header Blocks
 * Blocks that are contained in Regions
 * 
 */
if (CONFIG_LOGO == true) :
  function block_logo_setup($output) {
    get_template_part('assets/layout/blocks/block', 'logo');
  }
  add_filter('block_logo','block_logo_setup');
  function block_logo_part_setup($output) {
    $url = get_bloginfo('url');
    $output = '<div id="logo" class="logo"><a href="' . $url . '"><img src="'. AUGDIR . '/assets/images/logo.jpg"></a></div>';
    return print apply_filters('block_logo_setup',$output);
  }
  add_filter('block_logo_part','block_logo_part_setup');
endif;


