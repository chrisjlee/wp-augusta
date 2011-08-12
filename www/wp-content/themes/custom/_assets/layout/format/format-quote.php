<?php
/**
 * Augusta Post Format Quote 
 * 
 * @package Wordpress
 * @subpackage Augusta
 * @author Chris J. Lee - iam@chrisjlee.net
 * @contributor Felipe Rocha  
 * 
 * @todo well yea duh
 * 
 * Wordpress Format Used for Status 
 * Updates. Used often in tumblr
 * like updates
 * 
 */
?>
<?php do_action('augusta_loop_before'); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-post-format post-format-quote">
    <div class="entry-header">
      <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'augusta' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
      <p><?php echo get_the_date(); ?> <?php _e( 'by', 'augusta' ); ?> <?php the_author() ?> | <?php comments_popup_link( __( '0 comments', 'augusta' ), __( '1 Comment', 'augusta' ), __( '% Comments', 'augusta' ) ); ?></p>
    </div><!-- end entry-header -->
      <?php the_content( __( 'Continue Reading &rarr;', 'augusta' ) ); ?>   
      <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'augusta' ), 'after' => '</div>' ) ); ?>          
    <div class="entry-meta">
      <?php $tags_list = get_the_tag_list( '', ', ' ); 
      if ( $tags_list ): ?>
      <?php printf( __( 'Tags: %2$s', 'augusta' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?> | 
      <?php endif; ?>
      <a href="<?php echo get_permalink(); ?>"><?php _e( 'Permalink ', 'augusta' ); ?></a>
      <?php edit_post_link( __( 'Edit &rarr;', 'augusta' ), '| <span class="edit-link">', '</span>' ); ?></p>
    </div><!-- end entry-meta -->
  </div><!-- end entry-post-format -->
</div><!-- end post-<?php the_ID(); ?> -->
<?php do_action('augusta_loop_after'); ?>