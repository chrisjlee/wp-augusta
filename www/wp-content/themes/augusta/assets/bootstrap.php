<?php 
/*  
 * @package Wordpress
 * @subpackage Augusta
 * description: file loads all the scripts and stylesheets  
 * @version: 1.3 
 * @author: Chris J. Lee
 * 
 * Updates:
 * - Must now add_action when invoking wp_enqueue
 *   scripts see ticket: #11526 
 *   http://core.trac.wordpress.org/ticket/11526
 * 
 */

/** Obtain URL For stylesheet */
if ( is_child_theme() ) $themeurl = get_bloginfo('stylesheet_directory'); 
else $themeurl = get_bloginfo('template_directory');

 /** 
 * Setup Folder Shortcuts
 * 
 * AUGDIR   Path to Child Theme
 * AUGCSS   Path to css files
 * AUGCSSPG Path to CSS Pages
 * AUGJS  Path to JS Files
 * AUGPI  Path to Plugin Files
 * 
 */
  // Theme Directory
  DEFINE( 'AUGDIR', $themeurl );
  // Theme CSS
  DEFINE( 'AUGCSS', $themeurl."/assets/css" );
  // Theme CSS for Pages
  DEFINE( 'AUGCSSPG', $themeurl."/assets/css/pages" );
  // Theme Javascript
  DEFINE( 'AUGJS', $themeurl."/assets/js" );
  // Augusta Plugin Folders - Contains Add ons
  DEFINE( 'AUGPI', $themeurl."/assets/plugins" );
  
 /**
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

/* CSS Auto Load
 ---------------------------------------*/
if (!is_admin()) :   // Don't load styles to modify the backend
 /** 
  * Determine if 960grids are on  
  * then figure out which reset to load
  *  
  */
  if ( CONFIG_960GS == true ) {
   wp_enqueue_style('aug-reset', AUGPI . '/core/960gs/min/reset.css', '1.0', 'all');
  } else {
    wp_enqueue_style('aug-reset',  AUGCSS.'/reset.css', '1.0', 'all'); // Eric Meyer Reset
  }
  
  /**   Adapt.js for mobile styles   */
  wp_enqueue_script('aug-adapt',  AUGPI . '/core/adapt/js/adapt.min.js', false);   
  wp_enqueue_script('aug-adapt-config',  AUGPI . '/core/adapt/js/adapt.config.js', array('aug-adapt'), false); 
  
  wp_enqueue_style('aug-common', AUGCSS . '/common.css', array('aug-reset'), '1.0', 'all');
  wp_enqueue_style('aug-main',  AUGCSS . '/main.css', array('aug-reset', 'aug-common'), '1.0', 'all'); 
  
  /** Load Formalize - formalize.me automatically loads*/
  wp_enqueue_style('aug-formalize',  AUGPI . '/core/formalize/css/formalize.css', array('aug-reset'),  '1.0', 'all');
  wp_enqueue_script('aug-formalize',  AUGPI . '/core/formalize/js/jquery.formalize.min.js', array('jquery'), '1.0', true);  
  
  /**   Selectivizr Please save me from IE6-8   */
  wp_enqueue_script('aug-selectivizr',  AUGPI . '/core/selectivizr/selectivizr-min.js', array('jquery'), '1.0');  
  
  
  /**  Javascript for all pages  */
  wp_enqueue_script( 'jquery' ); // uses No conflict mode
  wp_enqueue_script( 'jquery-ui-core', AUGJS . '/plugins/ui/jquery-ui-latest.custom.min.js', array( 'jquery' ) );
  wp_enqueue_script( 'aug-core', AUGJS . '/augusta.core.js', array( 'jquery', 'jquery-ui-core' ), '1.0.1');
  
