<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
get_header(); ?>
<body id="pg" <?php if(function_exists('body_class')) body_class(); ?> >
<?php get_template_part( 'tpt-header', 'page' ); ?>
		<div id="container" class="grid_24">
			<div id="content" role="main" class="grid_24">
			  <div id="sidebar" class="bfl grid_7 sidebar alpha"><?php get_sidebar('page'); ?></div>
			  <div id="content-body" class="entry bfl grid_17 omega"><?php get_template_part('/assets/include/loop/loop','page'); 
			  ?></div>
			</div><!-- #content -->
</div><!-- #container -->
<?php get_footer(); ?>