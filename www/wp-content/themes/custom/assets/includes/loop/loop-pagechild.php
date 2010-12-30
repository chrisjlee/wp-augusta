<?php do_action('thm_before_loop'); ?>
	<?php // Set up the arguments for retrieving the pages
  $args = array(
	  'post_type' => 'page',
	  'numberposts' => -1,
	  'post_status' => null,
  // $post->ID gets the ID of the current page
      'post_parent' => $post->ID,
	  'order' => ASC,
	  'orderby' => title
	  );
   $subpages = get_posts($args);
   // Just another Wordpress Loop 
   foreach($subpages as $post) :
	  setup_postdata($post);
  ?>
	<div id="entry-child-<?php echo $post->ID ?>"	<?php post_class('entry-child child') ?>>
		<?php if($post->post_parent) :	?>
		<div class="entry-imgs bfl">
			<div class="thumb-large"> <a href="<?php the_permalink();?>">
				<?php if (the_post_thumbnail('child-thumbnail')) : ?>
				<?php the_post_thumbnail('child-thumbnail'); ?>
				<?php endif; ?>
				</a> </div>
		</div>
		<div class="entry-child-content bfl">
			<?php if($post->post_parent) : ?>
			<div class="title">
				<h2><a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>">
					<?php the_title(); ?>
					</a> </h2>
			</div>
			<?php endif; ?>
			<div class="entry-body">
				<?php if (is_page('child')) : ?>
				<?php  the_excerpt(); ?>
				<?php else :  ?>
				<?php the_content(); ?>
				<?php endif;?>
			</div>
		</div>
		<?php else :?>
		<div id="thumb-single" class="hide"> <a id="entry-link-<?php echo $post->ID ?>" href="#entry-child-<?php echo $post->ID ?>" 
    	class="entry-link" title="<?php the_title(); ?>">
			<?php	the_post_thumbnail('single-post-thumbnail'); ?>
			</a> </div>
		<?php endif ?>
	</div>
	<?php  if (is_page()) include (TEMPLATEPATH . '/includes/post/postedit.php');?>
	<?php endforeach; ?>
	<?php if($post->parent) :?>
	<?php endif; ?>
<?php do_action('thm_after_after'); ?>