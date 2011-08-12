<?php
/**
 * @package WordPress
 * @subpackage Augusta
 * @author Chris J. Lee - iam@chrisjlee.net
 * @contributor Felipe Rocha
 * @since Augusta v1.0.0
 * 
 */
?>
<?php do_action('augusta_sidebar_before');?>
<?php
// Sidebar just for the front page
if ( is_active_sidebar( 'front' ) ) : ?>
<div id="sidebar-front" class="xoxo <?php do_action('zone_sidebar_class'); ?> sidebar">
    <?php dynamic_sidebar('front');?>
</div>
<?php endif;?>
<?php do_action('augusta_sidebar_after');?>