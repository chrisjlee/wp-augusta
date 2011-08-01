<?php do_action('augusta_loop_before');?>
<?php
  $p = new WP_Query($pargs);
  $recentPosts -> query('showposts=5&order');
?>
<?php if ($p->have_posts()) : while ($p->have_posts()) : $postcnt = 0;  $p->the_post(); ?>
<div <?php post_class('post postcnt-'.$postcnt++) ?> id="post-<?php the_ID();?>">
  <?php get_template_part('assets/layout/post/post', 'header');?>
  <div class="entry">
    <?php the_content('Read the rest of this entry &raquo;');?>
  </div>
  <div class="postfooter sxn">
    <?php get_template_part('assets/layout/post/post', 'byline');?>
    <?php get_template_part('assets/layout/post/post', 'meta');?>
  </div>
  <?php get_template_part('assets/layout/post/post', 'edit');?>
</div>
<?php $postcnt++; endwhile; ?>
  <?php get_template_part('assets/layout/post/post', 'nav');?>
<?php else :?>
  <?php get_template_part('assets/layout/post/post', '404');?>
<?php endif;?>
<?php do_action('augusta_loop_after');?>