<?php

use Core;

class Validator
{

  public static function string($value, $min = 1, $max = INF)
  {
    // Use of built-in strlen func. to check if no chars typed
    // and trim to delete space chars before & after
    $value = trim($value);

    return strlen($value) >= $min && strlen($value) <= $max;
  }

  public static function email($value)
  {
    return filter_var($value, FILTER_VALIDATE_EMAIL);
  }

}