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

// Augusta Header
function augusta_header() {
  do_action('augusta_header');
}

// Augusta Header
function augusta_menu($args) {
  // if ($args) {
    // if ($args == 'footer') {
      // echo 'Footer';
    // }
  // } else {
    do_action('augusta_menu');
  // }
}

/**  Zones */
// Augusta Hero
function augusta_hero() {
  do_action('augusta_hero');
}
function augusta_menu() {
  do_action('augusta_menu');
}
function augusta_content_before() {
  do_action('augusta_content_before');
}
function augusta_content() {
  do_action('augusta_content');
}
function augusta_content_after() {
  do_action('augusta_content_after');
}
function augusta_branding() {
  do_action('augusta_branding');
}
function augusta_footer() {
  do_action('augusta_footer');
}
function region_content() {
  do_action ('region_content_class');
}
/**  Regions */
function region_content_above() {
  do_action ('region_content_above');
}
function region_content() {
  do_action ('region_content');
}
function region_content_below_class() {
  do_action ('region_content_above_class');
}

/**
 * August Content Core Hooks
 * 
 */
if ( !function_exists('custom_content_setup') ) :
function augusta_content_setup() { ?>
  <div id="region-content-above" class="<?php do_action('region_content_above_class')?>">
    <?php do_action('augusta_content_above'); ?>
  </div>
  <div id="region-content" class="<?php do_action('region_content_class')?>">
     <?php do_action('augusta_content'); ?>
  </div>
  <div id="region-content-below" class="<?php do_action('region_content_below_class')?>">
    <?php do_action('augusta_content_below'); ?>
  </div>
  </div>
  <?php get_sidebar(); ?>
<? }

add_action ( 'august_content','augusta_content_setup', null );
endif;

/**
 * Globe Runner Hooks
 */
function grs_generator_setup() {
 echo <<<END
    <div id='grs'>Dallas SEO, <a href='http://globerunnerseo.com' title='Dallas SEO Consultant'>Globe Runner SEO</a></div>END;
}
add_action('grs_generator', '');

require_once('custom-hooks.php');
