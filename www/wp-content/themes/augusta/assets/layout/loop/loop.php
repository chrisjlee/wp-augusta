<?php
/*
 * @package Wordpress
 * @subpackage Augusta
 * @author Chris J. Lee - iam@chrisjlee.net
 * @contributor Felipe Rocha
 * 
 */

?>

<?php do_action('augusta_loop_before'); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
  <div id="post-<?php the_ID();?>"<?php post_class('clearfix') ?> >
    <?php get_template_part('assets/layout/post/post','title'); ?>
    <div class="entry">
      <?php get_template_part ( 'assets/layout/post/format', get_post_format() )?>
    </div>
    <div class="post-footer clearfix">
      <?php get_template_part('assets/layout/post/post','byline'); ?>
      <?php get_template_part('assets/layout/post/post','meta'); ?>
    </div>
    <?php get_template_part('assets/layout/post/post','edit'); ?>
  </div>
<?php endwhile;?>
<?php get_template_part('assets/layout/post/post','nav'); ?>
<?php else :?>
  <?php get_template_part('assets/layout/post/post','404'); ?>
<?php endif;?>
<?php do_action('augusta_loop_after'); ?>