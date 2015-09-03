<?php

/**
 * @param $form
 * @param $form_state
 * @param bool $node
 *
 * @return array
 */
function task_form($form, &$form_state, $node = FALSE) {
  $form = array();
  $form['#tree'] = TRUE;
  $form_type = 'add';

  // Alter form type
  if ($node) {
    $form_type = 'update';
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
    '#href'       => 'opgaver',
    '#attributes' => array(
      'class' => array(
        'btn',
        'btn-danger',
      ),
    ),
  );

  // Container
  $form['task'] = array(
    '#type'       => 'container',
    '#attributes' => array(
      'class' => array(),
    ),
  );
  // Headline
  $form['task']['headline'] = array(
    '#type'   => 'item',
    '#markup' => '<legend>' . t('Bil') . '</legend>',
  );
  // Defect
  $form['task']['field_defect'] = array(
    '#title'    => t('Overskrift/defekt'),
    '#type'     => 'textfield',
    '#required' => TRUE,
  );
  // Invoice number
  $form['task']['field_invoice_number'] = array(
    '#title' => t('Faktura nr.'),
    '#type'  => 'textfield',
  );
  // Customer
  $form['task']['field_customer_id'] = array(
    '#title'             => t('Kunde'),
    '#type'              => 'select',
    '#options' => task_form_load_customers(),
    '#required'          => TRUE,
  );
  // Assigned employee
  $form['task']['field_assigned_employee'] = array(
    '#title'             => t('Tildelt medarbejder'),
    '#type'              => 'select',
    '#options' => task_form_load_employees(),
    '#required'          => TRUE,
  );
  // Starting date
  $form['task']['field_starting_date'] = array(
    '#title'      => t('Startdato'),
    '#type'       => 'textfield',
    '#attributes' => array(
      'class' => array(
        'datetimepicker',
      ),
    ),
  );
  // Description
  $form['task']['field_description'] = array(
    '#title' => t('Beskrivelse'),
    '#type'  => 'textarea',
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
    '#title' => t('Registreringsnummer'),
    '#type'  => 'textfield',
  );
  // Engine no.
  $form['id']['field_engine_number'] = array(
    '#title' => t('Motor nr.'),
    '#type'  => 'textfield',
  );
  // Engine no.
  $form['id']['field_gearbox_number'] = array(
    '#title' => t('Gearkasse nr.'),
    '#type'  => 'textfield',
  );
  // Serial no.
  $form['id']['field_serial_number'] = array(
    '#title'    => t('Stel nr.'),
    '#type'     => 'textfield',
    '#required' => TRUE,
  );
  // Rear axle no.
  $form['id']['field_rear_axle_number'] = array(
    '#title' => t('Bagtøjs nr.'),
    '#type'  => 'textfield',
  );

  return $form;
}

/**
 * @param $form
 * @param $form_state
 */
function task_form_validate($form, &$form_state) {

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
function task_form_submit($form, &$form_state) {
  global $user;

  // Get fields
  $defect = $form['task']['field_defect']['#value'];
  $invoice_number = $form['task']['field_invoice_number']['#value'];
  $employee_id = $form['task']['field_employee_id']['#value'];


  $customer_id = $form['task']['field_customer_id']['#value'];
  $starting_date = $form['task']['field_starting_date']['#value'];
  $description = $form['task']['field_description']['#value'];

  $registration_number = $form['id']['field_registration_number']['#value'];
  $engine_number = $form['id']['field_engine_number']['#value'];
  $gearbox_number = $form['id']['field_gearbox_number']['#value'];
  $serial_number = $form['id']['field_serial_number']['#value'];
  $rear_axle_number = $form['id']['field_rear_axle_number']['#value'];

  // Set node defaults
  $node = new stdClass();
  $node->title = $defect;
  $node->type = 'vehicle_tasks';
  $node->language = LANGUAGE_NONE;
  $node->uid = $user->uid;
  $node->status = 1;

  node_object_prepare($node); // Sets some defaults. Invokes hook_prepare() and hook_node_prepare().

  // Set node values
  $node->field_invoice_number[$node->language][0]['value'] = $invoice_number;
  $node->field_starting_date[$node->language][0]['value'] = date('Y-m-d', $starting_date);

  $node->field_assigned_employee[$node->language][0]['target_id'] = (int) $employee_id;


  $node->field_customer_id[$node->language][0]['target_id'] = (int) $customer_id;
  $node->field_description[$node->language][0]['value'] = $description;

  $node->field_registration_number[$node->language][0]['value'] = $registration_number;
  $node->field_engine_number[$node->language][0]['value'] = $engine_number;
  $node->field_gearbox_number[$node->language][0]['value'] = $gearbox_number;
  $node->field_serial_number[$node->language][0]['value'] = $serial_number;
  $node->field_rear_axle_number[$node->language][0]['value'] = $rear_axle_number;

  // Save node
  $node = node_submit($node); // Prepare node for saving
  node_save($node);

  // Redirect to overview
  drupal_set_message(t('Opgaven blev oprettet korrekt.'));
  drupal_goto('opgaver');
}

/**
 * @return array
 */
function task_form_load_employees() {
  $items = array();

  // Query DB
  $query = new EntityFieldQuery();
  $query->entityCondition('entity_type', 'user')
    ->entityCondition('bundle', 'customers')
    ->propertyCondition('status', 1);
  $result = $query->execute();

  // Results exist
  if (!empty($result['node'])) {
    $nids = array_keys($result['node']);

    // Load all
    $customers = node_load_multiple($nids);

    // Run through customers
    foreach($customers as $customer) {
      $items[$customer->nid] = $customer->title;
    }
  }

  return $items;
}