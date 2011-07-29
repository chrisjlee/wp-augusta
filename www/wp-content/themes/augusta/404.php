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
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>
<body id="tpl-404" <?php if(function_exists('body_class')) body_class(); ?> >
<?php get_template_part( 'tpt-header', 'page' ); ?>
		<div id="container" class="container_<?php echo CONFIG_960GS_TYPE; ?>">
			<div id="content" role="main" class="sxn entry-content">
    			<div id="content-primary" class="grid_6 alpha "><?php get_sidebar('primary');  ?></div>
    			<div id="content-body" class="grid_10 omega">
    				<div class="grid_16">
    				<h2>404: We seemed to be unable to find the particular page you're looking for</h2>
    				<p>Please use the following search form to find the page that you may be looking for:</p>
    				<?php get_search_form(); ?>
    				<h2>Pages</h2>
    				<p><?php wp_list_pages('title_li='); ?></p>
    				<p>
    				<h3>Categories:</h3>
    				<?php wp_list_cats(); ?></p></div>
    			</div>
    			<div class="clearfloat"></div>
			</div><!-- #content -->
			<div id="content-after">
				<div class="clearfloat"></div>
			</div>
</div><!-- #container -->
<?php get_footer(); ?>