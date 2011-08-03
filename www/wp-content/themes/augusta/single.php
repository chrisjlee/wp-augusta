<?php
/**
 * The Front Page template file.
 *
 * Reference: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Augusta
 * @author Chris J. Lee - iam@chrisjlee.net
 * @contributor Felipe Rocha
 * @since Augusta v1.0.0
 * 
 */
get_header(); ?>
<body id="tpl-single" <?php if( function_exists( 'body_class' ) ) body_class(); ?> >
<?php do_action ('augusta_layout_start');  ?>  
<div id="zone-header" class="<?php do_action('zone_header_class') ?>">
   <?php do_action('augusta_header'); ?>
</div>
<div id="zone-menu" class="<?php do_action('zone_menu_class') ?>">
  <?php do_action('augusta_menu'); ?>
</div>
<div id="zone-content" class="<?php do_action('zone_content_class')?>">
  <?php 
  do_action('augusta_content_single'); 
  get_sidebar();
  ?>
</div>
<?php get_footer();?>
<?php do_action('augusta_layout_end');  ?>