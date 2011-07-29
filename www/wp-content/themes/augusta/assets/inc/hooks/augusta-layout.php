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
if (!function_exists('augusta_layout_start_setup') ) :
page_class();
function augusta_layout_start_setup($output) {
  if (!$output) { 
    $output  = '<div id="page" class="' . do_action('page_class') . '">';
    $output .= '<div id="pagewidth" class="' . do_action('page_class') . '">';
  }
  echo apply_filters('augusta_layout_start_setup', $output);
}
add_action ('augusta_layout_start', 'augusta_layout_start_setup');
endif;

if (!function_exists('augusta_layout_end_setup') ) :
function augusta_layout_end_setup($output) {
  if (!$output) { 
    $output  = '</div>';
    $output  .= '</div>';
  }
  echo apply_filter('augusta_layout_end_setup', $output);
}
add_action('augusta_layout_end', 'augusta_layout_end_setup()');
endif;

function augusta_content_setup() {
  get_template_part('assets/layout/loop/loop');
}
add_action ('augusta_content', 'augusta_content_setup');