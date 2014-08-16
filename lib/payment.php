<?php

function sharan_registration_is_event() {
  return (get_query_var( 'register' ) == 'event');
}

function sharan_registration_data() {
  $data = array();

  $_POST['price_option'] = isset($_POST['price_option']) ? (int)$_POST['price_option'] : 0;
  if (sharan_registration_is_event()) :
    $data['price_option'] = get_field('price_options')[$_POST['price_option']];
  else :
    $data['price_option'] = get_field('consultation_price_options', 'options')[$_POST['price_option']];
  endif;

  $data['name'] = isset($_POST['name']) ? filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING) : null;
  $data['email'] = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : null;
  $data['phone'] = isset($_POST['phone']) ? filter_var(trim($_POST['phone']), FILTER_SANITIZE_STRING) : null;
  $data['address'] = isset($_POST['address']) ? filter_var(trim($_POST['address']), FILTER_SANITIZE_STRING) : null;
  $data['comments'] = isset($_POST['comments']) ? filter_var(trim($_POST['comments']), FILTER_SANITIZE_STRING) : null;
  $data['gateway'] = !isset($_POST['method']) || $_POST['method'] == 'gateway';

  if (sharan_registration_is_event()) :
    $data['event_name'] = get_the_title();
  else :
    $data['event_name'] = 'Consultation';
  endif;

  // Check required fields
  if (!$data['name'] || !$data['email'] || !$data['phone'] || !$data['address'] || !$data['price_option']) return false;

  $data['price_option_name'] = $data['price_option']['name'];
  $data['amount'] = $data['price_option']['price'];

  return $data;
}

function sharan_add_registration_data($data) {
  // Add a registration to the database
  $registration = array(
    'post_title' => $data['event_name'] . ' - ' . $data['name'],
    'post_status' => 'publish',
    'post_type' => 'registration'
  );
  $id = wp_insert_post($registration);
  if (!$id) return false;

  $digits = 3;
  $transaction_id = (string)$id . (string)rand(pow(10, $digits-1), pow(10, $digits)-1);

  $data['status'] = $data['gateway'] ? 'In progress/incomplete' : 'Offline payment';

  $updated_title = array(
    'ID' => $id,
    'post_title' => $data['event_name'] . ' - ' . $transaction_id . ' - ' . $data['name'] . ' [' . $data['status'] . ']',
  );
  wp_update_post($updated_title);

  // Set fields
  update_field('field_reg_transaction_id', $transaction_id, $id);
  update_field('field_reg_status', $data['status'], $id);
  update_field('field_53835a4938d7d', $data['name'], $id);
  update_field('field_53835a5b38d7e', $data['email'], $id);
  update_field('field_53835a6338d7f', $data['phone'], $id);
  update_field('field_53835a6a38d80', $data['address'], $id);
  update_field('field_53835a7238d81', $data['comments'], $id);

  update_field('field_53835a8c38d82', !sharan_registration_is_event(), $id);
  if (sharan_registration_is_event()) {
    update_field('field_53835a9c38d83', get_the_ID(), $id);
  }

  update_field('field_5383609e116b2', $data['price_option_name'], $id);
  update_field('field_538360ef116b3', $data['amount'], $id);

  $data['transaction_id'] = $transaction_id;
  $data['id'] = $id;
  return $data;
}

function sharan_registration_return_url($id) {
  if (get_field('consultation', $id)) :
    return '/consultation';
  else :
    $event_id = get_field('event', $id);
    return get_permalink($event_id);
  endif;
}


function sharan_manual_payment() {
  $response = array();

  $data = sharan_registration_data();
  if (!$data) :
    $response['success'] = false;
    return $response;
  endif;

  $data = sharan_add_registration_data($data);
  if (!$data) :
    $response['success'] = false;
    return $response;
  endif;

  sharan_registration_mails($data['id']);

  $response['transaction_id'] = $data['transaction_id'];
  $response['return_url'] = sharan_registration_return_url($data['id']);
  $response['success'] = true;
  return $response;
}

function sharan_get_charging_object() {
  $pz_charging = new ChargingRequest();
  $data = sharan_registration_data();
  if (!$data) return false;
  $data = sharan_add_registration_data($data);
  if (!$data) return false;

  // Create payzippy object
  $pz_charging->set_buyer_email_address($data['email'])
              ->set_merchant_transaction_id($data['transaction_id'])
              ->set_transaction_amount($data['amount'] * 100)
              ->set_payment_method('PAYZIPPY')
              ->set_ui_mode('REDIRECT')
              ->set_billing_name($data['name'])
              ->set_buyer_phone_no($data['phone'])
              ->set_shipping_address($data['address'])
              ->set_udf1($data['id'])
              ->set_item_total($data['amount'] * 100)
              ->set_item_vertical('Registration');

  $charging_object = $pz_charging->charge();

  if ($charging_object["status"] != "OK") :
    return false;
  else :
    return $charging_object;
  endif;
}

function sharan_get_charging_response() {
  $pz_charging_response = new ChargingResponse(array_merge($_POST,$_GET));

  $response = array();
  $response['success'] = $pz_charging_response->is_transaction_successful() && $pz_charging_response->validate();
  $response['message'] = $pz_charging_response->get_transaction_response_message();
  $response['code'] = $pz_charging_response->get_transaction_response_code();
  $response['transaction_id'] = $pz_charging_response->get_merchant_transaction_id();
  $response['payzippy_id'] = $pz_charging_response->get_payzippy_transaction_id();
  $response['amount'] = $pz_charging_response->get_transaction_amount() / 100;
  $response['id'] = $pz_charging_response->get_udf1();
  $id = $response['id'];

  $response['return_url'] = sharan_registration_return_url($id);
  $status = ($response['success']) ? 'Successful' : 'Failed';

  update_field('field_reg_status', $status, $id);
  $old_title = get_the_title($id);
  $updated_title = array(
    'ID' => $id,
    'post_title' => str_replace('In progress/incomplete', $status, $old_title),
  );
  wp_update_post($updated_title);

  update_field('field_reg_pz_message', $response['message'], $id);
  update_field('field_reg_pz_code', $response['code'], $id);
  update_field('field_reg_pz_id', $response['payzippy_id'], $id);

  if ($response['success']) :
    sharan_registration_mails($id);
  endif;

  return $response;
}