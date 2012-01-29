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

/*
 * Implements augusta_doctype
 * 
 * This is called to change the classes of wordpress'
 * body_class() function 
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
 * By default augusta is a xhtml 1.0 theme.
 * 
 * $content - filterable variable
 *  
 */
if (!function_exists( 'custom_doctype_setup' ) ) :
function augusta_doctype_setup($output) {
  // Add Opengraph -  http://developers.facebook.com/docs/opengraph/
  $fb ="\nxmlns:og='http://ogp.me/ns#'\nxmlns:fb='http://www.facebook.com/2008/fbml'";
  $fb ='';
  
  $output = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"' . $fb . '>' . "\n";
  $output .= '<!--[if IE 6]><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" class="ie6 no-js" ' . $fb . '><![endif]--> '. "\n";
  $output .= '<!--[if lt IE 7]><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" class="ie ie6 lte9 lte8 lte7 no-js" ' . $fb . '><![endif]-->' . "\n";
  $output .= '<!--[if IE 7]><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" class="ie ie7 lte9 lte8 lte7 no-js" ' . $fb . '> <![endif]-->' . "\n";
  $output .= '<!--[if IE 8]><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" class="ie ie8 lte9 lte8 no-js" ' . $fb . '><![endif]-->' . "\n";
  $output .= '<!--[if IE 9]><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" class="ie ie9 lte9 no-js" ' . $fb . '><![endif]-->' . "\n";
  $output .= '<!--[if gt IE 9]><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" class="gtie9 ie9 no-js" ' . $fb . '><![endif]-->' . "\n";
  $output .= '<!--[if !IE]><!--> <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" class="not-ie no-js" ' . $fb . '> <!--<![endif]-->' . "\n\n";
  $output .= "\n";
  $output .= '<!-- END Augusta Doctype Setup: helper.php -->' . "\n\n";
  
  return print apply_filters('augusta_doctype_setup', $output);
}
add_action('augusta_doctype', 'augusta_doctype_setup');
endif;

/**
 * Child Theme Function: 
 * Copy the following below to convert 
 * a child theme to HTML5

// Change the doctype
function childtheme_doctype_setup($content) {
  $output = '<!DOCTYPE html>';
  $output .= "\n";
  $output .= '<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]-->';
  $output .= '<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]-->'
  $output .= '<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]-->';
  $output .= '<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]-->';
  $output .= '<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" manifest="default.appcache?v=1" lang="en">';
  return $output;
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
if (!function_exists('custom_title_setup')) {
  function augusta_title_setup() {
    $separator  = '|';
    $blog_name  = get_bloginfo('name');
   
    if((!is_paged()) && (is_single() || is_page() || is_home() || is_category())) $follow_content = 'index, follow';
    else $follow_content = 'noindex, follow, noodp, noydir';
   
    if ((is_single() || is_page())) {
        $page_title = the_title('','', FALSE);
    }
    elseif (is_category()) {
        $page_title = 'Category: '.single_cat_title('', FALSE);
    }
    elseif (is_tag()) {
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
    
    return print apply_filters('augusta_title_setup',$page_title);
  }

  add_action('augusta_title', 'augusta_title_setup');

}

/*
 * Implements augusta_page_title
 * 
 * This is called in the content area 
 * This function allows the creation of a
 * page title which is often helpful for seo, etc.
 * 
 * @param
 */
