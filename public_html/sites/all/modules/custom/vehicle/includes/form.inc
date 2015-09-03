<?php

/**
 * @param $form
 * @param $form_state
 * @param bool $node
 *
 * @return array
 */
function vehicle_form($form, &$form_state, $node = FALSE) {
  $form = array();
  $form['#tree'] = TRUE;
  $form['#state-type'] = 'add';

  // Alter form type
  if ($node) {
    $form['#state-type'] = 'update';
    $form['#state-nid'] = $node->nid;

    // Load fields
    $id_name = $node->title;
    $brand = field_get_items('node', $node, 'field_brand');
    $customer_id = field_get_items('node', $node, 'field_customer_id');
    $registration_date = field_get_items('node', $node, 'field_registration_date');
    $description = field_get_items('node', $node, 'field_description');
    $registration_number = field_get_items('node', $node, 'field_registration_number');
    $engine_number = field_get_items('node', $node, 'field_engine_number');
    $gearbox_number = field_get_items('node', $node, 'field_gearbox_number');
    $serial_number = field_get_items('node', $node, 'field_serial_number');
    $rear_axle_number = field_get_items('node', $node, 'field_rear_axle_number');
  }

  // Container
  $form['controls'] = array(
    '#type'       => 'container',
    '#attributes' => array(
      'class' => array(),
    ),
  );
  // Submit
  $form['controls']['submit'] = array(
    '#type'  => 'submit',
    '#value' => t('Gem'),
  );
  // Cancel
  $form['controls']['cancel'] = array(
    '#type'       => 'link',
    '#title'      => t('Annuller'),
    '#href'       => 'koeretoejer',
    '#attributes' => array(
      'class' => array(
        'btn',
        'btn-danger',
      ),
    ),
  );

  // Container
  $form['vehicle'] = array(
    '#type'       => 'container',
    '#attributes' => array(
      'class' => array(),
    ),
  );
  // Headline
  $form['vehicle']['headline'] = array(
    '#type'   => 'item',
    '#markup' => '<legend>' . t('Bil') . '</legend>',
  );
  // ID name
  $form['vehicle']['field_id_name'] = array(
    '#title'         => t('ID navn'),
    '#type'          => 'textfield',
    '#required'      => TRUE,
    '#default_value' => ($form['#state-type'] == 'update' ? $id_name : '')
  );
  // Brand
  $form['vehicle']['field_brand'] = array(
    '#title'         => t('Bilmærke'),
    '#type'          => 'textfield',
    '#default_value' => ($form['#state-type'] == 'update' ? $brand[0]['value'] : '')
  );
  // Customer
  $form['vehicle']['field_customer_id'] = array(
    '#title'         => t('Kunde'),
    '#type'          => 'select',
    '#options'       => vehicle_form_load_customers(($form['#state-type'] == 'update' ? $customer_id[0]['target_id'] : '')),
    '#required'      => TRUE,
    '#default_value' => ($form['#state-type'] == 'update' ? $customer_id[0]['target_id'] : '')
  );
  // Registration date
  $form['vehicle']['field_registration_date'] = array(
    '#title'         => t('Registreringsdato'),
    '#type'          => 'textfield',
    '#attributes'    => array(
      'class' => array(
        'datetimepicker',
      ),
    ),
    '#default_value' => ($form['#state-type'] == 'update' ? $registration_date[0]['value'] : '')
  );
  // Description
  $form['vehicle']['field_description'] = array(
    '#title'         => t('Beskrivelse'),
    '#type'          => 'textarea',
    '#default_value' => ($form['#state-type'] == 'update' ? $description[0]['value'] : '')
  );

  // Container
  $form['id'] = array(
    '#type'       => 'container',
    '#attributes' => array(
      'class' => array(),
    ),
  );
  // Headline
  $form['id']['headline'] = array(
    '#type'   => 'item',
    '#markup' => '<legend>' . t('Identificering') . '</legend>',
  );
  // Registration no.
  $form['id']['field_registration_number'] = array(
    '#title'         => t('Registreringsnummer'),
    '#type'          => 'textfield',
    '#default_value' => ($form['#state-type'] == 'update' ? $registration_number[0]['value'] : '')
  );
  // Engine no.
  $form['id']['field_engine_number'] = array(
    '#title'         => t('Motor nr.'),
    '#type'          => 'textfield',
    '#default_value' => ($form['#state-type'] == 'update' ? $engine_number[0]['value'] : '')
  );
  // Gearbox no.
  $form['id']['field_gearbox_number'] = array(
    '#title'         => t('Gearkasse nr.'),
    '#type'          => 'textfield',
    '#default_value' => ($form['#state-type'] == 'update' ? $gearbox_number[0]['value'] : '')
  );
  // Serial no.
  $form['id']['field_serial_number'] = array(
    '#title'         => t('Stel nr.'),
    '#type'          => 'textfield',
    '#required'      => TRUE,
    '#default_value' => ($form['#state-type'] == 'update' ? $serial_number[0]['value'] : '')
  );
  // Rear axle no.
  $form['id']['field_rear_axle_number'] = array(
    '#title'         => t('Bagtøjs nr.'),
    '#type'          => 'textfield',
    '#default_value' => ($form['#state-type'] == 'update' ? $rear_axle_number[0]['value'] : '')
  );

  return $form;
}

