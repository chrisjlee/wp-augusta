<?php 
/**
 * @package Wordpress
 * @subpackage Augusta
 * @author Chris J. Lee - iam@chrisjlee.net
 * @contributor Felipe Rocha  
 */
?>
<?php do_action('augusta_meta_before'); ?>
  <div id="meta-first" class="grid-4 alpha">
    &copy; <?php echo date('Y')?> <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name')?>"><?php bloginfo('name')?></a>
  </div>
  <div id="meta-second" class="grid-4">
    Meta Second
  </div>
  <div id="meta-third" class="grid-4 omega">
    Meta Third
  </div>
<?php do_action('augusta_meta_after'); ?>