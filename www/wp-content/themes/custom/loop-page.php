<?php if ( have_posts() ) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class('sxn hfeed'); ?>>
			<div class="entry-contents sxn">
				<div class="entry-title"><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2></div>
				<div class="entry-content"><?php the_content(); ?></div>
				<div class="entry-more-pages"><?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?></div>
				<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link" style="background: #ececec; border-radius:3px; -moz-border-radius:3px; -webkit-border-radius:3px; color: #fff; width: 2em; text-align: center;">', '</span>' ); ?>
			</div><!-- .entry-content -->
		</div><!-- #post-## -->
		<?php // comments_template( '', true ); ?>
<?php endif; ?>