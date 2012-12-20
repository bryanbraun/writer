<?php

/**
 * @file
 * Preprocess functions for dynamically changing aspects of the theme.
 */

/**
 * Implements hook_preprocess_page().
 */
function writer_preprocess_page(&$vars) {
  // Build an associative array of all stylesheet options and filepaths.
  $options = array(
    'simple' => '/css/simple-format.css',
    'night' => '/css/night-format.css',
    'inset' => '/css/inset-format.css',
    'zebra' => '/css/zebra-format.css',
  );
  // Find the value in the theme settings and use it to build a filepath.
  $my_format = theme_get_setting('code_snippets');
  if (is_null($my_format)) {
    $my_format = 'simple';
  }
  $path_to_format = path_to_theme() . $options[$my_format];
  // If the css file exists, run it on the current page.
  if (file_exists($path_to_format)) {
    drupal_add_css($path_to_format, 'theme', 'all', FALSE);
    $vars['styles'] = drupal_get_css();
  }
}

/**
 * Implements hook_preprocess_node().
 *
 * Builds cleaner formats for dates on nodes.
 *
 * See @link http://wiki.whatwg.org/wiki/Time_element the time tag @endlink.
 */
function writer_preprocess_comment(&$vars) {
  $comment = $vars['comment'];
  // Use Drupal's format_date function to format the html5 <time> element.
  $date_time = format_date($comment->timestamp, 'custom', 'Y-m-d H:i:s');
  $clean_date = format_date($comment->timestamp, 'custom', 'j M Y');
  // Build a translatable line with clean, html5 date information.
  $vars['submitted'] = t('On !date_time, @comment_author said...',
    array(
      // By passing the <time> tag below, we translate the string without...
      // ...stripping out the HTML5 tags unrecognized by local_string_is_safe().
      '!date_time' => '<time datetime="' . $date_time . '">' . $clean_date . '</time>',
      '@comment_author' => $variables['author'],
    )
  );
}

/**
 * Implements hook_preprocess_node().
 *
 * Builds cleaner formats for dates on nodes.
 *
 * See @link http://wiki.whatwg.org/wiki/Time_element the time tag @endlink.
 */
function writer_preprocess_node(&$vars) {
  // Use Drupal's format_date function to format the html5 <time> element.
  $vars['date_time'] = format_date($vars['created'], 'custom', 'Y-m-d H:i:s');
  $vars['clean_date'] = format_date($vars['created'], 'custom', 'j M Y');
}
