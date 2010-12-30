<div id="content-posts" class="bfl grid_17 suffix_1 alpha">
	
  <?php if (have_posts()) : ?>
  	<div id="content-header" class="grid_17">
  		<div class="hidetext"><?php bloginfo('description'); ?></div class="hidetext">
  	</div>
    <?php while (have_posts()) : the_post(); ?>
    <div <?php post_class('sxn grid_16') ?> id="post-<?php the_ID(); ?>">
      <?php include (TEMPLATEPATH . '/includes/post/postheader.php');?>
      <div class="entry grid_16">
        <?php the_content('Read the rest of this entry &raquo;'); ?>
      </div>
      <div class="postfooter section">
        <?php include (TEMPLATEPATH . '/includes/post/postbyline.php');?>
        <?php include (TEMPLATEPATH . '/includes/post/postmeta.php');?>
      </div>
      <?php include (TEMPLATEPATH . '/includes/post/postedit.php');?>
    </div>
    <?php endwhile; ?>
	  <?php include (TEMPLATEPATH . '/includes/post/postnav.php');?>
    <?php else : ?>
	 	<?php include (TEMPLATEPATH . '/includes/post/post404.php');?>
    <?php endif; ?>
</div>