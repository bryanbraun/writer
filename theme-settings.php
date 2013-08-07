<?php

/**
 * @file
 * Set up theme settings for selecting code snippet styles.
 * These settings trigger the conditional loading of stylesheets.
 */

/**
 * Implements hook_form_system_theme_settings_alter().
 */
function writer_form_system_theme_settings_alter(&$form, &$form_state) {
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
    '#default_value' => theme_get_setting('code_snippets'),
  );

  // Define an optional width setting.
  $form['content_width'] = array(
    '#title' => t('Define content width (px)'),
    '#description' => t('If you do not like the default content width (630px), you can adjust it by specifying the preferred width in px. Note that extra-wide content areas are less readable.'),
    '#type' => 'textfield',
    '#default_value' => theme_get_setting('content_width'),
  );
}
