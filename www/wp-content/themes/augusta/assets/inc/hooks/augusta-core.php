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
function augusta_menu($arg, $menu) {
  do_action('augusta_menu',$arg, $menu);
}

/**  Zones */
// Augusta Hero
function augusta_hero($output) {
  do_action ( 'augusta_hero' );
}
// Augusta Header
function augusta_header($output) {
  do_action('augusta_header',10, 1);
}
function augusta_content_before() {
  do_action ( 'augusta_content_before' );
}
function augusta_content() {
  do_action ( 'augusta_content' );
}
function augusta_content_after() {
  do_action ( 'augusta_content_after' );
}
function augusta_branding() {
  do_action ( 'augusta_branding' );
}
function augusta_footer() {
  do_action ( 'augusta_footer' );
}
function augusta_meta() {
  do_action ( 'augusta_meta' );
}
/** Loop */
function augusta_loop_before() {
  do_action ( 'augusta_loop_before' );
}
function augusta_loop_after() {
  do_action ( 'augusta_loop_after' );
}

/** Sidebar */
function augusta_sidebar_before() {
  do_action ( 'augusta_sidebar_before' );
}
function augusta_sidebar_after() {
  do_action ( 'augusta_sidebar_after' );
}

/**  Regions */
function region_content_first() {
  do_action ( 'region_content_first', 10, 1 );
}
function region_content_second() {
  do_action ( 'region_content_second',20, 1 );
}
function region_content_third() {
  do_action ( 'region_content_third', 30, 1 );
}
function region_content_fourth() {
  do_action ( 'region_content_fourth', 40, 1 );
}

/** Layout Wrapper #page / #pagewidth */
function augusta_layout_start() {
  do_action ('augusta_layout_start');
}
function augusta_layout_end() {
  do_action ('augusta_layout_end');
}

/**  Misc */
function grs_generator() {
  do_action ('grs_generator');
}

/**
 * Globe Runner Theme Hooks
 */
function grs_generator_setup() { ?>
 <div id='grs'>Dallas SEO, <a href='http://globerunnerseo.com' title='Dallas SEO Consultant'>Globe Runner SEO</a></div>
<?php }
add_action('grs_generator', 'grs_generator_setup');
