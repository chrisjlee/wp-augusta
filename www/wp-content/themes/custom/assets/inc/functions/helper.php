<?php
/**
 * @package WordPress
 * @subpackage Augusta
 * @author Chris J. Lee - iam@chrisjlee.net
 * @contributor Felipe Rocha
 * @since Augusta v1.0.0
 * 
 * Contains helper functions and common
 * processes that need to be overriden with
 * all Wordpress sites
 * 
 */

 
// "Borrowed" from: http://coding.smashingmagazine.com/2009/08/18/10-useful-wordpress-hook-hacks/ 
function augusta_browser_body_class($classes) {
  global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

  if($is_lynx) $classes[] = 'lynx';
  elseif($is_gecko) $classes[] = 'gecko';
  elseif($is_opera) $classes[] = 'opera';
  elseif($is_NS4) $classes[] = 'ns4';
  elseif($is_safari) $classes[] = 'safari';
  elseif($is_chrome) $classes[] = 'chrome';
  elseif($is_IE) $classes[] = 'ie';
  else $classes[] = 'unknown';

  if($is_iphone) $classes[] = 'iphone';
  return $classes;
}

add_filter('body_class','augusta_browser_body_class');