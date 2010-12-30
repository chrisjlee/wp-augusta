/*
 * 	File: Main.js
 *  Description: Main Javascript File
 * 
 */

GRSCONFIG = {
	SHADOW	: false,
	TABS	: true
}


jQuery(document).ready( function() {
	// Shadow Stuff
	jQuery('html').addClass('js-loading');
	
	// Add Shadow to the Page

});
	
	(function($) { 
		jQuery('body').bind('load',function() {
			jQuery('html').removeClass('js');
		});
	})(jQuery);
	
});

jQuery(document).load( function() {
	jQuery('html').addClass('js-loaded');
	jQuery('html').removeClass('js-loading');
})

jQuery.fn.grs = (function(options) {
	if (this.options) {
		console.log(this.options);
	}
	jQuery('#pagewidth').wrap('<div class="shadow"></div>');
	jQuery('.shadow').append(
			'<div class="footer-shadow-o" style="width: 1001px; background: #ABA398; margin: 0 auto; position:relative; left:-8px"><div class="footer-shadow"></div></div>');
})(jQuery);