/** 
 * If you're going to be using 960gs there is 
 * a different reset.css file. 960gs has a different
 * reset file than the Eric Meyer reset css file
 * 
 * 960gs Framework for All Pages
 * 
 */
  if ( CONFIG_960GS == true) {
    /**  Load my grids for augusta  */
    // Load base styles 
    wp_enqueue_style( 'aug-960text', AUGPI . '/core/960gs/min/text.css', array('aug-reset'), '1.0', 'all and screen' );
    
    // Load 960gs grids. Which kind? 
    if ( CONFIG_960GS_COLS == 24 ) {
      wp_enqueue_style ( 'aug-960-24', AUGPI . '/core/960gs/min/css/960_24_col.css', array('aug-960text'), '1.0', 'screen' );
    } else {  
      // By default it will load 16/12 grids, which is a standard configuration
      wp_enqueue_style ( 'aug-960', AUGPI . '/core/960gs/min/960.css', array('aug-960text') , '1.0', 'all and screen' );
    }
  }

  /*  jQuery UI  
   ---------------------------------------*/
  if (CONFIG_JQUERYUI == true) { 
    // Initialize the Latest
    wp_enqueue_script( 'jquery-ui-latest', AUGPI.'/core/ui/jquery-ui-latest-custom.min', array( 'jquery'), '1.8.14');
    wp_enqueue_script( 'jquery-ui-core' );
    
    /** Update jquery to the latest   */
    if (CONFIG_JQUERYUI_CDN == true) :
    function augusta_enqueue_jquery_cdn() {  
      if(!is_admin()) { 
        wp_deregister_script('jquery-ui-core');
        wp_register_script('jquery-ui-core', 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', array('jquery'), '1.6.2', false);
      } 
    }  
    if( !is_admin() ) add_action('wp_enqueue_script','augusta_enqueue_jquery_cdn');
    endif;
  }
  
  /*    Color Box
   ---------------------------------------*/
  if ( CONFIG_COLORBOX == true )  { 
    if (preg_match('/1-5/',CONFIG_COLORBOX_THEME) ) {
      wp_enqueue_style( 'aug-colorbox', AUGPI.'/core/colorbox/example'. CONFIG_COLORBOX_THEME . '/colorbox.css', '1.0', 'screen' );
    } else if ( strpos( 'custom',CONFIG_COLORBOX_THEME) === 0 ) {
      wp_enqueue_style( 'aug-colorbox', AUGPI.'/core/colorbox/custom/colorbox.css', '1.0', 'screen');
    } else { 
      wp_enqueue_style('aug-colorbox', AUGPI.'/core/colorbox/example4/colorbox.css', '1.0', 'screen');
    } 
    /** Remove Thickbox if you're going to use colorbox */
    if ( wp_script_is('thickbox') && !is_admin() ) wp_deregister_script('thickbox');
    wp_enqueue_script('aug-colorbox', AUGPI.'/core/colorbox/colorbox/jquery.colorbox-min.js', array('jquery'), '1.4', true );   
  }
  
  /*  Dropdowns Auto-enable dropdown
   ---------------------------------------*/
  if ( CONFIG_DROPDOWN === true ) :
    
    function augusta_enqueue_superfish_style () {
    wp_enqueue_style('aug-superfish', AUGPI.'/core/superfish/css/superfish.css', '1.0', 'screen');  
    wp_enqueue_style('aug-superfish-custom', AUGPI.'/core/superfish/css/superfish.custom.css', array('aug-superfish'), '1.0', 'screen');
    }
    
    function augusta_enqueue_superfish() {  
    wp_enqueue_script('aug-superfish', AUGPI.'/core/superfish/js/superfish.js', array('jquery'), '1.0.0' );
    wp_enqueue_script('aug-superfish-supersubs', AUGPI.'/core/superfish/js/supersubs.js', array('jquery', 'aug-superfish'), '1.0.0', true );  
    wp_enqueue_script('aug-bgiframe', AUGPI.'/core/superfish/js/jquery.bgiframe.min.js', array('jquery', 'aug-superfish'), '1.0.0', true );   
    wp_enqueue_script('aug-superfish-config', AUGPI.'/core/superfish/js/superfish.config.js', array('jquery', 'aug-superfish'), '1.0.0', true );
    }
    // Add Actions
    if( !is_admin() ) {
      add_action('wp_enqueue_script','augusta_enqueue_superfish');
      add_action('wp_enqueue_style','augusta_enqueue_superfish_style');
    }
  endif;
  
  /**   Innerfade   */
  if ( !function_exists('augusta_enqueue_innerfade' ) ) :
    function augusta_enqueue_innerfade() {
      if (CONFIG_INNERFADE === true) { 
        wp_enqueue_script('innerfade', AUGPI . '/core/jquery.innerfade/js/jquery.innerfade.js', array('jquery'), '1.0.0');      
      }
    }
  add_action('wp_enqueue_script','augusta_enqueue_innerfade');
  endif;
endif; // not admin
/**
 * Augusta CSS Contextual Autoloading
 * 
 * Load css by different page, or template types
 * utilizing conditional wordpress functions
 *  
 */
if (!function_exists('custom_enqueue_page_scripts')) :
function augusta_enqueue_page_scripts() {
  /**  Blog   */
  if ( is_home() ) { 
    wp_enqueue_style('aug-blog', AUGCSSPG.'/blog.css', array('aug-main'), 'screen'); 
  }
  
  /**  Front Page   */
  if ( is_front_page() ) { 
    wp_enqueue_style('aug-front', AUGCSSPG.'/front.css', array('aug-main'), 'screen'); 
    wp_enqueue_script( 'aug-front', AUGJS.'/pages/front.js', array('jquery'), '1.0.0', TRUE);            
  }
  
  /**  Subpages   */
  if ( !is_home() && !is_front_page() ) { 
    wp_enqueue_style('aug-sub', AUGCSSPG.'/sub.css', 'screen'); 
    wp_enqueue_script( 'aug-front', AUGCSSPG.'/sub.js', array('jquery'), '1.0.0', TRUE);
  }
}
endif; 
if( !is_admin() ) add_action('wp_enqueue_scripts','augusta_enqueue_page_scripts');

/**/
