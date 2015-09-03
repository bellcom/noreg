<?php

/**
 * @param $department_nid
 *
 * @return array
 * @throws \Exception
 */
function admin_login_users_page($department_nid) {
  $content = array();

  // Load users
  $users = admin_login_load_users($department_nid);

  // Run through users
  foreach($users as $user) {
    $content[] = array(
      '#type'   => 'markup',
      '#markup' => theme('admin_login_users', array(
        'user'  => $user,
      )),
    );
  }

  return $content;
}

/**
 * @param $department_nid
 *
 * @return bool
 */
function admin_login_load_users($department_nid) {

  // Department ID not set
  if (!isset($department_nid) || $department_nid == NULL) {
    drupal_goto('admin/login');
  }
  // @TODO Load only of certain role
  // Query DB
  $query = new EntityFieldQuery;
  $query->entityCondition('entity_type', 'user')
    ->fieldCondition('field_user_department', 'target_id', $department_nid)
    ->propertyCondition('status', 1);

  $results = $query->execute();

  // Results exist
  if (isset($results['user'])) {

    // Collect user id's
    $uids = array_keys($results['user']);

    // Return all users
    return user_load_multiple($uids);
  }

  // Return
  return false;
}