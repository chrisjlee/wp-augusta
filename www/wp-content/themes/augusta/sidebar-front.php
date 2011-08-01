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
	if ( is_active_sidebar( 'front' ) ) : ?>
<!--	<div id="sidebar-front-primary" class="widget-area sidebar bfl  alpha" role="complementary">-->
			<div id="sidebar-front-pri-contents" class="xoxo sxn sidebar">
				<?php dynamic_sidebar( 'front' ); ?>
<!--				<ul class="tabs">-->
<!--				</ul>-->
			</div>
			
	<!-- </div> #secondary .widget-area -->
<?php endif; ?>
<?php do_action('augusta_sidebar_after'); ?>