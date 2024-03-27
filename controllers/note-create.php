<?php

$config = require('dbconfig.php');
$db = new Database($config['database']);

$heading = 'Create a Note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $errors = [];
    
    // client-side validation for empty text
    if (strlen($_POST['body']) === 0) {
      $errors['body'] = 'A body is required';
    }

    // Server side validation for maximum amount of chars in the form
    if (strlen($_POST['body']) > 10) {
      $errors['body'] = 'Message cannot be more than 10 characters';
    }

    //Create record on db since validation is ok
    if (empty($errors)) {
      $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
      'body' => $_POST['body'],
      'user_id'=>1
      ]);
    }
}

require "views/note-create.view.php";