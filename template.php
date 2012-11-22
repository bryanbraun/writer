<?php

/**
 * Turn on styles for code snippets as chosen in the theme settings.
 * To add more options, add the path to the options array below and
 * add the description to the options array in theme-settings.php.
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
 * Create cleaner formats for date information on comments.
 * See http://www.whatwg.org/specs/web-apps/current-work/multipage/
 * text-level-semantics.html#the-time-element
 */
function writer_preprocess_comment(&$vars) {
  $comment = $vars['comment'];
  $author = $vars['author'];
  // We use Drupal's format_date function to build date formats for the <time> element.
  $date_time = format_date($comment->timestamp, 'custom', 'Y-m-d H:i:s');
  $clean_date = format_date($comment->timestamp, 'custom', 'j M Y');
  $vars['submitted'] = 'On <time datetime="' . $date_time . '">' . $clean_date . '</time>, ' . $author . 'said...';
}

/**
 * Create cleaner formats for date information on nodes.
 * See http://www.whatwg.org/specs/web-apps/current-work/multipage/
 * text-level-semantics.html#the-time-element
 */
function writer_preprocess_node(&$vars) {
  // We use Drupal's format_date function to build date formats for the <time> element.
  $vars['date_time'] = format_date($vars['created'], 'custom', 'Y-m-d H:i:s');
  $vars['clean_date'] = format_date($vars['created'], 'custom', 'j M Y');
}

