<?php
/**
 * @file
 * compro_paragraphs.jw_player_presets.inc
 */

/**
 * Implements hook_default_jw_player_presets().
 */
function compro_paragraphs_default_jw_player_presets() {
  $export = array();

  $jw_player_preset = new stdClass();
  $jw_player_preset->disabled = FALSE; /* Edit this to true to make a default jw_player_preset disabled initially */
  $jw_player_preset->api_version = 1;
  $jw_player_preset->preset_name = 'compro default';
  $jw_player_preset->machine_name = 'compro_default';
  $jw_player_preset->description = 'Reasonable defaults for an HTML5 video player with flash fallback';
  $jw_player_preset->settings = array(
    'mode' => 'html5',
    'width' => '640',
    'height' => '360',
    'controlbar' => 'bottom',
    'skin' => '',
    'autoplay' => 0,
  );
  $export['compro_default'] = $jw_player_preset;

  return $export;
}
