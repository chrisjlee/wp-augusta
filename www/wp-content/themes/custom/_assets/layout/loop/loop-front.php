<?php 
global $post;
//$p = WP_query($args);
//$key = 'frontpage';
//$pid = get_post_meta($post->id, $key, true);
//$custom_fields = get_post_custom($post->id,'frontpage',$single = true);
//echo $custom_fields['frontpage'];
// More Custom Fields

if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<?php augusta_loop_before() ?>
<div id="post-<?php the_ID();?>" <?php post_class('sxn');?>>
  <div class="entry-content sxn">
    <?php get_template_part ('assets/layout/post/post','title'); ?>
    <div class="entry-body">
      <?php the_excerpt();?>
    </div>
    <?php get_template_part ('assets/layout/post/post','footer'); ?>
  </div><!-- .entry-content -->
</div><!-- #post-## -->
<?php endwhile;?>
<?php augusta_loop_after() ?>