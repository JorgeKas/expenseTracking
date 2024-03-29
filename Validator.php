<?php

class Validator
{

  public function string($value, $min = 1, $max = INF)
  {
    // Use of built-in strlen func. to check if no chars typed
    // and trim to delete space chars before & after
    $value = trim($value);

    return strlen($value) >= min && strlen($value) <= max;
  }

}