/**
 * @param $form
 * @param $form_state
 */
function vehicle_form_validate($form, &$form_state) {

  // Get fields
  $serial_number = $form['id']['field_serial_number']['#value'];

  // Serial number
  if (empty($serial_number)) {
    form_set_error('field_serial_number', t('Du skal indtaste et stel nr.'));
  }

}

/**
 * @param $form
 * @param $form_state
 */
function vehicle_form_submit($form, &$form_state) {
  global $user;

  // Get fields
  $id_name = $form['vehicle']['field_id_name']['#value'];
  $brand = $form['vehicle']['field_brand']['#value'];
  $customer_id = $form['vehicle']['field_customer_id']['#value'];
  $registration_date = $form['vehicle']['field_registration_date']['#value'];
  $description = $form['vehicle']['field_description']['#value'];

  $registration_number = $form['id']['field_registration_number']['#value'];
  $engine_number = $form['id']['field_engine_number']['#value'];
  $gearbox_number = $form['id']['field_gearbox_number']['#value'];
  $serial_number = $form['id']['field_serial_number']['#value'];
  $rear_axle_number = $form['id']['field_rear_axle_number']['#value'];

  // Add
  if ($form['#state-type'] == 'add') {
    $node = new stdClass();
    $node->type = 'vehicles';
    $node->language = LANGUAGE_NONE;
    $node->uid = $user->uid;
    $node->status = 1;

    node_object_prepare($node); // Sets some defaults. Invokes hook_prepare() and hook_node_prepare().
  }
  // Update
  else {
    $node = node_load($form['#state-nid']);
  }

  // Set node values
  $node->title = $id_name;
  $node->field_brand[$node->language][0]['value'] = $brand;
  //$node->field_registration_date[$node->language][0]['value'] = date('Y-m-d', $registration_date);
  $node->field_customer_id[$node->language][0]['target_id'] = (int) $customer_id;
  $node->field_description[$node->language][0]['value'] = $description;

  $node->field_registration_number[$node->language][0]['value'] = $registration_number;
  $node->field_engine_number[$node->language][0]['value'] = $engine_number;
  $node->field_gearbox_number[$node->language][0]['value'] = $gearbox_number;
  $node->field_serial_number[$node->language][0]['value'] = $serial_number;
  $node->field_rear_axle_number[$node->language][0]['value'] = $rear_axle_number;
  $node = node_submit($node); // Prepare node for saving
  node_save($node);

  // Redirect to overview
  drupal_set_message(t('Køretøjet blev oprettet korrekt.'));
  drupal_goto('koeretoejer');
}

/**
 * @return array
 */
function vehicle_form_load_customers($customer_id = FALSE) {
  $items = array();

  // Query DB
  $query = new EntityFieldQuery();
  $query->entityCondition('entity_type', 'node')
    ->entityCondition('bundle', 'customers')
    ->propertyCondition('status', 1);
  $result = $query->execute();

  // Results exist
  if (!empty($result['node'])) {
    $nids = array_keys($result['node']);

    // Load all
    $customers = node_load_multiple($nids);

    // Run through customers
    foreach ($customers as $customer) {
      $items[$customer->nid] = $customer->title;
    }
  }

  return $items;
}