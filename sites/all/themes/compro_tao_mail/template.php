<?php
/**
 * @file Theming functions related to this theme.
 */

/**
 * Implements template_preprocess_mimemail_message().
 * 
 * The $variables array initially contains the following arguments:
 *   $recipient: The recipient of the message
 *   $key: The mailkey associated with the message
 *   $subject: The message subject
 *   $body: The message body
 */
function compro_tao_mail_preprocess_mimemail_message(&$variables) {
  // Get local theme information.
  $mail_theme = mailsystem_get_mail_theme();
  $mail_theme_path = drupal_get_path('theme', $mail_theme);
  
  // Add useful values to the template vars. (Galaxie)
  $variables['logo'] = $mail_theme_path . '/logo.png';
  
  global $base_url;
  $variables['base_url'] = $base_url;
  
  $variables['site_name'] = variable_get('site_name', 'Drupal');
  
  // Get regions and add to vars.
  foreach (system_region_list($mail_theme, REGIONS_VISIBLE) as $region_key => $region_name) {
    // Get the content for each region and add it to the $region variable
    if ($blocks = _compro_tao_mail_get_blocks_by_region($region_key)) {
      $variables['region'][$region_key] = $blocks;
    }
    else {
      $variables['region'][$region_key] = array();
    }
  }
}

function _compro_tao_mail_get_blocks_by_region($region) {
  $build = array();
  if ($list = _compro_tao_mail_block_list($region)) {
    $build = _block_get_renderable_array($list);
  }
  return $build;
}

function _compro_tao_mail_block_list($region) {
  $blocks = &drupal_static(__FUNCTION__);

  if (!isset($blocks)) {
    $blocks = _compro_tao_mail_load_blocks();
  }

  // Create an empty array if there are no entries.
  if (!isset($blocks[$region])) {
    $blocks[$region] = array();
  }
  else {
    $blocks[$region] = _block_render_blocks($blocks[$region]);
  }

  return $blocks[$region];
}

function _compro_tao_mail_load_blocks() {
  $theme = mailsystem_get_mail_theme();
  
  $query = db_select('block', 'b');
  $result = $query
    ->fields('b')
    ->condition('b.theme', $theme)
    ->condition('b.status', 1)
    ->orderBy('b.region')
    ->orderBy('b.weight')
    ->orderBy('b.module')
    ->addTag('block_load')
    ->addTag('translatable')
    ->execute();

  $block_info = $result->fetchAllAssoc('bid');
  // Allow modules to modify the block list.
  drupal_alter('block_list', $block_info);

  $blocks = array();
  foreach ($block_info as $block) {
    $blocks[$block->region]["{$block->module}_{$block->delta}"] = $block;
  }
  return $blocks;
}
