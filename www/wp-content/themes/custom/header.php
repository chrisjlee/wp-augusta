<?php
/**
 * @package Wordpress
 * @subpackage Augusta
 * @author Chris J. Lee
 * @version 1.0.0
 * 
 */
?>
<?php /**  augusta_doctype hook is called in assets/functions/helpers.php  */ ?>
<?php do_action('augusta_doctype'); ?>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> 
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="author" content="Chris Lee" />
<meta name="Copyright" content="Copyright (c) 2009-<?php echo date('Y')?>" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<?php /**  augusta_title hook is called in assets/functions/helpers.php  */ ?>
<title><?php do_action('augusta_title'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php locate_template(array('assets/bootstrap.php'),true,true); ?>
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>