<?php 
/*  @package Wordpress
 *  @subpackage Augusta
 *  description: file loads all the scripts and stylesheets  
 *  @version: 1.3 
 *  @author: Chris J. Lee
 */

/** Obtain URL For stylesheet */
if ( is_child_theme() ) $themeurl = get_bloginfo('stylesheet_directory'); 
else $themeurl = get_bloginfo('template_directory');

/* 
 * Setup Folder Shortcuts
 * 
 * AUG_DIR  Path to Child Theme
 * AUG_CSS  Path to css files
 * AUG_CSSPG  Path to CSS Pages
 * AUG_JS   Path to js Files
 * 
 */
// Theme Directory
DEFINE('AUG_DIR', $themeurl );
// Theme CSS
DEFINE('AUG_CSS', $themeurl."/assets/css" );
// Theme CSS for Pages
DEFINE('AUG_CSSPG', $themeurl."/assets/css/pages" );
// Theme Javascript
DEFINE('AUG_JS', $themeurl."/assets/js" );

/*
* Setup Product CDN links to Javascript
* Google CDN links:
* http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js
* http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js
* http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.js
* http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js
* 
*/
wp_register_script('jquery-ui-latest-cdn', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js');
wp_register_script('jquery-latest-cdn', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js');

/*
* Wordpress Reference for wp_enqueue_script & wp_enqueue_style
* REFERENCE:
* wp_enqueue_style($handle, $source, $dependencies, $version, $media); 
* EXAMPLE:
* wp_enqueue_style('mystyles', '/wp-content/plugins/myplugin/style.css', array('otherstyles', 'morestyles'), '1.0′, 'screen');
* wp_deregister_script();
* REFERENCE: http://codex.wordpress.org/Function_Reference/wp_enqueue_style
*   wp_enqueue_style( $handle, $src, $deps, $ver, $media )  
*/


/*    CSS for All Pages
*********************************************************/
function augusta_enqueue_styles_core (){
  wp_enqueue_style('aug-reset',  AUG_CSS.'/reset.css', '1.0', 'screen');
  wp_enqueue_script('aug-main',  AUG_CSS.'/main.css', array('aug-reset'), '1.0', 'screen');
  wp_enqueue_style('aug-common', AUG_CSS.'/common.css', array('aug-reset'), '1.0', 'screen');
}
add_action('wp_enqueue_styles','augusta_enqueue_styles_core');

/*    Javascript for All Pages
*********************************************************/
  //wp_enqueue_style('AUG_960_24_col', $tcss.'/960gs/960_24_col.css', array('AUG_960reset'), '1.0', 'screen');
  wp_enqueue_script('jquery'); // uses No conflict mode
  wp_enqueue_script('jquery-ui-core', AUG_JS.'/plugins/ui/jquery-ui-latest.custom.min.js', array('jquery') );
  wp_enqueue_script('aug-core', AUG_JS.'/pages/core.js', array('jquery'), '1.0.1');

/* If you're going to be using 960gs there is 
 * a different reset.css file. 960gs has a different
 * reset file than the Eric Meyer reset css file
 * 
 * 960gs Framework for All Pages
*********************************************************/
if (CONFIG_960GS == true) {  
  wp_enqueue_style('aug-960', AUG_CSS.'/960gs/960.css',array('aug-960-reset','aug-960text') , '1.0', 'screen');
  wp_enqueue_style('aug-960reset', AUG_CSS.'/960gs/reset.css', '1.0', 'screen');
  wp_enqueue_style('aug-960text', AUG_CSS.'/960gs/text.css', array('aug-960reset'), '1.0', 'screen');
  if (wp_style_is('aug-reset'))  wp_deregister_style('aug-reset');
  if (wp_style_is('aug-main'))  wp_deregister_style('aug-main');
  wp_enqueue_style('aug-main', AUG_CSS.'/main.css', array('AUG_960reset'), '1.0', 'screen');    
}

/**   jQuery UI  
 *********************************************************/
if (CONFIG_JQUERYUI == true) { 
  // Initialize the Latest
  wp_enqueue_script( 'jquery-ui-latest', T_DIR.'/js/ui/jquery-ui-latest.custom.min.js', array('jquery'), '1.8.5');
  wp_enqueue_script( 'jquery-ui-core' );
  
  function init_jqueryui() {  
    if(!is_admin()) { 
      wp_deregister_script('jquery-ui-core');
        wp_register_script('jquery-ui-core', 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js', array('jquery'), '1.8.4', false);
      } 
  }
  add_action('init','init_jqueryui');
}

/*    Color Box
*********************************************************/
// @todo Need to test
if (CONFIG_COLORBOX == true) { 
  if (preg_match('/1-5/',CONFIG_COLORBOX_THEME) ) {
    wp_enqueue_style( 'AUG_colorbox', AUG_JS.'/plugins/colorbox/example'. CONFIG_COLORBOX_THEME . '/colorbox.css', '1.0', 'screen' );
  } else if ( strpos( 'custom',CONFIG_COLORBOX_THEME) === 0 ) {
    wp_enqueue_style( 'AUG_colorbox', AUG_JS.'/plugins/colorbox/custom/colorbox.css', '1.0', 'screen');
  } else { 
    wp_enqueue_style('AUG_colorbox', AUG_JS.'/plugins/colorbox/example4/colorbox.css', '1.0', 'screen');
  } 
  /** Remove Thickbox if you're going to use colorbox */
  if ( wp_script_is('thickbox') && !is_admin() ) wp_deregister_script('thickbox');
  wp_enqueue_script('AUG_colorbox', AUG_JS.'/plugins/colorbox/colorbox/jquery.colorbox-min.js', array('jquery'), '1.4', true );   
}

/*  Dropdowns
 *  Auto-enable dropdowns on every website
*********************************************************/
if (CONFIG_DROPDOWN == true) { 
  wp_enqueue_style('aug_superfish', AUG_JS.'/plugins/superfish/css/superfish.css', '1.0', 'screen');  
  wp_enqueue_style('aug_superfish_custom', AUG_JS.'/plugins/superfish/css/superfish.custom.css', array('aug_superfish'), '1.0', 'screen');  
  wp_enqueue_script('aug_superfish', AUG_JS.'/plugins/superfish/js/superfish.js', array('jquery'), '1.0.0' );
  wp_enqueue_script('aug_superfish_supersubs', AUG_JS.'/plugins/superfish/js/supersubs.js', array('jquery', 'aug_superfish'), '1.0.0', true );  
  wp_enqueue_script('aug_superfish_bgiframe', AUG_JS.'/plugins/superfish/js/jquery.bgiframe.min.js', array('jquery', 'aug_superfish'), '1.0.0', true );   
  wp_enqueue_script('aug_superfish_config', AUG_JS.'/plugins/superfish/js/superfish.config.js', array('jquery', 'aug_superfish'), '1.0.0' );    
}

/**   Innerfade   */
if ( !function_exists('augusta_enqueue_innerfade' ) ) :
  function augusta_enqueue_innerfade() {
    if (CONFIG_INNERFADE === true) { 
      wp_enqueue_script('innerfade', AUG_JS.'/plugins/jquery.innerfade/js/jquery.innerfade.js', array('jquery'), '1.0.0');      
    }
  }
add_action('wp_enqueue_script','augusta_enqueue_innerfade');
endif;
/*    Truncate Recent Posts Titles
*********************************************************/
if (CONFIG_WIDGET_CUSTOM_POST_TRUNC == true) { 
  
  function example_load_widgets() {
    register_widget( 'WP_Widget_Recent_Custom' );
  }
  class WP_Widget_Recent_Custom extends WP_Widget {
  
    function WP_Widget_Recent_Custom() {
      $widget_ops = array('classname' => 'widget_recent_entries', 'description' => __( "The most recent posts on your site") );
      $this->WP_Widget('recent-posts', __('Recent Posts Custom'), $widget_ops);
      $this->alt_option_name = 'widget_recent_entries';
  
      add_action( 'save_post', array(&$this, 'flush_widget_cache') );
      add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
      add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
    }
  
    function widget($args, $instance) {
      $cache = wp_cache_get('widget_recent_posts', 'widget');
  
      if ( !is_array($cache) )
        $cache = array();
  
      if ( isset($cache[$args['widget_id']]) ) {
        echo $cache[$args['widget_id']];
        return;
      }
  
      ob_start();
      extract($args);
  
      $title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts') : $instance['title'], $instance, $this->id_base);
      if ( !$number = (int) $instance['number'] )
        $number = 10;
      else if ( $number < 1 )
        $number = 1;
      else if ( $number > 15 )
        $number = 15;
  
      $r = new WP_Query(array('showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'caller_get_posts' => 1));
      if ($r->have_posts()) :
      ?>
      <?php echo $before_widget; ?>
      <?php if ( $title ) echo $before_title . $title . $after_title; ?>
      <ul>
      <?php  while ($r->have_posts()) : $r->the_post(); ?>
      <li>
        <a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>">
        <?php 
        // YOUR TITLE TRUNCATING CODE GOES HERE
        if ( get_the_title() ) {
          $title = get_the_title();
          if (strlen($title) >= 25) $title = substr($title, 0, 25) . "...";
          echo $title;
        }
        else {
          the_ID(); 
        }
        ?>
        </a>
      </li>
      <?php endwhile; ?>
      </ul>
      <?php echo $after_widget; ?>
      <?php
      // Reset the global $the_post as this query will have stomped on it
      wp_reset_postdata();
  
      endif;
  
      $cache[$args['widget_id']] = ob_get_flush();
      wp_cache_set('widget_recent_posts', $cache, 'widget');
    }
  
    function update( $new_instance, $old_instance ) {
      $instance = $old_instance;
      $instance['title'] = strip_tags($new_instance['title']);
      $instance['number'] = (int) $new_instance['number'];
      $this->flush_widget_cache();
  
      $alloptions = wp_cache_get( 'alloptions', 'options' );
      if ( isset($alloptions['widget_recent_entries']) )
        delete_option('widget_recent_entries');
  
      return $instance;
    }
  
    function flush_widget_cache() {
      wp_cache_delete('widget_recent_posts', 'widget');
    }
  
    function form( $instance ) {
      $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
      if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
        $number = 5; 
      ?>
      <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
  
      <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:'); ?></label>
      <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
    <?php
    }
  }
}

/**
 * CSS Autoloading
 * Load css by different page template types
 */
if (!function_exists('augusta_enqueue_scripts')) :
function augusta_enqueue_scripts() {
  /*  Blog
  *********************************************************/
  if ( is_home() ) { 
      wp_enqueue_style('AUG_blog', AUG_CSSPG.'/blog.css', array('AUG_main'), 'screen'); 
  }
  
  /*  Front
  *********************************************************/
  if ( is_front_page() ) { 
    wp_enqueue_style('aug_front', AUG_CSSPG.'/front.css', array('aug_main'), 'screen'); 
    wp_enqueue_script( 'aug_front', AUG_JS.'/pages/front.js', array('jquery'), '1.0.0', TRUE);            
  }
  
  /*  Subpages
  *********************************************************/
  if ( !is_home() && !is_front_page() ) { 
    wp_enqueue_style('aug_sub', AUG_CSSPG.'/sub.css', 'screen'); 
  }
}

endif; 
add_action('wp_enqueue_scripts','augusta_enqueue_scripts');

/**/
