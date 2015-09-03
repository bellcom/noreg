<?php

/**
 * Redirect.
 */
function admin_login_redirect() {

  // Not logged in
  if(user_is_anonymous()) {

    // Redirect
    drupal_goto('admin/login/departments');
  }
}