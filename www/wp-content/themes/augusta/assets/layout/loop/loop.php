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
    <?php get_template_part('assets/layout/post/post','header'); ?>
    <div class="entry section">
      <?php the_content('Read the rest of this entry &raquo;');?>
    </div>
    <div class="post-footer section">
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