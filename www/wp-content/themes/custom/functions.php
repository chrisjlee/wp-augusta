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

/**
 * Tell WordPress to run twentyeleven_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'augusta_setup' );

/* Setup Path Constants 
 * @since 0.0.1
--------------------------------------------- */
if ( is_child_theme() ) {
  define('AUGUSTA_ASSETS', STYLESHEETPATH . '/assets');
  define('AUGUSTA_INC', STYLESHEETPATH . '/assets/inc');
  define('AUGUSTA_HOOK', STYLESHEETPATH . '/assets/inc/hooks');
}
else {
  define('AUGUSTA_ASSETS', TEMPLATEPATH . '/assets');
  define('AUGUSTA_INC', STYLESHEETPATH . '/assets/inc');
  define('AUGUSTA_HOOK', STYLESHEETPATH . '/assets/inc/hooks');
}

/**
 * Autoload files
 --------------------------------------------- */
require_once( AUGUSTA_INC . '/functions/common.php');
require_once( AUGUSTA_INC . '/functions/helpers.php');

require_once( AUGUSTA_ASSETS . '/bootstrap.php');
require_once( AUGUSTA_ASSETS . '/settings.php');
// Load Hooks
require_once( AUGUSTA_HOOK . '/augusta-menu.php');
require_once( AUGUSTA_HOOK . '/augusta-classes.php');

/*
 * Implements hook init()
 * Function sets up theme initializing widgets and adding theme support
 * */
if ( ! function_exists( 'augusta_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override twentyeleven_setup() in a child theme, add your own twentyeleven_setup to your child theme's
 * functions.php file.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To style the visual editor.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links, and Post Formats.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Eleven 1.0
 */
function augusta_setup() {
  // Setup Support for Nav Menus  
  add_theme_support( 'nav-menus' );
  
  // Enable Post Thumbnails
  add_theme_support( 'post-thumbnails' );
  
  // Enable Editor Styles
  add_theme_support( 'editor-style' );
  
  // Turn on ability to use widgets
  add_theme_support( 'widgets' );
  
  // Enable Menu support
  add_theme_support( 'menus' );
  
  // Add default posts and comments RSS feed links to <head>.
  add_theme_support( 'automatic-feed-links' );

  // This theme uses wp_nav_menu() in one location.
  register_nav_menu( 'primary', __( 'Primary Menu', 'twentyeleven' ) );

  // Add support for a variety of post formats
  add_theme_support( 'post-formats', array( 'aside', 'link', 'gallery', 'status', 'quote', 'image' ) );

  // Add support for custom backgrounds
  add_custom_background();

  // This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
  add_theme_support( 'post-thumbnails' );

  // The next four constants set how Twenty Eleven supports custom headers.

  // The default header text color
  define( 'HEADER_TEXTCOLOR', '000' );

  // By leaving empty, we allow for random image rotation.
  define( 'HEADER_IMAGE', '' );

  // The height and width of your custom header.
  // Add a filter to twentyeleven_header_image_width and twentyeleven_header_image_height to change these values.
  define( 'HEADER_IMAGE_WIDTH', apply_filters( 'augusta_header_image_width', 1000 ) );
  define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'augusta_header_image_height', 288 ) );

  // We'll be using post thumbnails for custom header images on posts and pages.
  // We want them to be the size of the header image that we just defined
  // Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
  set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );
  
  // Add Augusta's custom image sizes
  add_image_size( 'large-feature', HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true ); // Used for large feature (header) images
  add_image_size( 'small-feature', 500, 300 ); // Used for featured posts if a large-feature doesn't exist
  
}
endif;

  /** Register sidebars by running augusta_widgets_init() on the widgets_init hook. */
  add_action( 'widgets_init', 'augusta_widgets_init' );
  /** Setup Hook for favicon */
  add_action('wp_head', 'augusta_favicon_link');
  /** Add hook to be executed with wp_head */
  add_action('wp_head', 'augusta_setup');

/*
 * Implements:
 * widgets_init
 */
if ( !function_exists('augusta_widgets_init') ) :
  function augusta_widgets_init() {
    
  }
endif; 

if ( !function_exists('augusta_widgets_link') ) :
  function augusta_favicon_link() {
    echo '<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />' . "\n";
  }
endif;  
  //add_filter('widget_content', 'make_alternating_widget_styles');
  
  
 /**
 * Sets the post excerpt length to 40 words.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 */
function augusta_excerpt_length( $length ) {
  return 40;
}
add_filter( 'excerpt_length', 'augusta_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 */
function augusta_continue_reading_link() {
  return ' <a href="'. esc_url( get_permalink() ) . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and twentyeleven_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 */
function augusta_auto_excerpt_more( $more ) {
  return ' &hellip;' . twentyeleven_continue_reading_link();
}
add_filter( 'excerpt_more', 'augusta_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 */
function augusta_custom_excerpt_more( $output ) {
  if ( has_excerpt() && ! is_attachment() ) {
    $output .= twentyeleven_continue_reading_link();
  }
  return $output;
}
add_filter( 'get_the_excerpt', 'augusta_custom_excerpt_more' );

/**
 * Augusta Custom Hooks
 */

function augusta_header() {
    do_action('augusta_header');
}
function augusta_menu() {
    do_action('augusta_menu');
}
function augusta_hero() {
    do_action('augusta_hero');
}
function augusta_content_before() {
    do_action('augusta_before');
}
function augusta_content() {
    do_action('augusta_content');
}
function augusta_content_after() {
    do_action('augusta_after');
}
function augusta_branding() {
    do_action('augusta_branding');
}
function augusta_footer() {
    do_action('augusta_footer');
}

function zone_content_above_class() {
  do_action ('zone_content_above_class');
}
function zone_content_class() {
  do_action ('zone_content_class');
}
function zone_content_below_class() {
  do_action ('zone_content_above_class');
}
/*
 * Globe Runner Hooks
 */
function grs_generator() {
  do_action ('grs_generator');
}


function augusta_zone_content_above_class() {
  echo "grid_16";
}
add_action('zone_content_above_class', 'augusta_zone_content_above_class');
