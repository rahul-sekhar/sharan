<?php

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => 'acf_emails',
    'title' => 'Emails',
    'fields' => array (
      array (
        'key' => 'field_5380b6a446f29',
        'label' => 'Email newsletter subscriptions to',
        'name' => 'subscriptions_email',
        'type' => 'text',
        'instructions' => 'Enter a comma separated list of email addresses',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_5380c3f59400e',
        'label' => 'Subject for newsletter subscription confirmation email',
        'name' => 'subscription_email_subject',
        'type' => 'text',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_5380c4159400f',
        'label' => 'Message for newsletter subscription confirmation email',
        'name' => 'subscription_email_message',
        'type' => 'textarea',
        'default_value' => '',
        'placeholder' => '',
        'maxlength' => '',
        'rows' => '',
        'formatting' => 'br',
      ),
      array (
        'key' => 'field_5380b6c746f2a',
        'label' => 'Email event registrations to',
        'name' => 'event_registrations_email',
        'type' => 'text',
        'instructions' => 'Enter a comma separated list of email addresses',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
      array (
        'key' => 'field_5380b6fb46f2b',
        'label' => 'Email consultation registrations to',
        'name' => 'consultation_registrations_email',
        'type' => 'text',
        'instructions' => 'Enter a comma separated list of email addresses',
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'formatting' => 'none',
        'maxlength' => '',
      ),
    ),
    'location' => array (
      array (
        array (
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'acf-options-email',
          'order_no' => 0,
          'group_no' => 0,
        ),
      ),
    ),
    'options' => array (
      'position' => 'normal',
      'layout' => 'no_box',
      'hide_on_screen' => array (
      ),
    ),
    'menu_order' => 0,
  ));
}
