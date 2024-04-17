<?php

// controller for persisting a new note to DB

use Core\Validator;
use Core\Database;

$config = require base_path('dbconfig.php');
$db = new Core\Database($config['database']);

$errors = [];

// client-side validation for empty text
if (!Validator::string($_POST['body'], 1, 40)) {
  $errors['body'] = 'A body of no more than 40 chars is required';
}

if (!empty($errors)) {

return view("notes/create.view.php", [
    'heading' => 'Create a Note',
    'errors' => $errors
  ]);
}

//Create record on db since validation is ok

$db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
  'body' => $_POST['body'],
  'user_id' => 1
]);

header('location: /notes');
die();