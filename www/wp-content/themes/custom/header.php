<?php
/**
 * @package Wordpress
 * @subpackage Augusta
 * @author Chris J. Lee
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--[if IE 6]><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" class="ie6 no-js"><![endif]-->
<!--[if lt IE 7]><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" class="ie ie6 lte9 lte8 lte7 no-js"><![endif]-->
<!--[if IE 7]><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" class="ie ie7 lte9 lte8 lte7 no-js"> <![endif]-->
<!--[if IE 8]><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" class="ie ie8 lte9 lte8 no-js"><![endif]-->
<!--[if IE 9]><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" class="ie ie9 lte9 no-js"><![endif]-->
<!--[if gt IE 9]><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" class="gtie9 ie9 no-js"><![endif]-->
<!--[if !IE]><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" class="not-ie no-js"><!--<![endif]-->
<head profile="http://gmpg.org/xfn/11">
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> 
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="author" content="Chris Lee" />
<meta name="Copyright" content="Copyright (c) 2009-<?php echo date('Y')?>" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
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