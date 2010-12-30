<?php 
global $post;
//$p = WP_query($args);
//$key = 'frontpage';
//$pid = get_post_meta($post->id, $key, true);
//$custom_fields = get_post_custom($post->id,'frontpage',$single = true);
//echo $custom_fields['frontpage'];
locate_template(array('/assets/includes/loop/loop-page-single-customfield.php'),true,true);

if ( have_posts() ) while ( have_posts() ) : the_post(); 

// More Custom Fields

?>

		<div id="post-<?php the_ID(); ?>" <?php post_class('sxn grid_16'); ?>>
			<div class="entry-content sxn">
				<div class="entry-title sxn">
					<h2>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						<span><?php thm_the_subtitle(); ?></span>
					</h2>
				</div>
				<div class="entry-body sxn"><?php the_excerpt(); ?></div>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
				<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
			</div><!-- .entry-content -->
		</div><!-- #post-## -->
		<?php // comments_template( '', true ); ?>
<?php endwhile; ?>