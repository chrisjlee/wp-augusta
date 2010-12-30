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
	<div id="footer" role="contentinfo" class="sxn grid_24">
		<div id="footer-colophon" class="sxn grid_22">
        <?php
        	/* A sidebar in the footer? Yep. You can can customize
        	 * your footer with four columns of widgets.
        	 */
        	get_sidebar( 'footer' );
        ?>
			<?php 
				  $fargs = array(
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
				  wp_nav_menu($fargs); 
				  ?>
    	<?php do_action('thm_site_generator');?>
		</div><!-- #colophon -->
	</div><!-- #footer -->
</div><!-- #wrapper -->
</div><!-- #page -->
<?php 
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */
	wp_footer();
?>
</body>
</html>
