<?php
/**
 * @file
 * Default theme implementation for field collection items.
 *
 * Available variables:
 * - $content: An array of comment items. Use render($content) to print them all, or
 *   print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $title: The (sanitized) field collection item label.
 * - $url: Direct url of the current entity if specified.
 * - $page: Flag for the full page state.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. By default the following classes are available, where
 *   the parts enclosed by {} are replaced by the appropriate values:
 *   - entity-field-collection-item
 *   - field-collection-item-{field_name}
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess()
 * @see template_preprocess_entity()
 * @see template_process()
 */


/***********************************************************************************************************************
 * TODO: move this stuff to a preprocess function!
 ***********************************************************************************************************************/
// render icon - title alignment
$icon_alignment = $content['field_home_blok_icon_uitlijning']['#items'][0]['value'];
if ($icon_alignment == 'links') {
  $icon_title = "<div class='icon'>" . render($content['field_home_blok_titel_icon']) . "</div>"
    . "<div class='titel'>" . render($content['field_home_blok_titel']) . "</div>";
} else {
  $icon_title = "<div class='titel'>" . render($content['field_home_blok_titel']) . "</div>"
    . "<div class='icon'>" . render($content['field_home_blok_titel_icon']) . "</div>";
}

// render the link - TODO: move to a preprocess function
$link_nid = $content['field_home_blok_link'][0]['#markup'];
$link_title = $content['field_home_blok_link_titel'][0]['#markup'];
$link = array(
  '#markup' => l($link_title, 'node/' . $link_nid, array('attributes' => array('class' => 'button'))),
);

// render text alignment
$alignment = strtolower($content['field_home_blok_uitlijning'][0]['#markup']);

// render text color
$color = strtolower($content['field_home_blok_tekst_kleur'][0]['#markup']);
/***********************************************************************************************************************
 * TODO: move this stuff to a preprocess function!
 ***********************************************************************************************************************/


?>
<div class="home-blok <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <div class="content <?php print $alignment; ?>"<?php print $content_attributes; ?>>
		<div class="title">
			<?php print $icon_title; ?>
		</div>
		<div class="content">
		
	    <div class="image-fullsize">
	      <?php print render($content['field_home_blok_full_size_pic']); ?>
	    </div>
	<!--
	    <div class="image-smartphone"></div>
	    <div class="image-tablet"></div>
	-->
	    <div class="text <?php print $color; ?>">
				<?php print render($content['field_home_blok_tekst']); ?>	      
	    </div>
	    
	    <div class="link">
	      <?php print render($link); ?>
	    </div>
	  </div>
  </div>
</div>