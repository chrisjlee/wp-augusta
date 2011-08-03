<?php
/**
 * @package Wordpress
 * @subpackage Augusta
 * @author Chris J. Lee
 * @version 1.0.0
 * 
 */
/**  augusta_doctype hook is called in assets/functions/helpers.php  */ ?>
<?php do_action('augusta_doctype'); ?>
<!-- Load CSS/JS Files -->
<?php locate_template(array('assets/bootstrap.php'),true,true); ?>
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

<!-- Mobile snippets below borrowed: https://github.com/malarkey/320andup/blob/master/Multiple%20linked%20stylesheets/index.html -->
<!-- For iPhone 4 -->
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo AUGIMG; ?>/mobile/apple-touch-icon.png">
<!-- For iPad 1-->
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo AUGIMG; ?>/mobile/apple-touch-icon.png">
<!-- For iPhone 3G, iPod Touch and Android -->
<link rel="apple-touch-icon-precomposed" href="<?php echo AUGIMG; ?>/mobile/apple-touch-icon-precomposed.png">
<!-- For Nokia -->
<link rel="shortcut icon" href="<?php echo AUGIMG; ?>/mobile/apple-touch-icon.png">

<!--iOS. Delete if not required -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<link rel="apple-touch-startup-image" href="<?php echo AUGIMG; ?>/mobile/splash.png">

<!--Microsoft. Delete if not required -->
<meta http-equiv="cleartype" content="on">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

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