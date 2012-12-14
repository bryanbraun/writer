<?php

/**
 * @file
 * Contains preprocess functions for the Writer theme.
 */

/**
 * Implements hook_preprocess_html().
 *
 * Include CSS for fonts.
 */
function writer_preprocess_html(&$variables) {
  drupal_add_css(
    'http://fonts.googleapis.com/css?family=Merriweather:400italic,400,700|Lato|Inconsolata',
    array('type' => 'external')
  );
}

/**
 * Implements hook_preprocess_page().
 *
 * Turn on styles for code snippets as chosen in the theme settings.
 * To add more options, add the path to the options array below and
 * add the description to the options array in theme-settings.php.
 */
function writer_preprocess_page(&$variables) {
  // Build an associative array of all stylesheet options and filepaths.
  $options = array(
    'simple' => '/css/simple-format.css',
    'night' => '/css/night-format.css',
    'inset' => '/css/inset-format.css',
    'zebra' => '/css/zebra-format.css',
  );
  // Find the value in the theme settings and use it to build a filepath.
  $my_format = theme_get_setting('code_snippets');
  $path_to_format = drupal_get_path('theme', 'writer') . $options[$my_format];
  // If the css file exists, run it on the current page.
  if (file_exists($path_to_format)) {
    drupal_add_css($path_to_format, array('group' => CSS_THEME, 'type' => 'file'));
  }
}

/**
 * Implements hook_preprocess_comment().
 *
 * Reformat date info. See http://wiki.whatwg.org/wiki/Time_element.
 */
function writer_preprocess_comment(&$variables) {
  $comment = $variables['comment'];
  $author = $variables['author'];
  // Use Drupal's format_date function to reformat dates for the <time> element.
  $date_time = format_date($comment->created, 'custom', 'Y-m-d H:i:s');
  $clean_date = format_date($comment->created, 'custom', 'j M Y');
  $variables['submitted'] = 'On <time datetime="' . $date_time . '">' . $clean_date . '</time>, ' . $author . ' said...';
}

/**
 * Implements hook_preprocess_comment().
 *
 * Reformat date info. See http://wiki.whatwg.org/wiki/Time_element.
 */
function writer_preprocess_node(&$variables) {
  // Use Drupal's format_date function to reformat dates for the <time> element.
  $variables['date_time'] = format_date($variables['created'], 'custom', 'Y-m-d H:i:s');
  $variables['clean_date'] = format_date($variables['created'], 'custom', 'j M Y');
}
