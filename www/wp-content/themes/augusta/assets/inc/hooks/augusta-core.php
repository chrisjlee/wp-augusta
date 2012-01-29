<?php 
/**
 * @package WordPress
 * @subpackage Augusta
 * @author Chris J. Lee - iam@chrisjlee.net
 * @contributor Felipe Rocha
 * @since Augusta v1.0.0
 * 
 * Augusta Core 
 * 
 * Contains all the hooks 
 * Routes them to the proper area
 * 
 * Files:
 *  Augusta Class - Contains class information
 *  - /assets/hooks/augusta-class.php
 *  Augusta Core - File that routes to appropriate action
 * 
 * Structure
 *  - Zones contain regions 
 *  - Regions are parts that make up a zone
 *  and regions 
 * 
 */

/**
 * do_action Reference:
 * http://codex.wordpress.org/Function_Reference/do_action
 *  <?php do_action( $tag, $arg_a, $arg_b, $etc ); ?>
 *  
 */

// Load Custom Hooks
require_once('custom-hooks.php');
 
// Augusta Header
function augusta_menu() {
  do_action('augusta_menu');
}

function augusta_nav_menu_array ($location, $menu) {
  do_action('augusta_nav_menu_array', $location, $menu);
}

function augusta_nav_menu($args) {
  wp_nav_menu ( apply_filters('augusta_nav_menu_array', $args) );
  do_action ('augusta_nav_menu');
}

/**  Augusta Page Wrappers  */
function augusta_layout_before() {
  do_action('augusta_layout_before');
}

function augusta_layout_after() {
  do_action('augusta_layout_after');
}

/**  Zones */
// Augusta Hero
function augusta_hero($output) {
  do_action ( 'augusta_hero' );
}



// Augusta Header
function augusta_header($output, $class) {
  do_action('augusta_header', $output, $class);
}

function augusta_header_before($output, $class) {
  do_action('augusta_header_before', $output, $class);
}

function augusta_header_after($output) {
  do_action('augusta_header_after', $output);
}

// Augusta Branding 
function augusta_branding() {
  do_action('augusta_branding');
}

// Augusta Content 
function augusta_content_before() {
  do_action ('augusta_content_before');
}

function augusta_content() {
  do_action('augusta_content');
}

function augusta_content_after() {
  do_action('augusta_content_after');
}



// Augusta Footer  
function augusta_footer() {
  do_action ('augusta_footer');
}

// Augusta Meta 
function augusta_meta_before() {
  do_action('augusta_meta_before');
}

function augusta_meta() {
  do_action('augusta_meta');
}

function augusta_meta_after() {
  do_action('augusta_meta_after');
}

function section_content_before() {
  do_action('section_content_before');
}

function section_content_after() {
  do_action('section_content_after');
}




/** Loop */
function augusta_loop_before() {
  do_action('augusta_loop_before');
}

function augusta_loop_after() {
  do_action('augusta_loop_after');
}




/** Sidebar */
function augusta_sidebar_before() {
  do_action('augusta_sidebar_before');
}

function augusta_sidebar_after() {
  do_action('augusta_sidebar_after');
}




/**  Regions */
function region_content_first() {
  do_action('region_content_first');
}

function region_content_second() {
  do_action('region_content_second');
}

function region_content_third() {
  do_action('region_content_third');
}

function region_content_fourth() {
  do_action('region_content_fourth');
}




/**
 * Augusta Classes
 */
function page_class() {
  do_action('page_class');
}

function pagewidth_class() {
  do_action('pagewidth_class');
}

function content_class() {
  do_action('content_class');
}

function sidebar_class(){
  do_action('sidebar_class');
}

function footer_class() {
  do_action('footer_class');
}

function meta_class() {
  do_action('meta_class');
}

function zone_branding_class() {
  do_action('zone_branding_class');
}

function zone_header_class() {
  do_action('zone_header_class');
}

function zone_menu_class() {
  do_action('zone_menu_class');
}

function zone_content_above_class() {
  do_action('zone_content_class');
}

function zone_content_class() {
  do_action('zone_content_class');
}

function zone_content_below_class() {
  do_action('zone_content_below_class');
}

function zone_sidebar_class() {
  do_action('zone_sidebar_class');
}

function zone_meta_class() {
  do_action('zone_meta_class');
}




// Sections
function section_content_class() {
  do_action('section_content_class');
}




// Regions
function region_header_class() {
  do_action('region_header_class');
}

function region_menu_class() {
  do_action('region_menu_class');
}

function region_content_class() {
  do_action('region_content_class');
}

function region_footer_class() {
  do_action('region_footer_class');
}




/**
 * Augusta Sidebar
 */
function augusta_widget_before() {
  do_action('augusta_widget_before');
}

function augusta_widget_after() {
  do_action('augusta_widget_after');
}

function augusta_analytics() {
  do_action('augusta_analytics');
}


/**  Misc */
function grs_generator() {
  do_action('grs_generator');
}

/**
 * Globe Runner Theme Hooks
 */
function grs_generator_setup() {
  ?><div id='grs' class="grid-4">Dallas SEO, <a href='http://globerunnerseo.com' title='Dallas SEO Consultant'>Globe Runner SEO</a></div><?php
}
add_action('grs_generator', 'grs_generator_setup');
