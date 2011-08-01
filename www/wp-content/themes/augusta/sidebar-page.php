<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
<?php do_action('augusta_sidebar_before'); ?>
<?php
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'page' ) ) : ?>
	<div id="sidebar-front-primary" class="widget-area sidebar bfl" role="complementary">
			<ul class="xoxo">
				<?php dynamic_sidebar( 'page' ); ?>
			</ul>
	</div><!-- #secondary .widget-area -->
<?php endif; ?>
<?php do_action('augusta_sidebar_after'); ?>