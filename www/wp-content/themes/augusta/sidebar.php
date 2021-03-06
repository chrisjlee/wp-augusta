<?php
/**
 * Augusta: Sidebars
 *
 * @package Wordpress
 * @subpackage Augusta
 * @author Chris J. Lee - iam@chrisjlee.net
 * @contributor Felipe Rocha
 */
?>
<?php do_action('augusta_sidebar_before'); ?>
  <?php if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
  <div id="region-sidebar" class="<?php do_action('zone_sidebar_class'); ?> sidebar">
  <ul class="xoxo">
    <li id="search" class="widget-container widget_search">
      <?php get_search_form();?>
    </li>
    <li id="archives" class="widget-container">
      <h3 class="widget-title"><?php _e('Archives', 'augusta');?></h3>
      <ul>
        <?php wp_get_archives('type=monthly');?>
      </ul>
    </li>
    <li id="meta" class="widget-container">
      <h3 class="widget-title"><?php _e('Meta', 'augusta');?></h3>
      <ul>
        <?php wp_register();?>
        <li>
          <?php wp_loginout();?>
        </li>
        <?php wp_meta();?>
      </ul>
    </li>
  </ul>
</div><!-- #primary .widget-area -->
  <?php endif; // end primary widget area?>
<?php
// A second sidebar for widgets, just because.
if ( is_active_sidebar( 'secondary-widget-area' ) ) :
?>
<?php endif;?>
<?php do_action('augusta_sidebar_after');?>