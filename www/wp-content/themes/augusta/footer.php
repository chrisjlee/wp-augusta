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
    <div id="region-footer" class="region">
      <?php 
      //get_sidebar('footer');
      do_action('augusta_footer'); ?>
    </div><!-- #footer -->
  </div><!-- #zone-footer -->
  <div id="zone-meta" class="<?php do_action('zone_meta_class') ?>">
    <?php do_action('augusta_meta'); ?>
  </div>
<?php do_action('augusta_layout_end'); ?>
<?php 

/**
 * Required wordpress hook
 */
wp_footer();

// Add analytics only if it's been turned on in the settings file
if (CONFIG_ANALYTICS == true) get_template_part('/assets/layout/block', 'analytics');
?>
</body></html>