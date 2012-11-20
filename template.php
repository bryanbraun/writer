<?php

/**
 * Create cleaner formats for date information on comments.
 * See http://www.whatwg.org/specs/web-apps/current-work/multipage/
 * text-level-semantics.html#the-time-element
 */
function writer_preprocess_comment(&$vars) {
  $comment = $vars['comment'];
  $author = $vars['author'];
  // We use Drupal's format_date function to build date formats for the <time> element
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
  // We use Drupal's format_date function to build date formats for the <time> element
  $vars['date_time'] = format_date($vars['created'], 'custom', 'Y-m-d H:i:s');
  $vars['clean_date'] = format_date($vars['created'], 'custom', 'j M Y');
}
