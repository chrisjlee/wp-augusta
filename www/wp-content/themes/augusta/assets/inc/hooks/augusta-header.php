<?php
/**
 * @package Wordpress
 * @subpackage Augusta
 * @author Chris J. Lee - iam@chrisjlee.net
 * @contributor Felipe Rocha
 * 
 */

function region_header_setup() {
  $output = '<div id="logo"></div>';
  return apply_filter('region_header_setup',$output);
}
add_filter('region_header','region_header_setup');