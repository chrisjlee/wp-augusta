<?php
/*
*		Custom Functions 
*		
*		PLEASE BE SURE TO VISIT:
*		/assets/includes/functions/settings.php
*		
*		That file will change certain functionality; 
*		
*/ 


@add_theme_support( 'nav-menus' );
@add_theme_support( 'post-thumbnails' );
@add_theme_support( 'editor-style' );
@add_theme_support( 'widgets' );
@add_theme_support( 'menus' );

/* Include files
--------------------------------------------- */
// Path constants
if ( is_child_theme() ) define('THMURL', STYLESHEETPATH . '/assets/includes');
else define('THMURL', TEMPLATEPATH . '/assets/includes');

//	Autoload Common Functions
require_once(THMURL . '/functions/common.php');
require_once(THMURL . '/functions/settings.php');

$content_width = CONFIG_CONTENT_WIDTH;


function custom_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Front Page: Primary Widget Area', 'twentyten' ),
		'id' => 'front',
		'description' => __( 'The primary widget area for the front page only', 'twentyten' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	) );	
	register_sidebar( array(
		'name' => __( 'Front Page: Secondary Widget Area', 'twentyten' ),
		'id' => 'front-secondary',
		'description' => __( 'The Secondary Widget area for the Front Page only', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	) );
	register_sidebar( array(
		'name' => __( 'Pages: Primary Widget Area', 'twentyten' ),
		'id' => 'page',
		'description' => __( 'The Primary Widget area for all Pages', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	) );
	register_sidebar( array(
		'name' => __( 'Blog: Primary Widget Area', 'twentyten' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	) );

	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Blog: Secondary Widget Area', 'twentyten' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'The secondary widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	) );

	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'twentyten' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	) );

	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'twentyten' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'twentyten' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 6, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'twentyten' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', 'twentyten' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
/** Register sidebars by running twentyten_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'custom_widgets_init' );
if ( ! function_exists( 'custom_slider' ) ) :

function custom_slider($category = 'featured', $postcount = '10'){
?>
		<div id="slider">
		<?php $q = new WP_Query("category_name=$category&showposts=$postcount"); if( $q->have_posts() ) : while($q->have_posts()) : $q->the_post();?>	
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> 
				<?php the_post_thumbnail();?>	
			</a>
			<?php endwhile; endif;?>
		</div><!--/slider-->
<?php }
endif;

/**
 *	Template for comments and pingbacks.
 *
 *	Used as a callback by wp_list_comments() for displaying the comments.
 *
 *	@since Speaky 1.0
 */
function twentyten_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'twentyten' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'twentyten' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( 'Edit', 'twentyten' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
		break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'twentyten' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'twentyten'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}

/**
 * Globerunner Dashboard Widget
 */
function remove_footer_admin () {
    echo 'Fueled by <a href="http://www.wordpress.org" target="_blank">WordPress</a> | Globerunnerseo.com: <a href="http://www.Globerunnerseo.com" target="_blank">Dallas SEO</a></p>';
} 


function thm_favicon_link() {
    echo '<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />' . "\n";
}
add_action('wp_head', 'thm_favicon_link');
add_action('wp_head', 'twentyten_setup');
add_action('widgets_init', 'custom_widgets_init' );

add_filter('widget_content', 'make_alternating_widget_styles');

/*
 *  @todo make alternating widget styles 
 *  Work In Progress
 * 
 * */
function make_alternating_widget_styles($content='')
{   
  global $wl_make_alt_ws;
    $wl_make_alt_ws=($wl_make_alt_ws=="style_a")?"style_b":"style_a";
    return preg_replace('/(class="widget )/', "$1 widget_${wl_make_alt_ws} ", $content);
var_dump($content);
}


?>