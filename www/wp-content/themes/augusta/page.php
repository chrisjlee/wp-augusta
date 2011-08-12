<?php
/**
 * The Front Page template file.
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
get_header(); ?>
<body id="tpl-page" <?php if( function_exists ( 'body_class' ) ) body_class(); ?> >
<?php do_action ('augusta_layout_before');  ?>  
<div id="zone-header" class="<?php do_action ( 'zone_header_class' ) ?>">
   <?php  do_action('augusta_header'); ?>
</div>
<div id="zone-menu" class="<?php do_action ( 'zone_menu_class' ) ?>">
  <?php do_action('augusta_menu'); ?>
</div>
<div id="zone-content" class="<?php do_action ( 'zone_content_class' )?>">
  
  <?php 
    // Wraps #content and #sidebar
    do_action ( 'section_content_before' );
    
      // See augusta-content.php
      do_action ( 'augusta_content_before' );
      
      // wordpress function
      get_template_part ( 'assets/layout/loop/loop', 'page' );
      
      // See augusta-content.php
      do_action ( 'augusta_content_after' );
      
      get_sidebar ( 'page' );
    
    do_action ( 'section_content_after' ); 
  ?>
</div>
<?php 
  // augusta_layout_end is called inside footer.php
  // augusta_meta is also called here
  get_footer();  
?>