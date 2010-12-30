<div id="content-posts" class="bfl"> 
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div <?php post_class('block') ?> id="post-<?php the_ID(); ?>">
    <div class="entry section">
      <?php the_content('<p class="">Read the rest of this page &raquo;</p>'); ?>
      <div class="postpages">
        <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
      </div>
	</div>
  <?php endwhile; endif; ?>
</div>