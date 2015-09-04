<?php

/**
 * @param $form
 * @param $form_state
 * @param $user
 *
 * @return mixed
 */
function noreg_seperated_login_form($form, &$form_state, $user) {
  $form = array();

  // User ID
  $form['field_username'] = array(
    '#type' => 'hidden',
    '#value' => $user->name,
  );
  // Password
  $form['field_password'] = array(
    '#type' => 'password',
  );
  // Submit
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Log ind'),
  );

  return $form;
}

/**
 * @param $form
 * @param $form_state
 */
function noreg_seperated_login_form_validate($form, &$form_state) {
  $user = user_load(arg(3));

  // Username
  $username = $form_state['values']['field_username'];
  if(empty($username) || $username != $user->name) {
    drupal_set_message(t('Der opstod en kritisk fejl! Prøv igen.'), 'error');
    drupal_goto('admin/login');
  }

  // Password
  $password = $form_state['values']['field_password'];
  if(empty($password)) {
    form_set_error('field_password', t('Du skal indtaste en adgangskode, for at logge ind. Prøv igen!'));
  }
}

/**
 * @param $form
 * @param $form_state
 */
function noreg_seperated_login_form_submit($form, &$form_state) {

  // Get credentials
  $username = $form['field_username']['#value'];
  $password = $form['field_password']['#value'];

  // Success
  if($uid = user_authenticate($username, $password)) {
    global $user;
    $user = user_load($uid);

    $login_array = array('name' => $username);
    user_login_finalize($login_array);

    // Redirect
    drupal_goto('koeretoejer');
  }
  // Failed
  else {
    drupal_set_message(t('Du kunne ikke logges ind. Forsøg igen.'), 'error');
  }
}