jQuery(document).ready(function($) {
	// scroll to Title			
	var offset = $('#block-webform-client-block-17 h2.node-title').offset();
	$('html, body').animate({scrollTop:offset.top}, 0);
});