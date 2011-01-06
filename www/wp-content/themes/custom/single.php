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
<body id="tpl-single" <?php if(function_exists('body_class')) body_class(); ?> >
<?php get_template_part( 'tpt-header', 'core' ); ?>
		<div id="container" class="<?php do_action('custom_grid_container'); ?>">
			<div id="content" role="main">
			<?php get_template_part('loop','index'); ?>
			<?php get_sidebar('blog');  ?>
			</div><!-- #content -->
<?php get_footer(); ?>
</div><!-- #container -->