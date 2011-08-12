<?php
/**
 * Augusta Sidebar: Page
 * A sidebar for just pages
 *
 * @package WordPress
 * @subpackage Augusta
 * @author Chris J. Lee
 * 
 */
?>
<?php do_action('augusta_sidebar_before'); ?>
<?php
  // A second sidebar for widgets, just because.
  if ( is_active_sidebar( 'page' ) ) : ?>
  <div id="sidebar-page" class="xoxo <?php do_action('zone_sidebar_class'); ?> sidebar">
      <ul class="xoxo">
      <?php dynamic_sidebar( 'page' ); ?>
      </ul>
  </div><!-- #secondary .widget-area -->
<?php endif; ?>
<?php do_action('augusta_sidebar_after'); ?>