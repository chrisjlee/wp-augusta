<?php 
/*  Configuration Settings for Augusta
--------------------------------------------- */

define('CONFIG_CONTENT_WIDTH','960');   // Uses it in the Config
define('CONFIG_960GS','true');    // use 960gs?
define('CONFIG_960GS_COL','24'); // name the number of columns, 24, 12/16, 
/* Javascript */
define('CONFIG_COLORBOX','true'); // use colorbox?
define('CONFIG_COLORBOX_THEME','4');  // Colorbox Theme? 1-5, Default, Custom? - Default is 4
define('CONFIG_JQUERYUI','true'); // Use Jquery UI?
define('CONFIG_DROPDOWN','true'); // Turn on Dropdown ?
define('CONFIG_INNERFADE','false'); // Turn on Dropdown ?
define('CONFIG_CDN_JQUERY','true');     // CDN files for jQuery
define('CONFIG_CDN_JQUERYUI','true');   // CDN files for jQuery UI ?
define('CONFIG_WIDGET_CUSTOM_POST_TRUNC','false');  //Truncate custom widget titles
define('CONFIG_ANALYTICS','false'); //add analytics snippet?
define('CONFIG_ANALYTICS_ACCOUNT','UA-xxxxxx'); // 

/*  Change the Header Image Dimensions
--------------------------------------------- */
define( 'HEADER_IMAGE_WIDTH', apply_filters( 'twentyten_header_image_width', 945 ) );
define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'twentyten_header_image_height', 153 ) );

