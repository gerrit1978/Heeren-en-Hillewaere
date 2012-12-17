jQuery(document).ready(function($) {

  // foldout main menu subitems
  $('#block-system-main-menu ul li.expanded > a').click(function(e) {
    e.preventDefault();
    $(this).parent().find('ul').toggle();
  });
  
/*
  // contact form
  $('#block-webform-client-block-17 .webform-client-form .button.next').click(function(e) {
    e.preventDefault();
		// hide "Persoonlijke Gegevens" fieldset
		$('#block-webform-client-block-17 .webform-client-form #webform-component-persoonlijke-gegevens').fadeOut("fast", function() {
			// show "Auto Gegevens" fieldset
			$('#block-webform-client-block-17 .webform-client-form #webform-component-auto-gegevens').fadeIn("fast");
			// show Submit button
			$('#block-webform-client-block-17 .webform-client-form #edit-actions').show();
			// swap tab bg color
			$('#block-webform-client-block-17 .tabs ul li.auto-gegevens').css('background-color', '#f4f4f4');
			$('#block-webform-client-block-17 .tabs ul li.persoonlijke-gegevens').css('background-color', '#cfcfcf');			
			// scroll to Title			
			var offset = $('#block-webform-client-block-17 h2.node-title').offset();
			$('html, body').animate({scrollTop:offset.top}, 0);
		});
  });

  $('#block-webform-client-block-17 .webform-client-form .button.previous').click(function(e) {
    e.preventDefault();
    // hide "Auto Gegevens" fieldset
		$('#block-webform-client-block-17 .webform-client-form #webform-component-auto-gegevens').fadeOut("fast", function() {
			// show "Persoonlijke Gegevens" fieldset
			$('#block-webform-client-block-17 .webform-client-form #webform-component-persoonlijke-gegevens').fadeIn("fast");
			// hide Submit button
			$('#block-webform-client-block-17 .webform-client-form #edit-actions').hide();
			// swap tab bg color
			$('#block-webform-client-block-17 .tabs ul li.auto-gegevens').css('background-color', '#cfcfcf');
			$('#block-webform-client-block-17 .tabs ul li.persoonlijke-gegevens').css('background-color', '#f4f4f4');			
			// scroll to Title
			var offset = $('#block-webform-client-block-17 h2.node-title').offset();
			$('html, body').animate({scrollTop:offset.top}, 0);

		});
  });
*/


});