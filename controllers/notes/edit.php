<?php

use Core\App;
use Core\Database;

// Controller to edit a form for note creation

$db = App::resolve(Database::class);

$currentUserId = 1;


$note = $db->query('select * from notes where id = :id', [
  'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);


  view("notes/edit.view.php", [
  'heading' => 'Edit a Note',
  'errors' => [],
  'note' => $note
]);