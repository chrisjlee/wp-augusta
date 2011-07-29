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

/*
 * Implements augusta_doctype
 * 
 * This is called in the header.php 
 * this can be modified in your child theme to 
 * allow convert a theme to html5
 * 
 * By default augusta is a html theme.
 * 
 * $content - filterable variable
 *  
 */
if (!function_exists( 'custom_doctype_setup' ) ) :
function augusta_doctype_setup() {
  $content = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">' . "\n";
$content .= '<!--[if IE 6]><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" class="ie6 no-js"><![endif]-->
<!--[if lt IE 7]><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" class="ie ie6 lte9 lte8 lte7 no-js"><![endif]-->
<!--[if IE 7]><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" class="ie ie7 lte9 lte8 lte7 no-js"> <![endif]-->
<!--[if IE 8]><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" class="ie ie8 lte9 lte8 no-js"><![endif]-->
<!--[if IE 9]><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" class="ie ie9 lte9 no-js"><![endif]-->
<!--[if gt IE 9]><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" class="gtie9 ie9 no-js"><![endif]-->
<!--[if !IE]><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" class="not-ie no-js"><!--<![endif]-->
<head profile="http://gmpg.org/xfn/11">';
  echo apply_filters('augusta_doctype_setup', $content);
}
add_action('augusta_doctype', 'augusta_doctype_setup');
endif;

/**
 * Child Theme Function: 
 * Copy the following below to convert 
 * a child them to HTML5

// Change the doctype
function childtheme_doctype_setup($content) {
  $content = '<!DOCTYPE html>';
  $content .= "\n";
  $content .= '<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]-->
  <!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]-->
  <!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]-->
  <!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]-->
  <!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" manifest="default.appcache?v=1"';
  return $content;
}
   
 *
 */


/*
 * Implements augusta_title
 * 
 * This is called in the header.php 
 * august_title_setup can be called 
 * to change the title
 * 
 * By default augusta is a html theme.
 *  
 */
if ( !function_exists( 'custom_title_setup' ) ) :
function augusta_title_setup() {
  $separator  = '|';
  $blog_name  = get_bloginfo('name');
 
  if( (!is_paged() ) && ( is_single() || is_page() || is_home() || is_category())) $follow_content = 'index, follow';
  else $follow_content = 'noindex, follow, noodp, noydir';
 
  if ( (is_single() || is_page()) ) {
      $page_title = the_title('','', FALSE);
  }
  elseif (is_category()) {
      $page_title = 'Category: '.single_cat_title('', FALSE);
  }
  elseif ( is_tag() ) {
      $page_title  = 'Tag: '.single_tag_title('', FALSE);
  }
  elseif (is_date()) {
      $page_title = 'Post of ';
      if (is_day()) {
          $page_title .= get_the_time('j F Y', FALSE);
      }
      elseif (is_month()) {
          $page_title .= get_the_time('F Y', FALSE);
      }
      elseif (is_year()) {
          $page_title .= get_the_time('Y', FALSE);
      }
  }
  elseif (is_search()) {
       $page_title = 'Search results for: '.$_GET['s'];
  }
  if ($page_title != '') $page_title .= ' '.$separator.' ';
 $page_title .= $blog_name;
  
  echo apply_filters('augusta_title_setup',$page_title);
}
add_action('augusta_title', 'augusta_title_setup');
endif;
