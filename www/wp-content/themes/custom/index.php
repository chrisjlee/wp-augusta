<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Augusta
 * @since Augusta v1.0.0
 */
get_header(); ?>
<body id="tpl-index" <?php if(function_exists('body_class')) body_class(); ?> >
<div id="page">
  <div id="zone-header" class="sxn"><?php do_action('augusta_header') ?></div>
  <div id="zone-menu" class="sxn"><?php do_action('augusta_header') ?></div>
  <div id="zone-content" class="hfeed">
  <?php
  do_action('augusta_content_prefix');
  do_action('augusta_content');
  do_action('augusta_content_postfix');
  ?>
  <?php //get_template_part('loop','blog');?>
  </div><!-- #zone-content -->
</div><!-- #page -->
<?php get_sidebar(); ?>
<?php get_footer();?>