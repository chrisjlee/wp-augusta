<?php 
/*	Wordpress Script Loader
 *  
 *  description: file loads all the scripts and stylesheets  
 *  version: 1.3 
 *  author: Chris J. Lee
 *  contributor: Felipe Rocha
 *  
 */

/*	
 * 	Obtain URL For stylesheet
 */

if ( is_child_theme() ) $themeurl = get_bloginfo('stylesheet_directory'); 
else $themeurl = get_bloginfo('template_directory');


/* 
 * Folder Shortcuts
 * 
 * T_DIR 	Path to Child Theme
 * T_CSS 	Path to css files
 * T_CSSPG 	Path to CSS Pages
 * T_JS 	Path to js Files
 * 
 */
// Theme Directory
DEFINE('T_DIR', $themeurl );
// Theme CSS
DEFINE('T_CSS', $themeurl."/assets/css" );
// Theme CSS for Pages
DEFINE('T_CSSPG', $themeurl."/assets/css/pages" );
// Theme Javascript
DEFINE('T_JS', $themeurl."/assets/js" );



/*
*	
*	Google CDN links:
*	http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js
*	http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.js
*	http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.js
*	http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js
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
* 	wp_enqueue_style( $handle, $src, $deps, $ver, $media )  
*/


/*		CSS for All Pages
*********************************************************/
	wp_enqueue_style('t_reset',  T_CSS.'/reset.css', '1.0', 'screen');
	wp_enqueue_script('t_main',  T_CSS.'/main.css', array('t_reset'), '1.0', 'screen');
	wp_enqueue_style('t_common', T_CSS.'/common.css', array('t_reset'), '1.0', 'screen');

/*		Javascript for All Pages
*********************************************************/
	//wp_enqueue_style('t_960_24_col', $tcss.'/960gs/960_24_col.css', array('t_960reset'), '1.0', 'screen');
	wp_enqueue_script('jquery'); // uses No conflict mode
	wp_enqueue_script('jquery-ui-core', T_JS.'/plugins/ui/jquery-ui-latest.custom.min.js', array('jquery') );
	wp_enqueue_script('t_core', $tjs.'/pages/core.js', array('jquery'), '1.0.1');


/*		960gs Framework for All Pages
*********************************************************/
if (CONFIG_960GS == true) {  
	wp_enqueue_style('t_960', T_CSS.'/960gs/960.css',array('t_960reset','t_960text') , '1.0', 'screen');
	wp_enqueue_style('t_960reset', T_CSS.'/960gs/reset.css', '1.0', 'screen');
	wp_enqueue_style('t_960text', T_CSS.'/960gs/text.css', array('t_960reset'), '1.0', 'screen');
	if (wp_style_is('t_reset'))  wp_deregister_style('t_reset');
	if (wp_style_is('t_main'))  wp_deregister_style('t_main');
	wp_enqueue_style('t_main', T_CSS.'/main.css', array('t_960reset'), '1.0', 'screen');		
}

/*		Color Box
*********************************************************/
// @todo Need to test
if (CONFIG_COLORBOX == true) { 
	if (preg_match('1-5',CONFIG_COLORBOX_THEME) ) {
		wp_enqueue_style('t_colorbox', T_JS.'/plugins/colorbox/example'.CONFIG_COLORBOX_THEME.'/colorbox.css', '1.0', 'screen');
	else if (preg_match('custom',CONFIG_COLORBOX_THEME) {
		wp_enqueue_style('t_colorbox', T_JS.'/plugins/colorbox/custom/colorbox.css', '1.0', 'screen');
	}	else { 
		wp_enqueue_style('t_colorbox', T_JS.'/plugins/colorbox/example4/colorbox.css', '1.0', 'screen');
	}
	if ( wp_script_is('thickbox') && !is_admin() ) wp_deregister_script('thickbox');
	wp_enqueue_script('t_colorbox', T_JS.'/plugins/colorbox/colorbox/jquery.colorbox-min.js', array('jquery'), '1.4', true ); 	
}

/*		Dropdowns
*********************************************************/
if (CONFIG_DROPDOWN == true) { 
	wp_enqueue_style('t_superfish', T_JS.'/plugins/superfish/css/superfish.css', '1.0', 'screen');	
	wp_enqueue_style('t_superfish_custom', T_JS.'/plugins/superfish/css/superfish.custom.css', array('t_superfish'), '1.0', 'screen');	
	wp_enqueue_script('t_superfish', T_JS.'/plugins/superfish/js/superfish.js', array('jquery'), '1.0.0' );
	wp_enqueue_script('t_superfish_supersubs', T_JS.'/plugins/superfish/js/supersubs.js', array('jquery', 't_superfish'), '1.0.0', true );	
	wp_enqueue_script('t_superfish_bgiframe', T_JS.'/plugins/superfish/js/jquery.bgiframe.min.js', array('jquery', 't_superfish'), '1.0.0', true );		
	wp_enqueue_script('t_superfish_config', T_JS.'/plugins/superfish/js/superfish.config.js', array('jquery', 't_superfish'), '1.0.0' ); 		
}

/*		Innerfade
*********************************************************/
if (CONFIG_INNERFADE == true) { 
	wp_enqueue_script('innerfade', T_JS.'/plugins/jquery.innerfade/js/jquery.innerfade.js', array('jquery'), '1.0.0');	 		
}


/*		jQueryUI
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


/*		Truncate Recent Posts Titles
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

/*		Blog
*********************************************************/
if ( is_home() ) { 
		wp_enqueue_style('t_blog', T_CSSPG.'/blog.css', array('t_main'), 'screen'); 
}

/*		Front
*********************************************************/
if ( is_front_page() ) { 
	wp_enqueue_style('t_front', T_CSSPG.'/front.css', array('t_main'), 'screen'); 
	wp_enqueue_script( 't_front', T_JS.'/pages/front.js', array('jquery'), '1.0.0', TRUE);						
}

/*		Subpages
*********************************************************/
if ( !is_home() && !is_front_page() ) { 
	wp_enqueue_style('t_sub', T_CSSPG.'/sub.css', 'screen'); 
}

?>