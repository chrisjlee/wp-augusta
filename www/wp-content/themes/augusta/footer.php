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
  <div id="footer" class="region">
    <?php 
    get_sidebar('footer');
    do_action('augusta_menu'); ?>
  </div><!-- #footer -->
</div><!-- #zone-footer -->
<?php do_action('augusta_layout_end'); ?>
<?php 
wp_footer();
get_template_part('/assets/layout/block', 'analytics');
?>
</body></html>