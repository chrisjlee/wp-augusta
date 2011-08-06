<?php 
/**
 * @package Wordpress
 * @subpackage Augusta
 * @author Chris J. Lee - iam@chrisjlee.net
 * Augusta Responsive
 * 
 * Loads responsive stylesheets
 * Don't change anything here
 * unless you know what you're doing!
 * 
 */

function augusta_responsive() { 
 /**
 * Determine path settings
 * 
 * Setup local variable to define 
 * a fallback
 * 
 */
$augcss = ( defined('AUGCSS') ) ? AUGCSS. '/' : "assets/css/"; 
 
?>
<script type="text/javascript" language="JavaScript">
/** 
 * inline javascript depends 
 * on Adapt.js 
 * 
 * Adapt.js is loaded in 
 * bootstrap.php
 * 
 * Is borrowed from sonspring (Nathan Smith) 
 * http://sonspring.com/journal/adapt-js-explained#how-to-use
 * 
 */
  
// Edit to suit your needs.
var ADAPT_CONFIG = {
  // Where is your CSS?
  path: '<?php echo $augcss; ?>',

  // false = Only run once, when page first loads.
  // true = Change on window resize and page tilt.
  dynamic: true,

  // Optional callback... myCallback(i, width)
  callback: augusta_respond_callback,

  // First range entry is the minimum.
  // Last range entry is the maximum.
  // Separate ranges by "to" keyword.
  range: [
    '0px    to 760px  = mobile.css',
    '760px  to 980px  = 720.css',
    '980px  to 1280px = 960.css',
    '1280px to 1600px = 1200.css',
    '1600px           = 1560.css'
    //'1600px to 1920px = 1560.css'
    //'1920px           = fluid.css'
  ]
};

function augusta_respond_class(i, width) {
  // Alias HTML tag.
  var html = document.documentElement;

  // Find all instances of range_NUMBER and kill 'em.
  html.className = html.className.replace(/(\s+)?range_\d/g, '');

  // Check for valid range.
  if (i > -1) {
    // Add class="range_NUMBER"
    //console.log(width);
    html.className += ' range_' + i;
  }

  // Note: Not making use of width here, but I'm sure
  // you could think of an interesting way to use it.
}
function augusta_respond_id(i) {
  // Replace HTML tag's ID.
  document.documentElement.id = 'range_' + i;
}
/**
 * Augusta Respond Callback
 * Initializes any functions after
 * Adapt configuration is setup 
 * 
 */
function augusta_respond_callback(i, width) {  
  augusta_respond_class(i, width);
  augusta_respond_id(i);
}
</script>
<?php }
add_action('wp_enqueue_scripts', 'augusta_responsive', 1 );