/**
 * Augusta: Adapt Plugin
 * Default Implementation of Adapt
 * provided by the javascript plugin

// Called by Adapt.js
function myCallback(i, width) {
  // Alias HTML tag.
  var html = document.documentElement;

  // Find all instances of range_NUMBER and kill 'em.
  html.className = html.className.replace(/(\s+)?range_\d/g, '');

  // Check for valid range.
  if (i > -1) {
    // Add class="range_NUMBER"
    html.className += ' range_' + i;
  }

  // Note: Not making use of width here, but I'm sure
  // you could think of an interesting way to use it.
}

// Edit to suit your needs.
var ADAPT_CONFIG = {
  // false = Only run once, when page first loads.
  // true = Change on window resize and page tilt.
  dynamic: true,

  // Optional callback... myCallback(i, width)
  callback: myCallback,

  // First range entry is the minimum.
  // Last range entry is the maximum.
  // Separate ranges by "to" keyword.
  range: [
    '0 to 760',
    '760 to 980',
    '980 to 1280',
    '1280 to 1600',
    '1600 to 1920',
    '1920'
  ]
};

*/


function myCallback(i, width) {
  // Alias HTML tag.
  var html = document.documentElement;

  // Find all instances of range_NUMBER and kill 'em.
  html.className = html.className.replace(/(\s+)?range_\d/g, '');

  // Check for valid range.
  if (i > -1) {
    // Add class="range_NUMBER"
    html.className += ' range_' + i;
  }

  // Note: Not making use of width here, but I'm sure
  // you could think of an interesting way to use it.
}

var ADAPT_CONFIG = {
  // false = Only run once, when page first loads.
  // true = Change on window resize and page tilt.
  dynamic: true,

  // Optional callback... myCallback(i, width)
  callback: myCallback,

  // First range entry is the minimum.
  // Last range entry is the maximum.
  // Separate ranges by "to" keyword.
  range: [
    '0 to 760',
    '760 to 980',
    '980 to 1280',
    '1280 to 1600',
    '1600 to 1920',
    '1920'
  ]
};
//document.write('<style media="' + ADAPT_CONFIG.range + '">#augusta-check-query { position: relative; z-index: 100; }</style></div>');