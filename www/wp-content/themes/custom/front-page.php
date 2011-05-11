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
<body id="tpl-front" <?php if(function_exists('body_class')) body_class(); ?> >
<?php get_template_part( 'tpt-header', 'core' ); ?>
		<div id="container" class="container_<?php echo CONFIG_960GS_TYPE; ?>">
			<div id="content" role="main" class="grid_24 alpha omega">
					<div id="content" class="sxn grid_<?php echo CONFIG_960GS_TYPE; ?> alpha omega">
						<div id="sidebar-front-primary" class="widget-area sidebar bfl grid_6 alpha"><?php get_sidebar('front');  ?></div>
						<div id="content-body" class="grid_10 omega"><?php get_template_part('loop','front'); ?></div>
					</div>
					<div class="clearfloat"></div>
				<div id="sidebar-front-secondary" class="widget-area sidebar sxn grid_24 alpha omega" role="complementary">    			  
					<?php get_sidebar('front-secondary');  ?>
				</div>
			</div><!-- #content -->
</div><!-- #container -->
<?php get_footer(); ?>