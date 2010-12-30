/*
 *	jQuery.center Plugin 
 * 	
 * 	Author: Chris J. Lee
 * 	Dependancies: Requires jQuery UI 1.8.4
 *	
 *	
 */
jQuery.fn.center = function() {
    return jQuery(this).each(function() {
        _c = jQuery(this).position({
            "my": "left top",
            "at": "center middle",
            "of": jQuery(window)
        });
        jQuery(window).bind('resize',_c);
    });
};