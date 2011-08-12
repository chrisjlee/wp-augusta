<?php do_action('augusta_loop_before'); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div id="post-<?php the_ID();?>" <?php post_class() ?> >
  <div class="entry sxn">
    <?php the_content('<p class="">Read the rest of this page &raquo;</p>');?>
    <div class="post-pages">
      <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number'));?>
    </div>
  </div>
</div>
<?php endwhile; endif;?>
<?php do_action('augusta_loop_after'); ?>