<?php

/* Body class control */

function phptemplate_body_class($left, $right) {
  if ($left != '' && $right != '') {
    $class = 'sidebars';
  }
  else {
    if ($left != '') {
      $class = 'sidebar-left';
    }
    if ($right != '') {
      $class = 'sidebar-right';
    }
  }

  if (isset($class)) {
    print ' class="'. $class .'"';
  }
}

// Javascript Includes

drupal_add_js(drupal_get_path('theme', 'amity_island') . '/js/jquery.pngFix.js', 'theme');
drupal_add_js(drupal_get_path('theme', 'amity_island') . '/js/suckerfish.js', 'theme');

// Quick fix for the validation error: 'ID "edit-submit" already defined'
$elementCountForHack = 0;
function phptemplate_submit($element) {
  global $elementCountForHack;
  return str_replace('edit-submit', 'edit-submit-' . ++$elementCountForHack, theme('button', $element));
}
// search box testing
function amity_island_search_block_form($form) {
  $form['submit']['#type'] = 'image_button';
  $form['submit']['#src'] = drupal_get_path('theme', 'amity_island') . '/images/magnifying_glass.jpg';
  $form['submit']['#attributes']['class'] = 'btn';
  return '<div id="search" class="container-inline">' . drupal_render($form) . '</div>';
}