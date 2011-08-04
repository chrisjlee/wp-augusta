<?php
/**
 * @package Wordpress
 * @subpackage Augusta
 * @author Chris J. Lee - iam@chrisjlee.net
 * @contributor Felipe Rocha  
 * @description File Contains the necessary setup 
 * initialization for hooks, auto loading 
 * the necessary files as well as  creating constants
 * 
 * File Structure process for child themes:
 * - Configure Settings files: 
 *      /assets/settings.php
 * * - Configure Settings files: 
 *      /assets/settings.php
 * - Setup Custom Hooks 
 *     /assets/hooks/custom-hooks.php
 */ 

/**
 * Let's get Wordpress to notice augusta you sexy thing!
 */
add_action( 'after_setup_theme', 'augusta_setup' );

 /** 
 * Setup Path Constants for php files
 * This will define the correct constants of 
 * regardless of if it's a child theme or not 
 * @since 0.0.1
 * 
 * AUGUSTA_ASSETS - path to assets folder 
 * AUGUSTA_INC - /assets/inc
 * AUGUSTA_HOOK - path to hooks folder 
 * 
 */
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
 * Autoload files - Don't Change this!
 --------------------------------------------- */
// Loads all the constants - /assets/bootstrap.php is dependant on
require_once( AUGUSTA_ASSETS . '/settings.php');
// Bootstrap file loads all the css / js files automatically
require_once( AUGUSTA_ASSETS . '/bootstrap.php');
// Contains a library of common functions
require_once( AUGUSTA_INC . '/functions/common.php');
// Contains library of template formatters change to html5, page title, etc
require_once( AUGUSTA_INC . '/functions/helper.php');

/** Welcome to hookland. Load my augusta hooks */
// Define hooks
require_once( AUGUSTA_HOOK . '/augusta-core.php');
// Load Specific Menu Hooks, modify and define your menus here
require_once( AUGUSTA_HOOK . '/augusta-menu.php');
// Hooks that define zones, regions css classes. 
// augusta-layout (below) depends on this
require_once( AUGUSTA_HOOK . '/augusta-classes.php');
// Directs each layout template to the correct template part
require_once( AUGUSTA_HOOK . '/augusta-layout.php');
/** Augusta Hooks: Sections */
// Load Header Hooks
require_once( AUGUSTA_HOOK . '/augusta-header.php');
// Load Content Hooks
require_once( AUGUSTA_HOOK . '/augusta-content.php');
// Load Footer / Meta
require_once( AUGUSTA_HOOK . '/augusta-footer.php');
/** Augusta Hooks: Responsive Styles/Grids */
// Load the responsive layouts loads stylesheets 
require_once( AUGUSTA_HOOK . '/augusta-responsive.php');

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
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To style the visual editor.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links, and Post Formats.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since 0.0.5
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
  register_nav_menu( 'primary', __( 'Primary Menu', 'augusta' ) );
    // This theme uses wp_nav_menu() in one location.
  register_nav_menu( 'secondary', __( 'Secondary Menu', 'augusta' ) );

  // Add support for a variety of post formats
  add_theme_support( 'post-formats', array( 'aside', 'link', 'gallery', 'status', 'quote', 'image' ) );
  // Add support for custom backgrounds
  add_custom_background();
  // This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
  add_theme_support( 'post-thumbnails' );

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
  add_action( 'wp_head', 'augusta_favicon_link' );
  /** Add hook to be executed with wp_head */
  add_action( 'wp_head', 'augusta_setup' );

/*
 * Implements widgets_init
 */
