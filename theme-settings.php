<?php

/**
 * @file
 * Set up theme settings for selecting code snippet styles.
 *
 * These settings trigger the conditional loading of stylesheets.
 */

/**
 * Implements hook_settings().
 */
function writer_settings($saved_settings) {
  // The default values for the theme variables. Make sure $defaults exactly
  // matches the $defaults in the template.php file.
  $defaults = array(
    'code_snippets' => 'simple',
  );

  // Merge the saved variables and their default values.
  $settings = array_merge($defaults, $saved_settings);

  // List radio button options.
  $options = array(
    'simple' => t('Simple: A minimalist, light colored code style.'),
    'night' => t('Night: A dark, yet simple style.'),
    'inset' => t('Inset: A dark style with the illusion of depth.'),
    'zebra' => t('Zebra: A dark style with alternating shades on each line.'),
  );

  // Define the features of the form.
  $form['code_snippets'] = array(
    '#title' => t('Styles for Code Snippets'),
    '#description' => t('Select a style for displaying code snippets.'),
    '#type' => 'radios',
    '#options' => $options,
    '#default_value' => $settings['code_snippets'],
  );

  return $form;
}
