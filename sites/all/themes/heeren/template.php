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
 * Override or insert variables for the page templates.
 */
function heeren_preprocess_page(&$vars) {

	// unset title if not in blog section
	$section_blog = FALSE;
	// node type blog
	if (isset($vars['node']->type) && $vars['node']->type == 'blog') {
	  $section_blog = TRUE;
		$vars['theme_hook_suggestion'] = 'page__blog';
	}
	// blog view
	if (arg(0) == 'blog') {
	  $section_blog = TRUE;
	}
	// unset title
	if (!$section_blog) {
    $vars['title'] = "";
  }
  
  
  
}


/**
 * Override or insert variables into the node templates.
 */
function heeren_preprocess_node(&$vars) {

	// output the "blokken" as an item list instead of DIVs
  if (isset($vars['node']->field_blok)) {

    $list = array();  
    $blokken_field = field_get_items('node', $vars['node'],'field_blok');
    
    if (is_array($blokken_field) && count($blokken_field)) {
    
	    foreach ($blokken_field as $field_collection_id) {
	      $blok_array = entity_load('field_collection_item', array($field_collection_id['value']));
	
	      foreach ($blok_array as $blok) {
	        $blok_titel = field_get_items('field_collection_item', $blok, 'field_blok_titel');
	        $blok_text = field_get_items('field_collection_item', $blok, 'field_blok_tekst');
	        
	        $data = "<div class='blok'>"
	          . "<div class='title'>" . $blok_titel[0]['value'] . "</div>"
	          . "<div class='text'>" . $blok_text[0]['value'] . "</div>";
	        
	        $list[] = array(
  	        'data' => $data,
	        );
	      }
	
	    }
		}
    
    $vars['content']['blokken'] = array(
      '#markup' => theme('item_list', array('items' => $list)),
      '#prefix' => "<div class='blokken'>",
      '#suffix' => "</div>"
    );
    
  }

	// use specific tpl.php file and submitted format and read more link for (blog) teasers
	if ($vars['view_mode'] == 'teaser') {
		
		// template file
		$vars['theme_hook_suggestion'] = 'node__blog__teaser';
		
		// alter submitted text
		$vars['submitted'] = t('posted on @date', array('@date' => format_date($vars['node']->created, 'very_short_streepjes')));
		
		// add "read more" link
    $url = drupal_get_path_alias('node/' . $vars['node']->nid);
		$link = l('Lees meer >>', $url, array('attributes' => array('class' => 'read-more')));
		$vars['content']['read_more']['#markup'] = $link;
		$vars['content']['read_more']['#weight'] = 100;
	}
	
	// alter submitted text for blog nodes and create next - previous links
	if ($vars['node']->type == 'blog') {
		// alter submitted text
		$vars['submitted'] = t('posted on @date', array('@date' => format_date($vars['node']->created, 'very_short_streepjes')));
			
		// create next - previous links
		$vars['previous_link'] = '';
		$vars['next_link'] = '';
		// first, get a list of nids for blog posts
		$nids = array();
		$result = db_query("SELECT nid FROM {node} WHERE type = 'blog' ORDER BY nid ASC;");
		foreach ($result as $row) {
		  $nids[] = $row->nid; 
		}

		// get the key of the current node		
		$key = array_search($vars['node']->nid, $nids);
		
		
		if (isset($nids[$key - 1])) {
			$link = l('<< vorige', 'node/' . $nids[$key - 1]);
			$vars['previous_link']['#markup'] = $link;
			$vars['previous_link']['#prefix'] = "<div class='prev-link blog-nav'>";
			$vars['previous_link']['#suffix'] = "</div>";
		}
		
		if (isset($nids[$key + 1])) {
			$link = l('volgende >>', 'node/' . $nids[$key + 1]);		
			$vars['next_link']['#markup'] = $link;
			$vars['next_link']['#prefix'] = "<div class='next-link blog-nav'>";
			$vars['next_link']['#suffix'] = "</div>";
		}
		
	}
	
	
	// add the "newsletter" block to the contact page content - NID hardcoded --> better solution?
	if ($vars['node']->nid == 4) {
	  // load the block - hardcoded --> better solution?
 		$block_oud_turnhout = views_embed_view('medewerkers', 'block');
 		$block_schilde = views_embed_view('medewerkers', 'block_1');
 		
 		$output = "<div class='medewerkers medewerkers_oud_turnhout'><h2>Medewerkers</h2>" . $block_oud_turnhout . "</div>"
 		  . "<div class='medewerkers medewerkers_schilde'><h2>Medewerkers</h2>" . $block_schilde . "</div>";

	  $vars['content']['body'][0]['#suffix'] = $output;
  }

}