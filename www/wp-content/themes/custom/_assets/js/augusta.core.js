/**
 * Augusta: Javascript Object
 * @package Wordpress
 * @subpackage Augusta
 * @author Chris J. Lee
 * 
 * Do not modify this file unless
 * you know what you're doing.
 * This file doesn't need to be modified or changed
 * 
 * Features self defined javascript
 * modules that we used often.
 *   - jQuery tabs rotating
 *   - Initializing plugins
 * 
 * @version 1.0.0
 * @since 1.0.0
 * 
 * augusta.tabrotate() depends on jQuery UI 1.8+ & jQuery 1.3+
 * 
 * @todo - attach augusta.js to wp_enqueue_script
 * 
 */

/**  Augusta Config */
var AUGUSTA_DEFAULT = {
  // @todo
  tabrotate: false,
  shadow: false
}

/**  Augusta Javascript Object */
var augusta = (function () {
  // Hi self
  var $S = this;
  
  /** Preflight check if AUGUSTA_CONFIG exists */
  if (!AUGUSTA_CONFIG || typeof AUGUSTA_CONFIG === undefined) {
      
      if ( window.console || typeof console.log !== undefined ){ 
        console.log('Augusta ERROR: Missing AUGUSTA_CONFIG');
      }
      $S.settings = jQuery.extend (true, $S.settings, AUGUSTA_DEFAULT);
      return;
  } else {
    var _settings = jQuery.extend(true, {}, AUGUSTA_CONFIG, AUGUSTA_DEFAULT);
  }
  $S.settings = _settings;
  
  // private init function
  $S._init = function() {
    // console.log('init');
  };
  function shadow() {
    if ( $S.shadow === false) return;
    jQuery('#page').wrap('<div class="shadow"></div>');
    jQuery('.shadow').append('<div class="footer-shadow"><div class="footer-shadow"></div></div>');
  }
  /** lets go public (methods) */
  return {
     tabrotate: tabrotate,
     shadow: shadow,
     init: $S._init() 
  }
  
  /**
   * Augusta: Tab rotate
   * 
   * Self initializes tab rotating
   * without very much effort
   * 
   * To initialize: 
   * augusta.tabrotate()
   * 
   */
  function tabrotate () {
    if ( typeof jQuery.ui.version !== undefined ) {
      jQuery('.tab-slide').tabs({
        fx: { opacity: 'toggle', duration:'slow'}
      }).tabs( "rotate" , 3200 );
    }
  }
  
  /** Fire self once */
  self._init();
  
})(window.augusta || augusta || undefined);




(function($) {
  jQuery(document).ready(function() {
  jQuery('html').addClass('js-loading');
  }); 
  jQuery('body').bind('load', function() {
    jQuery('html').removeClass('js');
  });
})(jQuery);
jQuery(document).load(function() {
  jQuery('html').addClass('js-loaded');
  jQuery('html').removeClass('js-loading');
});