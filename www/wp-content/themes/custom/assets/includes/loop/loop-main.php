<?php if( !is_page() ) : ?>
<div id="content-posts" class="bfl grid_16 omega">
<?php else: ?>
<div id="content-posts" class="bfl">
<?php endif; ?>    
	<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
    <div <?php post_class('sxn') ?> id="post-<?php the_ID(); ?>">
      <?php include (TEMPLATEPATH . '/includes/post/postheader.php');?>
      <div class="entry section">
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