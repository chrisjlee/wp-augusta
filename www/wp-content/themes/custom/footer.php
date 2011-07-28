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
	<div id="footer" role="contentinfo" class="sxn grid_<?php do_action('zone_footer_class'); ?>">
			<div id="footer-colophon" class="sxn">
			<?php get_sidebar( 'footer' ); ?>
	    <?php
	    do_action('augusta_menu', array($menu)); 
	    do_action('grs_site_generator');
	    ?>
			</div><!-- #colophon -->
		</div><!-- #footer -->
	</div><!-- #wrapper -->
</div><!-- #page -->
<?php 
wp_footer();
get_template_part('/assets/layout/block','analytics'); ?>
</body></html>