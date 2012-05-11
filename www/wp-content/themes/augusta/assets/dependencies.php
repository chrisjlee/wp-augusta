<?php

require_once __DIR__ . '/sass/SassParser.php';

function aug_script($src) {

	if (strpos($src, 'http') === false) {
		$up = realpath(dirname(__FILE__) . '/..');
		$ver = @filemtime($up . $src);
		$src = get_bloginfo('stylesheet_directory') . $src;
	}

	if (isset($ver)) echo "<script src=\"$src?v=$ver\" type=\"text/javascript\"></script>";
	else  echo "<script src=\"$src\" type=\"text/javascript\"></script>";
}

function aug_style($src, $media = 'all') {

	// Just figuring out some urls.
	if (strpos($src, 'http') === false) {
		$up = realpath(dirname(__FILE__) . '/..');
		$path = $up . $src;
		$url_path = get_bloginfo('stylesheet_directory') . $src;
		$scss_path = preg_replace('/\.' . preg_quote(pathinfo($path, PATHINFO_EXTENSION), '/') . '$/', '', $path) . '.scss';

		// Checking if scss file exists. If so, compile it into css.
		if ((file_exists($scss_path)) and (@filemtime($scss_path) > @filemtime($path))) {
			$scss = new SassParser(array());
			file_put_contents($path, $scss->toCss($scss_path));
		}

		// Updating variables now that we got scss compiled.
		$src = $url_path;
		$ver = @filemtime($path);

	}

	if (isset($ver)) echo "<script src=\"$src?v=$ver\" type=\"text/javascript\"></script>";
	else  echo "<script src=\"$src\" type=\"text/javascript\"></script>";
}

?>
