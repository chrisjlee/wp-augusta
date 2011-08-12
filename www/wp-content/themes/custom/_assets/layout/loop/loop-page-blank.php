<?php do_action('augusta_loop_before'); ?>
 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div <?php post_class('block') ?> id="post-<?php the_ID(); ?>">
    <div class="entry section">
      <?php do_action('augusta_page_title'); ?>
      <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
    </div>
  </div>
  <?php endwhile; endif; ?>
<?php do_action('augusta_loop_after'); ?>