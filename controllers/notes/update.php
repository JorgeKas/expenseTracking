<?php

// Where this edit will submit

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 1;

// find the corresponding note in the database
$note = $db->query('select * from notes where id = :id', [
  'id' => $_POST['id']
])->findOrFail();

// authorize that the user is the owner of the note
authorize($note['user_id'] === $currentUserId);

// validate the body of the note
$errors = [];

if (!Validator::string($_POST['body'], 1, 70)) {
  $errors['body'] = 'A body of no more than 70 chars is required';
}

// if no errors are found, update the note in the database table
if (count($errors)) {
  return view("notes/edit.view.php", [
    'heading' => 'Edit a Note',
    'errors' => $errors,
    'note' => $note
  ]);
}

$db->query('update notes set body = :body where id = :id', [
  'id' => $_POST['id'],
  'body' => $_POST['body']
]);

// redirect the user to the notes page
header('Location: /notes');
die();