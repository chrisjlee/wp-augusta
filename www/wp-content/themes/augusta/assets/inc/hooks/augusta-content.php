<?php 
 /**
 * Augusta Class Hooks
 * @author Chris J. Lee
 * @since 1.0.0
 * 
 * This will allow you to write and 
 * override any classes for each zone.
 * The class hooks acts as routers. They
 * provide the developer to write rules
 * for each context and have it product classes
 * 
 * Each hook has a setup hook.
 *  - hook_class -> hook_class_setup
 * Each setup hook contains the name of the zone
 * 
 * Implementing Child Hooks:
 * 
 * If you need to override any hook 
 * each function will look for a function with
 * the prefix of 'custom_' before the hook and the hook
 * will not be initiated.
 * 
 */

 /**
  * Augusta: the_content
  * 
  * Provides hookability to
  * modify the_content function
  * found in Wordpress Core
  * 
  */
function augusta_the_content() {
  echo apply_filters('the_content', 'augusta_content');
} 
 
/**
 * Augusta Slideshow 
 * Implements augusta_slideshow
 * called on front page
 * 
 * Borrowed from twentyten
 */
if (!function_exists('custom_slideshow_setup')) { // allow child theme to override
  function augusta_slideshow_setup () { 
    // Check if this is a post or page, if it has a thumbnail, and if it's a big one
    if ( is_singular() && has_post_thumbnail($post->ID) && ($image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail')) && $image[1] >= HEADER_IMAGE_WIDTH) { 
      echo get_the_post_thumbnail($post->ID, 'post-thumbnail');
    }
    else { 
      ?><img src="<?php header_image();?>" width="<?php echo HEADER_IMAGE_WIDTH;?>" height="<?php echo HEADER_IMAGE_HEIGHT;?>" alt="" /><?php
    }
    // Additional Header images for slideshow
    $meta_values = get_post_meta($post->ID, "header", false);
    if (isset($meta_values) && (count($meta_values) == 1)) { 
      ?><img class="slideshow" src="<?php echo $meta_values[0] ?>" width="<?php echo HEADER_IMAGE_WIDTH;?>" height="<?php echo HEADER_IMAGE_HEIGHT;?>" /><?php
    }
    elseif (isset($meta_values) && is_array($meta_values)) {
      foreach ($meta_values as $value) {
        $output = '<img src="'.$value.'" width="' . HEADER_IMAGE_WIDTH .'" height="' . HEADER_IMAGE_HEIGHT . '" /> ';
      }
      echo $output;
    } else {
      echo '<!--no images-->';
    }
  }
  add_action('augusta_slideshow', 'augusta_slideshow_setup');
}

/**
 * Augusta Content Before
 * @todo documentating
 */
function augusta_content_before_setup($output='', $class='') {
  $class = content_class();
  $output = "<!--START #region-content-->\n";
  if (!empty($class)) {
    $output .= "<div id='region-content' class='region-content $class'>";
  } else {
    $output .= "<div id='region-content' class='region-content grid-12'>";
  }
  return print apply_filters( 'augusta_content_before_setup', $output, $class );
} 
add_filter('augusta_content_before', 'augusta_content_before_setup');

/**
 * Augusta Content after
 * @todo documentating
 */
function augusta_content_after_setup($output = '') {
  $output = "\n  </div><!--END #region-content-->";
  return print apply_filters('augusta_content_after_setup', $output);
}
add_filter('augusta_content_after', 'augusta_content_after_setup');

/**
 * Augusta Section Content
 * 
 */

/** Section Content before  */
function section_content_before_setup($output = '') {
  $class = section_content_class();
  if (empty($class)) $class = 'container-16 section section-content'; 
  $output = "<!-- START #section-content -->\n  <div id='section-content' class=' $class' >";
  return print apply_filters('section_content_before_setup', $output);
}
add_filter('section_content_before', 'section_content_before_setup');

/** Section Content After  */
function section_content_after_setup($output = '') {
  $output = "</div><!--END #section-content-->";
  return print apply_filters('section_content_after_setup', $output);
}
add_filter('section_content_after', 'section_content_after_setup');

/**
 * Post Formatters
 ----------------------------------------*/

/**
 * Augusta Link Pages 
 * Implements augusta_link_pages
 * called on /assets/layout/post/post-link-pages.php
 * 
 * @param array() takes in the arguments for wp_link_pages
 * 
 */
if (!function_exists('custom_link_pages_setup')) { // allow child theme to override
  function augusta_link_pages_setup($args) {
    if (!$args) {
      $args = array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number');
      
    }
    return wp_link_pages( $args );
  }
}
