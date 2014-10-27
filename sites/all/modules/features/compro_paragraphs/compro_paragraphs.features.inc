<?php
/**
 * @file
 * compro_paragraphs.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function compro_paragraphs_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "file_entity" && $api == "file_default_displays") {
    return array("version" => "1");
  }
  if ($module == "jw_player" && $api == "jw_player_presets") {
    return array("version" => "1");
  }
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_paragraphs_info().
 */
function compro_paragraphs_paragraphs_info() {
  $items = array(
    'blockquote' => array(
      'name' => 'Blockquote',
      'bundle' => 'blockquote',
      'locked' => '1',
    ),
    'heading' => array(
      'name' => 'Heading',
      'bundle' => 'heading',
      'locked' => '1',
    ),
    'image' => array(
      'name' => 'Image',
      'bundle' => 'image',
      'locked' => '1',
    ),
    'longtext' => array(
      'name' => 'Text (WYSIWYG)',
      'bundle' => 'longtext',
      'locked' => '1',
    ),
    'video' => array(
      'name' => 'Video',
      'bundle' => 'video',
      'locked' => '1',
    ),
  );
  return $items;
}
