/*
 * 	Globe Runner SEO
 *  @author Chris J. Lee
 *  @description Generic Configuration Setup for Innerfade
 *  @version 0.0.2
 *  
 *  Changes: Added new classes
 *  
 */

jQuery(document).ready(function() {
	jQuery('.innerfade').innerfade({
		 speed: 'slow', 
		 timeout: 2500, 
		 type: 'sequence' 
		 //containerheight: '310px' 
	});
	jQuery('.innerfade-fast').innerfade({
		 speed: 'slow', 
		 timeout: 500, 
		 type: 'sequence' 
		 //containerheight: '310px' 
	});
	jQuery('.innerfade-slow').innerfade({
		 speed: 'slow', 
		 timeout: 500, 
		 type: 'sequence' 
		 //containerheight: '310px' 
	});
})