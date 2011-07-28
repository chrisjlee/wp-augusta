<?php 
/*  @package Wordpress
 *  @subpackage Augusta
 *  description: file loads all the scripts and stylesheets  
 *  @version: 1.3 
 *  @author: Chris J. Lee
 */

/** Obtain URL For stylesheet */
if ( is_child_theme() ) $themeurl = get_bloginfo('stylesheet_directory'); 
else $themeurl = get_bloginfo('template_directory');

/* 
 * Setup Folder Shortcuts
 * 
 * AUG_DIR  Path to Child Theme
 * AUG_CSS  Path to css files
 * AUG_CSSPG  Path to CSS Pages
 * AUG_JS   Path to js Files
 * 
 */
// Theme Directory
DEFINE( 'AUG_DIR', $themeurl );
// Theme CSS
DEFINE( 'AUG_CSS', $themeurl."/assets/css" );
// Theme CSS for Pages
DEFINE( 'AUG_CSSPG', $themeurl."/assets/css/pages" );
// Theme Javascript
DEFINE( 'AUG_JS', $themeurl."/assets/js" );
// Plugin Folders
DEFINE( 'AUG_PI', $themeurl."/assets/plugins" );
/*
* Setup Product CDN links to Javascript
* Google CDN links:
* http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js
* http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js
* http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.js
* http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js
* 
*/
wp_register_script('jquery-ui-latest-cdn', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js');
wp_register_script('jquery-latest-cdn', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js');

/*
* Wordpress Reference for wp_enqueue_script & wp_enqueue_style
* REFERENCE:
* wp_enqueue_style($handle, $source, $dependencies, $version, $media); 
* EXAMPLE:
* wp_enqueue_style('mystyles', '/wp-content/plugins/myplugin/style.css', array('otherstyles', 'morestyles'), '1.0′, 'screen');
* wp_deregister_script();
* REFERENCE: http://codex.wordpress.org/Function_Reference/wp_enqueue_style
*   wp_enqueue_style( $handle, $src, $deps, $ver, $media )  
*/


/*    CSS for All Pages
*********************************************************/
  wp_enqueue_style('aug-reset',  AUG_CSS.'/reset.css', '1.0', 'screen'); // Eric Meyer Reset
  wp_enqueue_script('aug-main',  AUG_CSS.'/main.css', array('aug-reset'), '1.0', 'screen'); 
  wp_enqueue_style('aug-common', AUG_CSS.'/common.css', array('aug-reset'), '1.0', 'screen');
  // Formalize - formalize.me automatically loads
  wp_enqueue_style('aug-formalize',  AUG_PI.'/core/formalize/assets/formalize.css', '1.0', 'screen');
  wp_enqueue_script('aug-formalize',  AUG_PI.'/core/formalize/assets/js/jquery.formalize.min.js', array('jquery'), '1.0', 'screen');  

/*    Javascript for All Pages
*********************************************************/

  wp_enqueue_script('jquery'); // uses No conflict mode
  wp_enqueue_script('jquery-ui-core', AUG_JS.'/plugins/ui/jquery-ui-latest.custom.min.js', array('jquery') );
  wp_enqueue_script('aug-core', AUG_JS.'/pages/core.js', array('jquery'), '1.0.1');

/* If you're going to be using 960gs there is 
 * a different reset.css file. 960gs has a different
 * reset file than the Eric Meyer reset css file
 * 
 * 960gs Framework for All Pages
*********************************************************/
if (CONFIG_960GS === true) {
  // Load base styles 
  wp_enqueue_style('aug-960reset', AUG_PI.'/960gs/reset.css', '1.0', 'screen');
  wp_enqueue_style('aug-960text', AUG_CSS.'/960gs/text.css', array('aug-960reset'), '1.0', 'screen');
  if ( wp_style_is('aug-reset') )  wp_deregister_style( 'aug-reset' );
  //if ( wp_style_is('aug-main') )   wp_deregister_style( 'aug-main' );
  wp_enqueue_style('aug-main', AUG_CSS.'/main.css', array('aug-960reset'), '1.0', 'screen');
  
  function augusta_grids() {
    // Load 960gs grids. Which kind? 
    if ( CONFIG_960GS_COLS == 24) {
      wp_enqueue_style('aug-960-24', AUG_PI.'/core/960gs/css/960_24_col.css', array('aug-960reset', 'aug-960text'), '1.0', 'screen');
    } else {  // Load 16/12 grids
    wp_enqueue_style('aug-960', AUG_PI.'/core/960gs/css/960.css', array('aug-960reset','aug-960text') , '1.0', 'screen');
    }
  }
  add_action('wp_enqueue_style','augusta_grids');
}

/**   jQuery UI  
 *********************************************************/
if (CONFIG_JQUERYUI === true) { 
  // Initialize the Latest
  wp_enqueue_script( 'jquery-ui-latest', T_DIR.'/js/ui/jquery-ui-latest.custom.min.js', array('jquery'), '1.8.5');
  wp_enqueue_script( 'jquery-ui-core' );
  
  function init_jqueryui() {  
    if(!is_admin()) { 
      wp_deregister_script('jquery-ui-core');
        wp_register_script('jquery-ui-core', 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', array('jquery'), '1.8.4', false);
      } 
  }
  add_action('init','init_jqueryui');
}

/*    Color Box
*********************************************************/
// @todo Need to test
if (CONFIG_COLORBOX == true) { 
  if (preg_match('/1-5/',CONFIG_COLORBOX_THEME) ) {
    wp_enqueue_style( 'aug-colorbox', AUG_PI.'/core/colorbox/example'. CONFIG_COLORBOX_THEME . '/colorbox.css', '1.0', 'screen' );
  } else if ( strpos( 'custom',CONFIG_COLORBOX_THEME) === 0 ) {
    wp_enqueue_style( 'aug-colorbox', AUG_PI.'/core/colorbox/custom/colorbox.css', '1.0', 'screen');
  } else { 
    wp_enqueue_style('aug-colorbox', AUG_PI.'/core/colorbox/example4/colorbox.css', '1.0', 'screen');
  } 
  /** Remove Thickbox if you're going to use colorbox */
  if ( wp_script_is('thickbox') && !is_admin() ) wp_deregister_script('thickbox');
  wp_enqueue_script('aug-colorbox', AUG_PI.'/plugins/colorbox/colorbox/jquery.colorbox-min.js', array('jquery'), '1.4', true );   
}

/*  Dropdowns
 *  Auto-enable dropdowns on every website
*********************************************************/
if (CONFIG_DROPDOWN == true) { 
  wp_enqueue_style('aug-superfish', AUG_JS.'/core/superfish/css/superfish.css', '1.0', 'screen');  
  wp_enqueue_style('aug-superfish-custom', AUG_JS.'/core/superfish/css/superfish.custom.css', array('aug-superfish'), '1.0', 'screen');  
  wp_enqueue_script('aug-superfish', AUG_JS.'/core/superfish/js/superfish.js', array('jquery'), '1.0.0' );
  wp_enqueue_script('aug-superfish-supersubs', AUG_JS.'/core/superfish/js/supersubs.js', array('jquery', 'aug-superfish'), '1.0.0', true );  
  wp_enqueue_script('aug-superfish-bgiframe', AUG_JS.'/core/superfish/js/jquery.bgiframe.min.js', array('jquery', 'aug-superfish'), '1.0.0', true );   
  wp_enqueue_script('aug-superfish-config', AUG_JS.'/core/superfish/js/superfish.config.js', array('jquery', 'aug-superfish'), '1.0.0' );    
}

/**   Innerfade   */
if ( !function_exists('augusta_enqueue_innerfade' ) ) :
  function augusta_enqueue_innerfade() {
    if (CONFIG_INNERFADE === true) { 
      wp_enqueue_script('innerfade', AUG_JS.'/plugins/jquery.innerfade/js/jquery.innerfade.js', array('jquery'), '1.0.0');      
    }
  }
add_action('wp_enqueue_script','augusta_enqueue_innerfade');
endif;

/**
 * CSS Autoloading
 * Load css by different page template types
 */
if (!function_exists('augusta_enqueue_scripts')) :
function augusta_enqueue_scripts() {
  /*  Blog
  *********************************************************/
  if ( is_home() ) { 
      wp_enqueue_style('aug-blog', AUG_CSSPG.'/blog.css', array('aug-main'), 'screen'); 
  }
  
  /*  Front
  *********************************************************/
  if ( is_front_page() ) { 
    wp_enqueue_style('aug-front', AUG_CSSPG.'/front.css', array('aug-main'), 'screen'); 
    wp_enqueue_script( 'aug-front', AUG_JS.'/pages/front.js', array('jquery'), '1.0.0', TRUE);            
  }
  
  /*  Subpages
  *********************************************************/
  if ( !is_home() && !is_front_page() ) { 
    wp_enqueue_style('aug-sub', AUG_CSSPG.'/sub.css', 'screen'); 
  }
}

endif; 
add_action('wp_enqueue_scripts','augusta_enqueue_scripts');

/**/
