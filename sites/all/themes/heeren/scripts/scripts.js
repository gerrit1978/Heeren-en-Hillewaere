jQuery(document).ready(function($) {

  // foldout main menu subitems
  $('#block-system-main-menu ul li.expanded > a').click(function(e) {
    e.preventDefault();
    $(this).parent().find('ul').toggle();
  });


  // offerte formulier voertuigen: "active" tab en scroll top positie
  if ($('#webform-component-auto-gegevens').length) {
    $('#block-webform-client-block-17 .tabs ul li.auto-gegevens').css('background-color', '#f4f4f4');
    $('#block-webform-client-block-17 .tabs ul li.persoonlijke-gegevens').css('background-color', '#cfcfcf');    
		// scroll to Title			
		var offset = $('#block-webform-client-block-17 h2.node-title').offset();
		$('html, body').animate({scrollTop:offset.top}, 0);
  } else {
    $('#block-webform-client-block-17 .tabs ul li.auto-gegevens').css('background-color', '#cfcfcf');
    $('#block-webform-client-block-17 .tabs ul li.persoonlijke-gegevens').css('background-color', '#f4f4f4');    
  }
});