<?php
/**
 * Augusta: Region Footer
 *
 * @package WordPress
 * @subpackage Augusta
 * @author Chris J. Lee - iam@chrisjlee.net
 * @contributor Felipe Rocha
 * @since Augusta v1.0.0
 * 
 */
?>
<?php do_action('augusta_footer_before'); ?>
<div id="footer" class="<?php do_action("footer_class"); ?> grid-16 alpha omega">
  <div id="footer-first" class="grid-8 alpha">
    Footer First
  </div>
  <div id="footer-second" class="grid-8 omega">
    Footer Second
  </div>
</div>
<?php do_action('augusta_footer_after'); ?>