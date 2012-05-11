<?php include_once( __DIR__ . '/assets/ti.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--[if IE 6]><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" class="ie6 no-js"><![endif]-->
<!--[if lt IE 7]><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" class="ie ie6 lte9 lte8 lte7 no-js"><![endif]-->
<!--[if IE 7]><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" class="ie ie7 lte9 lte8 lte7 no-js"> <![endif]-->
<!--[if IE 8]><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" class="ie ie8 lte9 lte8 no-js"><![endif]-->
<!--[if IE 9]><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" class="ie ie9 lte9 no-js"><![endif]-->
<!--[if gt IE 9]><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" class="gtie9 ie9 no-js"><![endif]-->
<!--[if !IE]><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" class="not-ie no-js"><![endif]-->
  <head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="author" content="GRS Developers(Chris J. Lee, Felipe Rocha, Jonathan Massielo)." />
    <meta name="Copyright" content="Copyright (c) 2009-<?php date('Y')?>" />
    <title><?php seotitle(); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon.gif" />

    <?php wp_deregister_script('jquery'); ?>
    <?php aug_script('jquery',    'https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js', array()); ?>
    <?php aug_script('jquery-ui', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js', array()); ?>

    <?php aug_style('aug-main',  '/css/main.css', array(), 'screen'); ?>

    <?php wp_head(); ?>
		<?php emptyblock('header'); ?>

		<script type="text/javascript" src="http://use.typekit.com/ivj2nbq.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
  </head>

  <body>
		<div class="header"></div>
		<div class="main">
			<?php emptyblock('main'); ?>
			<div class="clearfix"></div>
		</div>
		<div class="footer"></div>
    <?php wp_footer(); ?>
  </body>
</html>
