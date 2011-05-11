<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
	</div><!-- #main -->
	<div id="footer" role="contentinfo" class="sxn grid_<?php echo CONFIG_960GS_TYPE; ?>">
			<div id="footer-colophon" class="sxn">
			<?php get_sidebar( 'footer' ); ?>
			<?php 
				  $args = array(
						'container'       => 'div', 
						'container_class' => 'grid_10 menu alpha', 
						'menu'            => 'Footer', 
						'menu_id'         => 'menu-footer-ul',
						'menu_class'      => 'sxn menu omega', 
						'container_id'    => 'menu-footer', 
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '<span>',
						'link_after'      => '</span>',
						'depth'           => 0,
						'walker'          => ''
						//'theme_location' => 'footer'
					);
					wp_nav_menu($args); 
				?>
	    	<?php do_action('thm_site_generator');?>
			</div><!-- #colophon -->
		</div><!-- #footer -->
	</div><!-- #wrapper -->
</div><!-- #page -->
<?php 
wp_footer();
get_template_part('/assets/include/blocks/block','analytics'); ?>
</body></html>