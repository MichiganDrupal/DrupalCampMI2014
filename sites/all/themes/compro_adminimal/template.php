<?php

/**
 * Override of theme_image().
 */
function compro_adminimal_image($variables) {
  $attributes = $variables['attributes'];
  $attributes['src'] = file_create_url($variables['path']);

  $more_attrs = array('alt', 'title');
  if (isset($variables['style_name'])) {
    $more_attrs = array_merge($more_attrs, array('height', 'width'));
  }
  
  foreach ($more_attrs as $key) {
    if (isset($variables[$key])) {
      $attributes[$key] = $variables[$key];
    }
  }

  return '<img' . drupal_attributes($attributes) . ' />';
}

/**
 * Implements template_preprocess_entity().
 */
function compro_adminimal_preprocess_entity(&$variables) {
  $variables['classes_array'][] = drupal_html_class('view-mode-' . $variables['view_mode']);
}
