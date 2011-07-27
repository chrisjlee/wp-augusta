<div id="content-posts" class="section"> 
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div <?php post_class('sxn page post') ?> id="post-<?php the_ID(); ?>">
    <!--<h2>
      <?php the_title(); ?>
    </h2>-->
    <div class="entry section">
      <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
      <div class="postpages">
        <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
      </div>
      <div class="post_edit section"><?php edit_post_link('Edit', '<span>', '</span>'); ?></div>
	</div>
  <?php endwhile; endif; ?>
 </div>
</div>