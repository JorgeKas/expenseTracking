<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
  protected $errors = [];

  public function validate($email, $password)
  {
  // Validate the form input
    

    if (!Validator::email($email)) {
      $this->errors['email'] = 'Please enter a valid email address';
    }

    if (!Validator::string($password)) {
      $this->errors['password'] = 'Please provide a valid password';
    }
      // check if array errors is empty
      return empty($this->errors);
  }

  // Method below return the errors from protected $errors above. Don't want to interact with protected properties directly
  public function errors()
  {
    return $this->errors;
  }

}