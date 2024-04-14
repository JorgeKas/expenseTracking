<?php

use Core\Database;
use Core\Validator;

// Create the db configuration so
$config = require base_path('dbconfig.php');
// we can pass it to the constructor
$db = new Database($config['database']);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    // client-side validation for empty text
    if (! Validator::string($_POST['body'], 1, 40)) {
      $errors['body'] = 'A body of no more than 40 chars is required';
    }

    //Create record on db since validation is ok
    if (empty($errors)) {
      $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
      'body' => $_POST['body'],
      'user_id'=>1
      ]);
    }
}

view("notes/create.view.php", [
  'heading' => 'Create a Note',
  'errors' => $errors
]);