<?php

function sharan_get_charging_object() {
  $is_event = (get_query_var( 'register' ) == 'event');
  $pz_charging = new ChargingRequest();

  $_POST['price_option'] = isset($_POST['price_option']) ? (int)$_POST['price_option'] : 0;
  if ($is_event) :
    $price_option = get_field('price_options')[$_POST['price_option']];
  else :
    $price_option = get_field('consultation_price_options', 'options')[$_POST['price_option']];
  endif;

  $name = isset($_POST['name']) ? filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING) : null;
  $email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : null;
  $phone = isset($_POST['phone']) ? filter_var(trim($_POST['phone']), FILTER_SANITIZE_STRING) : null;
  $address = isset($_POST['address']) ? filter_var(trim($_POST['address']), FILTER_SANITIZE_STRING) : null;
  $comments = isset($_POST['comments']) ? filter_var(trim($_POST['comments']), FILTER_SANITIZE_STRING) : null;

  if ($is_event) :
    $event_name = get_the_title();
  else :
    $event_name = 'Consultation';
  endif;

  // Check required fields
  if (!$name || !$email || !$phone || !$address || !$price_option) return false;

  $price_option_name = $price_option['name'];
  $amount = $price_option['price'];

  // Add a registration to the database
  $registration = array(
    'post_title' => $event_name . ' - ' . $name,
    'post_status' => 'publish',
    'post_type' => 'registration'
  );
  $id = wp_insert_post($registration);
  if (!$id) return false;

  $digits = 3;
  $transaction_id = (string)rand(pow(10, $digits-1), pow(10, $digits)-1) . (string)$id;

  $updated_title = array(
    'ID' => $id,
    'post_title' => $event_name . ' - ' . $transaction_id . ' - ' . $name . ' [In progress]',
  );
  wp_update_post($updated_title);

  // Set fields
  update_field('field_reg_transaction_id', $transaction_id, $id);
  update_field('field_reg_status', 'Payment incomplete', $id);
  update_field('field_53835a4938d7d', $name, $id);
  update_field('field_53835a5b38d7e', $email, $id);
  update_field('field_53835a6338d7f', $phone, $id);
  update_field('field_53835a6a38d80', $address, $id);
  update_field('field_53835a7238d81', $comments, $id);

  update_field('field_53835a8c38d82', !$is_event, $id);
  if ($is_event) {
    update_field('field_53835a9c38d83', get_the_ID(), $id);
  }

  update_field('field_5383609e116b2', $price_option_name, $id);
  update_field('field_538360ef116b3', $amount, $id);

  // Create payzippy object
  $pz_charging->set_buyer_email_address($email)
              ->set_merchant_transaction_id($transaction_id)
              ->set_transaction_amount($amount * 100)
              ->set_payment_method('PAYZIPPY')
              ->set_ui_mode('REDIRECT')
              ->set_billing_name($name)
              ->set_buyer_phone_no($phone)
              ->set_shipping_address($address)
              ->set_udf1($id);

  if ($is_event) {
    $pz_charging->set_product_info2($event_name);
  }

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

  $registration = get_post($id);
  if (get_field('consultation', $id)) :
    $response['return_url'] = '/consultation';
  else :
    $event_id = get_field('event', $id);
    $response['return_url'] = get_permalink($event_id);
  endif;

  if ($response['success']) :
    update_field('field_reg_status', 'Successful', $id);
    $status = '[Success]';
  else :
    update_field('field_reg_status', 'Failed', $id);
    $status = '[Failed]';
  endif;

  $old_title = get_the_title($id);
  $updated_title = array(
    'ID' => $id,
    'post_title' => str_replace('[In progress]', $status, $old_title),
  );
  wp_update_post($updated_title);

  update_field('field_reg_pz_message', $response['message'], $id);
  update_field('field_reg_pz_code', $response['code'], $id);
  update_field('field_reg_pz_id', $response['payzippy_id'], $id);

  if ($response['success']) :
    sharan_registration_mails($registration);
  endif;

  return $response;
}