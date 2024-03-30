<?php

require 'Validator.php';

$config = require('dbconfig.php');
$db = new Database($config['database']);

$heading = 'Create a Note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $errors = [];

    $validator = new Validator();
    
    // client-side validation for empty text
    if (! Validator::string($_POST['body'], 1, 10)) {
      $errors['body'] = 'A body of no more than 10 chars is required';
    }

    //Create record on db since validation is ok
    if (empty($errors)) {
      $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
      'body' => $_POST['body'],
      'user_id'=>1
      ]);
    }
}

require "views/notes/create.view.php";