<?php

/*
 * Load files
 */
include_once dirname(__FILE__) . '/includes/helpers.inc';

/**
 * Implements theme_preprocess_html().
 */
function noreg_preprocess_html(&$variables) {
  $variables['classes_array'][] = 'footer-attached';

  // Paths
  $variables['path_js']   = base_path() . drupal_get_path('theme', 'noreg') . '/dist/js';
  $variables['path_img']  = base_path() . drupal_get_path('theme', 'noreg') . '/dist/img';
  $variables['path_css']  = base_path() . drupal_get_path('theme', 'noreg') . '/dist/css';
  $variables['path_font'] = base_path() . drupal_get_path('theme', 'noreg') . '/dist/font';
}

/*
 * Implements theme_preprocess_page().
 */
function noreg_preprocess_page(&$variables) {

  // Paths
  $variables['path_js']   = base_path() . drupal_get_path('theme', 'noreg') . '/dist/js';
  $variables['path_img']  = base_path() . drupal_get_path('theme', 'noreg') . '/dist/img';
  $variables['path_css']  = base_path() . drupal_get_path('theme', 'noreg') . '/dist/css';
  $variables['path_font'] = base_path() . drupal_get_path('theme', 'noreg') . '/dist/font';

  // Add out fonts from Google Fonts API.
  drupal_add_html_head(array(
    '#tag'        => 'link',
    '#attributes' => array(
      'href' => 'http://fonts.googleapis.com/css?family=Lato:400,700',
      // font-family: 'Lato', sans-serif;
      'rel'  => 'stylesheet',
      'type' => 'text/css',
    ),
  ), 'google_font_noreg');
}

/**
 * Implements template_preprocess_node.
 *
 * Add template suggestions and classes.
 */
function noreg_preprocess_node(&$variables) {

  // Add node--view_mode.tpl.php suggestions.
  $variables['theme_hook_suggestions'][] = 'node__' . $variables['view_mode'];

  // Make "node--NODETYPE--VIEWMODE.tpl.php" templates available for nodes.
  $variables['theme_hook_suggestions'][] = 'node__' . $variables['type'] . '__' . $variables['view_mode'];

  // Add a class for the view mode.
  $variables['classes_array'][] = 'view-mode-' . $variables['view_mode'];

  // Add css class "node--NODETYPE--VIEWMODE" to nodes.
  $variables['classes_array'][] = 'node--' . $variables['type'] . '--' . $variables['view_mode'];

  // Optionally, run node-type-specific preprocess functions, like
  // foo_preprocess_node_page() or foo_preprocess_node_story().
  $function = __FUNCTION__ . '__' . $variables['node']->type;
  if (function_exists($function)) {
    $function($variables);
  }
}

/*
 * Sale ad
 * Implements hook_preprocess_node().
 */
function noreg_preprocess_node__sale_ad(&$variables) {
  // All node types but page
  if ($variables['elements']['#view_mode'] != 'page') {

    // Litter
    if ($field_litter = field_get_items('node', $variables['node'], 'field_litter_id')) {
      $node_litter = node_load($field_litter[0]['target_id']);

      // Birthdate
      if ($field_litter_birthdate = field_get_items('node', $node_litter, 'field_birthdate')) {
        $variables['litter_birthdate'] = field_view_value('node', $node_litter, 'field_birthdate', $field_litter_birthdate[0], array('settings' => array('format_type' => 'custom_short')));
      }

      // Price per young
      if ($field_litter_price_per_young = field_get_items('node', $node_litter, 'field_price_per_young')) {
        $variables['litter_price_per_young'] = field_view_value('node', $node_litter, 'field_price_per_young', $field_litter_price_per_young[0]);
      }

      // Animal
      if ($field_animal = field_get_items('node', $node_litter, 'field_animal_id')) {
        $node_animal = node_load($field_animal[0]['target_id']);

        // Breed
        if ($field_breed = field_get_items('node', $node_animal, 'field_breed_id')) {
          $variables['animal_breed'] = field_view_value('node', $node_animal, 'field_breed_id', $field_breed[0]);
        }
      }
    }

    // User
    if ($node_creator = ha_user_get_raw_information($variables['user']->uid)) {

      // Location
      if (isset($node_creator['location'])) {
        $variables['user_location'] = $node_creator['location'];
      }
    }
  }
}

/*
 * Implements template_preprocess_field().
 */
function noreg_preprocess_field(&$variables, $hook) {
}

/*
 * Implements hook_preprocess_region().
 */
function noreg_preprocess_region(&$variables, $hook) {
}

/*
 * Implements theme_preprocess_block().
 */
function noreg_preprocess_block(&$variables) {

  $variables ['classes_array'][] = drupal_html_class('block-' . $variables ['block']->module);
}
