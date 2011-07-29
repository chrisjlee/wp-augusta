<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
<?php
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'front-secondary' ) ) : ?>
	
		<ul class="xoxo sxn">
			<?php dynamic_sidebar( 'front-secondary' ); ?>
		</ul>
<?php endif; ?>