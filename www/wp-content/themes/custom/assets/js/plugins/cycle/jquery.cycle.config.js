/*
 * Globe Runner SEO
 * 
 * jQuery Cycle Package
 * Options Documentation: http://jquery.malsup.com/cycle/options.html 
 * 
 * Version: 0.0.1
 * 
 * CSS API:
 * 
 * .cycle-fade 			Normal Fade; Replacement for innerfade
 * 
 * .cycle-scrollHorz	Scroll Horizontal
 * */
jQuery(document).ready(function() {
	jQuery('.cycle-fade').cycle({
		cssBefore:       null,  // properties that define the initial state of the slide before transitioning in 
	    cssAfter:        null,  // properties that defined the state of the slide after transitioning out 
		fx:      'fade', 
	    timeout:  2000
	});
	jQuery('.cycle-scrollHorz').cycle({
		cssBefore:       null,  // properties that define the initial state of the slide before transitioning in 
	    cssAfter:        null,  // properties that defined the state of the slide after transitioning out 
		fx:      'scrollHorz', 
	    timeout:  2000
	});
})