if ( !function_exists( 'custom_widgets_init' ) ) :
  function augusta_widgets_init() {
    //register_widget( 'Augusta_Widget' );

  register_sidebar( array(
    'name' => __( 'Main Sidebar', 'augusta' ),
    'id' => 'sidebar-1',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<div class="widget-title"><h2>',
    'after_title' => '</h2></div>',
  ) );

  register_sidebar( array(
    'name' => __( 'Sidebar Second ', 'augusta' ),
    'id' => 'sidebar-2',
    'description' => __( 'Second Sidebar', 'augusta' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s sidebar-second">',
    'after_widget' => "</div>",
    'before_title' => '<div class="widget-title"><h2>',
    'after_title' => '</h2></div>',
  ) );

  register_sidebar( array(
    'name' => __( 'Blog: Sidebar ', 'augusta' ),
    'id' => 'sidebar-3',
    'description' => __( 'Sidebar for the blog', 'augusta' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s sidebar-blog">',
    'after_widget' => "</div>",
    'before_title' => '<div class="widget-title"><h2>',
    'after_title' => '</h2></div>',
  ) );

  register_sidebar( array(
    'name' => __( 'Footer Area One', 'augusta' ),
    'id' => 'sidebar-4',
    'description' => __( 'An optional widget area for your site footer', 'augusta' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<div class="widget-title"><h2>',
    'after_title' => '</h2></div>',
  ) );

  register_sidebar( array(
    'name' => __( 'Footer Area Two', 'augusta' ),
    'id' => 'sidebar-5',
    'description' => __( 'An optional widget area for your site footer', 'augusta' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<div class="widget-title"><h2>',
    'after_title' => '</h2></div>',
  ) );

  register_sidebar( array(
    'name' => __( 'Footer Area Three', 'augusta' ),
    'id' => 'sidebar-6',
    'description' => __( 'An optional widget area for your site footer', 'augusta' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget' => "</div>",
    'before_title' => '<div class="widget-title"><h2>',
    'after_title' => '</h2></div>',
  ) );
  }
endif; 

/**
 * Augusta_favicon_link
 * 
 * Borrowed from Augusta
 */
if ( !function_exists('augusta_widgets_link') ) :
  function augusta_favicon_link() {
    echo '<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />' . "\n";
  }
endif;  
  
 /**
 * Sets the post excerpt length to 40 words.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 */
if ( !function_exists( 'custom_excerpt_length' ) ) :
  function augusta_excerpt_length( $length ) {
    return 40;
  }
endif;
add_filter( 'excerpt_length', 'augusta_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 */
function augusta_continue_reading_link() {
  return ' <a href="'. esc_url( get_permalink() ) . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>' ) . '</a>';
}

/**
 * Augusta Auto Excerpt
 * 
 * Borrowed from Twentyeleven
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and Augusta_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 * 
 */
function augusta_auto_excerpt_more( $more ) {
  return ' &hellip;' . augusta_continue_reading_link();
}
add_filter( 'excerpt_more', 'augusta_auto_excerpt_more' );

/**
 * Augusta Custom Excerpt Modification
 * 
 * Borrowed from Twentyeleven
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 */
function augusta_excerpt_more( $output ) {
  if ( has_excerpt() && !is_attachment() ) {
    $output .= augusta_continue_reading_link();
  }
  return $output;
}
add_filter( 'get_the_excerpt', 'augusta_excerpt_more' );

// function custom_doctype_setup($output) {
  // $output = "<html>";
  // //return print apply_filters('augusta_doctype','augusta_doctype', $output);
  // return print "<html>";  
  // //add_action('augusta_doctype','custom_doctype_setup', $output);
// }

/**
 * Augusta JS Loading
 * 
 * Allows you to run  specific 
 * scripts to stage while javascript
 * is still loading
 *   
 */
function augusta_js_loading  () { ?>
<script type='text/javascript'>
if ( typeof jQuery !== undefined || typeof jQuery != undefined || jQuery ) {
  jQuery(document).ready(function () {
   jQuery('html').removeClass('no-js');
   jQuery('html').removeClass('js-loading');
   jQuery('html').addClass('js')
   jQuery('window').bind('load', function() {
     jQuery('html').removeClass('js-loading');
     jQuery('html').addClass('js-loaded')
   });
 });
}
</script>
<?php
} 
add_action('wp_footer', 'augusta_js_loading', 100);
