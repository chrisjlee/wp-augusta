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
  tabrotate: false
}

/**  Augusta Javascript Object */
var augusta = (function ( jQuery ) {
  
  // Hi self
  var _s = this;
  
  // private init function
  var _init = function() {
    /** Preflight check if AUGUSTA_CONFIG exists */
    if (!AUGUSTA_CONFIG || typeof AUGUSTA_CONFIG === undefined) {
      
      if ( window.console || typeof console.log !== undefined ){ 
        console.log('Augusta ERROR: Missing AUGUSTA_CONFIG');
      }
      
      return;
    }
  };
  
  /** lets go public (methods) */
  return {
     tabrotate: tabrotate() 
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


jQuery(document).ready(function(){
});