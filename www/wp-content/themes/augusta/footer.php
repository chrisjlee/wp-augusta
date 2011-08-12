<?php
/**
 * Footer invoked by hook - get_footer()
 *
 * @package WordPress
 * @subpackage Augusta
 * @author Chris J. Lee - iam@chrisjlee.net
 * @contributor Felipe Rocha
 * @since Augusta v1.0.0
 *
 */
?>
<div id="zone-footer" role="contentinfo" class="<?php do_action('zone_footer_class');?>">
  <?php do_action('augusta_footer'); ?>
</div><!-- #zone-footer -->
<div id="zone-meta" class="<?php do_action('zone_meta_class'); ?>">
    <?php do_action('augusta_meta'); ?>
</div>
<?php do_action('augusta_layout_after'); ?>
<?php 

/**
 * Required wordpress hook
 */
wp_footer();

// Do analytics
do_action('augusta_analytics');
?>
</body></html>