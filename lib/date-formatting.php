<?php

# Formats: http://www.php.net/manual/en/function.date.php
function sharan_create_date($string) {
  return DateTime::createFromFormat('Ymd', $string);
}

function sharan_event_dates($from, $to) {
  $from_date = sharan_create_date($from);
  if ($to) {
    $to_date = sharan_create_date($to);
  }

  if ($to && $from != $to) {
    // If both from and to dates are present
    $dates = sharan_long_date($from_date, false);
    $dates .= '&mdash;';
    $dates .= sharan_long_date($to_date);
  } else {
    // If only a from date is present or both from and to are the same
    $dates = sharan_long_date($from_date);
  }
  echo $dates;
}

function sharan_long_date($date, $include_year = true) {
  $formatted_date = $date->format('dS ');
  $formatted_date .= '<span class="month">' . $date->format('F') . '</span>';
  if ($include_year) {
    $formatted_date .= $date->format(' Y');
  }
  return $formatted_date;
}