jQuery(document).ready(function($) {

  // foldout main menu subitems
  $('#block-system-main-menu ul li.expanded > a').click(function(e) {
    e.preventDefault();
    $(this).parent().find('ul').toggle();
  });

});