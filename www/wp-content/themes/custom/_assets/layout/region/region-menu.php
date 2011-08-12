<?php
/**
 * @package Wordpress
 * @subpackage Augusta
 * @author Chris J. Lee - iam@chrisjlee.net
 * @contributor Felipe Rocha  
 */
?>
<div id="region-menu" class=" <?php do_action('region_menu_class') ?>">
  <?php 
  
  // Called from augusta-menu.php
  augusta_nav_menu( $location = "footer" ); 
  
  ?>
</div>