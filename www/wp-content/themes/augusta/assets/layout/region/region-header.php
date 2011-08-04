<?php
/**
 * Region Header
 *
 * Reference: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Augusta
 * @author Chris J. Lee - iam@chrisjlee.net
 * @contributor Felipe Rocha
 * @since Augusta v1.0.0
 * 
 */
?>
<?php do_action('augusta_header_before'); ?>
<div id="header" class="grid-6">
  <?php do_action('block_logo_part'); ?>
</div>
<?php do_action('augusta_header_after'); ?>