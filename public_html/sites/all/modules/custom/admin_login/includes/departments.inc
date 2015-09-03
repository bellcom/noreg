<?php

/**
 * @return array
 * @throws \Exception
 */
function admin_login_departments_page() {
  $content = array();

  // Load departments
  $departments = admin_login_load_departments();

  // Run through departments
  foreach($departments as $department) {
    $content[] = array(
      '#type'   => 'markup',
      '#markup' => theme('admin_login_departments', array(
        'department'  => $department,
      )),
    );
  }

  return $content;
}

/**
 * @return bool
 */
function admin_login_load_departments() {

  // Query DB
  $query = new EntityFieldQuery();

  $query->entityCondition('entity_type', 'node')
    ->entityCondition('bundle', 'departments')
    ->propertyCondition('status', 1);

  $result = $query->execute();

  // Results exist
  if (!empty($result['node'])) {
    $nids = array_keys($result['node']);

    // Return departments
    return node_load_multiple($nids);
  }

  return false;
}