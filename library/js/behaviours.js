jQuery.noConflict();
jQuery(document).ready(function(){


/*GOOGLE MAPS STARTS*/
if ( jQuery( '#map' ).length && jQuery() ) {
var jQuerymap = jQuery('#map');
	jQuerymap.gMap({
	address: 'Evropska 2589/33b, 160 00  Praha 6',
	zoom: 18,
	markers: [
	{ 'address' : 'Evropska 2589/33b, 160 00  Praha 6' },]
			});
		 }
/*GOOGLE MAPS ENDS*/

// /*WIDTH RESIZE*/
//  var currentWindowWidth = jQuery(window).width();
// 	jQuery(window).resize(function(){
// 		currentWindowWidth = jQuery(window).width();
// 	});
// /*WIDTH RESIZE*/

// /*BACK TO TOP*/
// jQuery(document).ready(function() { jQuery('.backtotop').click(function(){ jQuery('html, body').animate({scrollTop:0}, 'slow'); return false; }); });
// /*BACK TO TOP*/


});  /* JQUERY ENDS */