if (!function_exists('custom_page_title_setup')) {
  function augusta_page_title_setup() {
    global $post;
    
    $content = '';
    if (is_attachment()) {
        $content .= '<h2 class="page-title"><a href="';
        $content .= apply_filters('the_permalink',get_permalink($post->post_parent));
        $content .= '" rev="attachment"><span class="meta-nav">&laquo; </span>';
        $content .= get_the_title($post->post_parent);
        $content .= '</a></h2>';
    }
    elseif (is_author()) {
        $content .= '<h1 class="page-title author">';
        $author = get_the_author_meta( 'display_name' );
        $content .= __('Author Archives: ', 'thematic');
        $content .= '<span>';
        $content .= $author;
        $content .= '</span></h1>';
    }
    elseif (is_category()) {
        $content .= '<h1 class="page-title">';
        $content .= __('Category Archives:', 'thematic');
        $content .= ' <span>';
        $content .= single_cat_title('', FALSE);
        $content .= '</span></h1>' . "\n";
        $content .= '<div class="archive-meta">';
        if ( !(''== category_description()) ) : $content .= apply_filters('archive_meta', category_description()); endif;
        $content .= '</div>';
    }
    elseif (is_search()) {
        $content .= '<h1 class="page-title">';
        $content .= __('Search Results for:', 'thematic');
        $content .= ' <span id="search-terms">';
        $content .= esc_html(stripslashes($_GET['s']));
        $content .= '</span></h1>';
    }
    elseif (is_tag()) {
        $content .= '<h1 class="page-title">';
        $content .= __('Tag Archives:', 'thematic');
        $content .= ' <span>';
        $content .= __(thematic_tag_query());
        $content .= '</span></h1>';
    }
    elseif (is_tax()) {
        global $taxonomy;
        $content .= '<h1 class="page-title">';
        $tax = get_taxonomy($taxonomy);
        $content .= $tax->labels->name . ' ';
        $content .= __('Archives:', 'thematic');
        $content .= ' <span>';
        $content .= thematic_get_term_name();
        $content .= '</span></h1>';
    }
    elseif (is_day()) {
        $content .= '<h1 class="page-title">';
        $content .= sprintf(__('Daily Archives: <span>%s</span>', 'thematic'), get_the_time(get_option('date_format')));
        $content .= '</h1>';
    }
    elseif (is_month()) {
        $content .= '<h1 class="page-title">';
        $content .= sprintf(__('Monthly Archives: <span>%s</span>', 'thematic'), get_the_time('F Y'));
        $content .= '</h1>';
    }
    elseif (is_year()) {
        $content .= '<h1 class="page-title">';
        $content .= sprintf(__('Yearly Archives: <span>%s</span>', 'thematic'), get_the_time('Y'));
        $content .= '</h1>';
    }
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
        $content .= '<h1 class="page-title">';
        $content .= __('Blog Archives', 'thematic');
        $content .= '</h1>';
    }
    $content .= "\n";
    echo apply_filters('augusta_page_title', $content);
  }

  // augusta_page_title() is found in the /assets/loops files
  add_action('augusta_page_title', 'augusta_page_title_setup');
}

/*
 * Augusta: Built in Plus one
 * 
 * Stolen from : http://otto42.com/9j
 * 
 * 
 * 
 */
function augusta_ext_plus_one() {
  if (defined(CONFIG_GPLUSONE)) {
    add_filter('the_content', 'google_plusone');
    function google_plusone($content) {
      $content = $content.'<div class="plusone"><g:plusone size="tall" href="'.get_permalink().'"></g:plusone></div>';
      return $content;
    }
    
    add_action ('wp_enqueue_scripts','google_plusone_script');

    function google_plusone_script() {
      wp_enqueue_script('google-plusone', 'https://apis.google.com/js/plusone.js', array(), null);
    }
  }
}
/**
 * Augusta Analytics Setup
 * 
 * From the augusta/assets/settings.php 
 * file it'll look for that particular key
 * and figure out if it needs to be displayed
 * 
 */

function augusta_analytics_setup() {
  if (CONFIG_ANALYTICS == false) return;
  // Add analytics only if it's been turned on in the augusta/assets/settings.php file
  if (CONFIG_ANALYTICS == true) get_template_part('/assets/layout/block', 'analytics');
}

add_action('augusta_setup','augusta_analytics_setup');
  
/*
function augusta_fb_log($var) {
 $output  = '<script>console.log(';
 $output .= $var;
 $output .= ')</script>';
}
add_action('wp_footer', 'augusta_fb_log' );
augusta_fb_log('test');
*/

/**
 * Augusta JS Loading
 * 
 * Allows you to run  specific 
 * scripts to stage while javascript
 * is still loading
 *   
 */
function augusta_js_loading  () {
?>
  <!-- Called from Helper.php -->
  <script type='text/javascript'>
  // Called from Helper
  if ( typeof jQuery !== undefined || typeof jQuery != undefined || jQuery ) {
    jQuery(document).ready(function () {
     jQuery('html').removeClass('no-js');
     jQuery('html').removeClass('js-loading');
     jQuery('html').addClass('js')
     jQuery('window').bind('load', function() {
       jQuery('html').removeClass('js-loading');
       jQuery('html').addClass('js-loaded')
     });
   });
  }
  </script>
  <?php
} 
add_action('wp_footer', 'augusta_js_loading', 100);
