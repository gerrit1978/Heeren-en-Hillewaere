<?php

/**
 * @file
 * Process theme data.
 *
 * Use this file to run your theme specific implimentations of theme functions,
 * such preprocess, process, alters, and theme function overrides.
 *
 * Preprocess and process functions are used to modify or create variables for
 * templates and theme functions. They are a common theming tool in Drupal, often
 * used as an alternative to directly editing or adding code to templates. Its
 * worth spending some time to learn more about these functions - they are a
 * powerful way to easily modify the output of any template variable.
 * 
 * Preprocess and Process Functions SEE: http://drupal.org/node/254940#variables-processor
 * 1. Rename each function and instance of "heeren" to match
 *    your subthemes name, e.g. if your theme name is "footheme" then the function
 *    name will be "footheme_preprocess_hook". Tip - you can search/replace
 *    on "heeren".
 * 2. Uncomment the required function to use.
 */


/**
 * Preprocess variables for the html template.
 */
/* -- Delete this line to enable.
function heeren_preprocess_html(&$vars) {
  global $theme_key;

  // Two examples of adding custom classes to the body.
  
  // Add a body class for the active theme name.
  // $vars['classes_array'][] = drupal_html_class($theme_key);

  // Browser/platform sniff - adds body classes such as ipad, webkit, chrome etc.
  // $vars['classes_array'][] = css_browser_selector();

}
// */


/**
 * Process variables for the html template.
 */
/* -- Delete this line if you want to use this function
function heeren_process_html(&$vars) {
}
// */


/**
 * Override or insert variables for the page templates.
 */
function heeren_preprocess_page(&$vars) {

  if (TRUE) {
    $vars['title'] = "";
  }

}
function heeren_process_page(&$vars) {
}
// */


/**
 * Override or insert variables into the node templates.
 */

function heeren_preprocess_node(&$vars) {

  if (isset($vars['node']->field_blok)) {

    $list = array();  
    $blokken_field = field_get_items('node', $vars['node'],'field_blok');
    
    foreach ($blokken_field as $field_collection_id) {
      $blok_array = entity_load('field_collection_item', array($field_collection_id['value']));

      foreach ($blok_array as $blok) {
        $blok_titel = field_get_items('field_collection_item', $blok, 'field_blok_titel');
        $blok_text = field_get_items('field_collection_item', $blok, 'field_blok_tekst');
        
        $list[] = "<div class='blok'>"
          . "<div class='title'>" . $blok_titel[0]['value'] . "</div>"
          . "<div class='text'>" . $blok_text[0]['value'] . "</div>";
        
      }

    }
    
    $vars['content']['blokken'] = array(
      '#markup' => theme('item_list', array('items' => $list)),
      '#prefix' => "<div class='blokken'>",
      '#suffix' => "</div>"
    );
    
  }

}
function heeren_process_node(&$vars) {
}
// */


/**
 * Override or insert variables into the comment templates.
 */
/* -- Delete this line if you want to use these functions
function heeren_preprocess_comment(&$vars) {
}
function heeren_process_comment(&$vars) {
}
// */


/**
 * Override or insert variables into the block templates.
 */
/* -- Delete this line if you want to use these functions
function heeren_preprocess_block(&$vars) {
}
function heeren_process_block(&$vars) {
}
// */
