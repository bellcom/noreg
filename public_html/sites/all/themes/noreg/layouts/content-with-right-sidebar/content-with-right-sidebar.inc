<?php
/**
 * implementation of hook_panels_layouts()
 */
$plugin = array(
  'title' => t('Content with right sidebar'),
  'category' => t('Bellcom'),
  'icon' => 'content-with-right-sidebar.png',
  'theme' => 'content-with-right-sidebar',
  'css' => 'content-with-right-sidebar.css',
  'regions' => array(
    'sidebar' => t('Sidebar'),
    'content' => t('Content'),
  ),
);
