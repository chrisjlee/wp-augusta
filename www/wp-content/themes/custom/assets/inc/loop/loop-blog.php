<div id="content-posts" class="">
  <?php if (have_posts()) : ?>
  	<div id="content-header" class="grid_17">
  		<div class="hidetext"><?php bloginfo('description'); ?></div class="hidetext">
  	</div>
    <?php while (have_posts()) : the_post(); ?>
    <div <?php post_class('sxn grid_16') ?> id="post-<?php the_ID(); ?>">
      <?php get_template_part('post','header');?>
      <div class="entry grid_16">
        <?php the_content('Read the rest of this entry &raquo;'); ?>
      </div>
      <div class="postfooter section">
        <?php get_template_part('inc/post','byline');?>
        <?php get_template_part('post','meta');?>
      </div>
      <?php get_template_part('post','edit');?>
    </div>
    <?php endwhile; ?>
	  <?php get_template_part('post','nav');?>
    <?php else : ?>
	 	<?php get_template_part('post','404');?>
    <?php endif; ?>
</div>