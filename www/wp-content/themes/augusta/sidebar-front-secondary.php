<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
<?php do_action('augusta_sidebar_before');?>
 <?php if ( is_active_sidebar( 'front-secondary' ) ) : ?>
// A second sidebar for widgets, just because.
<div id="sidebar-front" class="<?php do_action('augusta_sidebar_class') ?> sidebar" >
  <ul class="xoxo sxn">
    <?php dynamic_sidebar('front-secondary');?>
  </ul>
</div>
<?php endif;?>
<?php do_action('augusta_sidebar_after');?>