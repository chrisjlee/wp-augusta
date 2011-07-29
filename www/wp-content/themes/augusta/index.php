<?php
/**
 * The main template file.
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
<body id="tpl-index" <?php if( function_exists( 'body_class' ) ) body_class(); ?> >
<div id="page" class="<?php do_action('page_class') ?>">
  <div id="pagewidth" class="<?php do_action('pagewidth_class') ?>">
    <div id="zone-header" class="<?php do_action('zone_header_class') ?>">
       <?php do_action('augusta_header'); ?>
    </div>
    <div id="zone-menu" class="<?php do_action('zone_menu_class') ?>">
      <?php do_action('augusta_menu'); ?>
    </div>
    <div id="zone-content-above" class="<?php do_action('zone_content_above_class')?>">
      <?php do_action('augusta_content_above'); ?>
    </div>
    <div id="zone-content" class="<?php do_action('zone_content_class')?>">
       <?php do_action('augusta_content'); ?>
    </div>
    <div id="zone-content-below" class="<?php do_action('zone_content_below_class')?>">
      <?php do_action('augusta_content_below'); ?>
    </div>
    <?php //get_template_part('loop','blog');?>
    <?php get_sidebar(); ?>
    <?php get_footer();?>
  </div>
</div><!-- #page -->