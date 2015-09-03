<?php

/*
 * Get users by role name
 */
function _noreg_get_users_by_role_name($role_name) {

  $role = user_role_load_by_name($role_name);
  $uids = db_select('users_roles', 'ur')
    ->fields('ur', array('uid'))
    ->condition('ur.rid', $role->rid, '=')
    ->execute()
    ->fetchCol();

  // Grab all users
  $users = user_load_multiple($uids);

  // Return users
  return $users;
}

/*
 * Get users by role name
 */
function _noreg_get_users_by_role_id($role_ids = array()) {

  // Query
  $query = 'SELECT DISTINCT(ur.uid)
        FROM {users_roles} AS ur
        WHERE ur.rid IN (:role_id)';

  // Result of query
  $result = db_query($query, array(':role_id' => $role_ids));

  // Grab user IDs
  $uids = $result->fetchCol();

  // Load all users with IDs
  $users = user_load_multiple($uids);

  // Return users
  return $users;
}

/*
 * Format timestamp
 */
function _noreg_format_timestamp($timestamp) {
  return format_date($timestamp);
}

/*
 * Format datetime
 */
function _noreg_format_datetime($datetime) {
  $date = new DateTime($datetime);

  return format_date($date->getTimestamp());
}
