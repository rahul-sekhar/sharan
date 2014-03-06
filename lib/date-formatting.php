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
    echo sharan_date_range($from_date, $to_date);
  } else {
    echo sharan_long_date($from_date);
  }
}

function sharan_long_date($date) {
  if (!$date) {
    return false;
  }

  $formatted_date = $date->format('jS ');
  $formatted_date .= '<span class="month">' . $date->format('F') . '</span>';
  $formatted_date .= $date->format(' Y');
  return $formatted_date;
}

function sharan_date_range($from, $to) {
  if (!$from || !$to) {
    return false;
  }

  $formatted_to = sharan_long_date($to);

  if ($from->format('Y') != $to->format('Y')) {
    $formatted_from = sharan_long_date($from);
  } elseif ($from->format('m') != $to->format('m')) {
    $formatted_from = $from->format('jS ');
    $formatted_from .= '<span class="month">' . $from->format('F') . '</span>';
  } else {
    $formatted_from = $from->format('jS');
  }

  return $formatted_from . '&mdash;' . $formatted_to;
}