<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
  protected $errors = [];

  public function __construct(public array $attributes)
  { 
    // Validate the form input
    if (!Validator::email($attributes['email'])) {
      $this->errors['email'] = 'Please enter a valid email address';
    }
    if (!Validator::string($attributes['password'])) {
      $this->errors['password'] = 'Please provide a valid password';
    }
  }

  public static function validate($attributes)
  {
    $instance = new static($attributes);

    return $instance->failed() ? $instance->throw() : $instance;;
  }

  public function throw() 
  {
    ValidationException::throw($this->errors(), $this->attributes);
  }

  // check if array errors is empty
  public function failed()
  {
    return count($this->errors);
  }

  // Method below return the errors from protected $errors above. Don't want to interact with protected properties directly
  public function errors()
  {
    return $this->errors;
  }

  public function error($field, $message)
  {
    $this->errors[$field] = $message;

    return $this;
  }

}