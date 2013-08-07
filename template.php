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
  // Add css for our fonts.
  drupal_add_css(
    'http://fonts.googleapis.com/css?family=Merriweather:400italic,400,700|Lato|Inconsolata&subset=latin,latin-ext',
    array('type' => 'external')
  );

  // Set up meta tags.
  // Modern IE & chrome-frame rendering engine tag.
  $rendering_meta = array(
    '#tag' => 'meta',
    '#attributes' => array(
      'http-equiv' => 'X-UA-Compatible',
      'content' => 'IE=edge,chrome=1',
    ),  
  );
  // Mobile viewport tag.
  $mobile_meta = array(
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'viewport',
      'content' => 'width=device-width',
    ),
  );
 // Include meta tags.
  drupal_add_html_head($rendering_meta, 'rendering_meta');
  drupal_add_html_head($mobile_meta, 'responsive_meta');

  // Add a theme-specific css class to the body tag.
  $variables['classes_array'][] = 'writer';
}

/**
 * Implements hook_preprocess_page().
 */
function writer_preprocess_page(&$variables) {

  // Turn on styles for code snippets as chosen in the theme settings.
  // To add more options, add the path to the options array below and
  // add the description to the options array in theme-settings.php.
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

  // Pull the value from theme settings to define the default content width.
  $content_width = check_plain(theme_get_setting('content_width'));
  // Build the style attribute, and store in a template variable.
  $content_width_rule = 'style="max-width: ' . $content_width . 'px;"';
  $variables['content_width_rule'] = $content_width_rule;


  // If this page is displaying a node, find whether the submission information
  // (date submitted) will be displayed, so we can add a class to the wrapper.
  $wrapper_classes = array();

  if (isset($variables['node'])) {
    if (variable_get('node_submitted_' . $variables['node']->type, TRUE)) {
      // Submission info is displayed for this node.
    }
    else {
      // No submission info is displayed for this node.
      $wrapper_classes[] = 'no_submission_info';
    }
  }
  $variables['wrapper_classes'] = implode(' ', $wrapper_classes);
}

/**
 * Implements hook_preprocess_comment().
 *
 * Reformat date info. See http://wiki.whatwg.org/wiki/Time_element.
 */
function writer_preprocess_comment(&$variables) {
  $comment = $variables['comment'];
  // Use Drupal's format_date function to reformat dates for the <time> element.
  $date_time = format_date($comment->created, 'custom', 'Y-m-d H:i:s');
  $clean_date = format_date($comment->created, 'custom', 'j M Y');
  // Build a translatable line with clean, html5 date information.
  $variables['submitted'] = t('On !date_time, @comment_author said...',
    array(
      // By passing the <time> tag below, we translate the string without...
      // ...stripping out the HTML5 tags unrecognized by local_string_is_safe().
      '!date_time' => '<time datetime="' . $date_time . '">' . $clean_date . '</time>',
      '@comment_author' => $variables['comment']->name,
    )
  );
}

/**
 * Implements hook_preprocess_node().
 *
 * Reformat date info. See http://wiki.whatwg.org/wiki/Time_element.
 */
function writer_preprocess_node(&$variables) {
  // Use Drupal's format_date function to reformat dates for the <time> element.
  $variables['date_time'] = format_date($variables['created'], 'custom', 'Y-m-d H:i:s');
  $variables['clean_date'] = format_date($variables['created'], 'custom', 'j M Y');
}
