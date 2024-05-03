<?php

// Controller to edit a form for note creation

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

//$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', [
  'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);


  view("notes/edit.view.php", [
  'heading' => 'Edit a Note',
  'errors' => [],
  'note' => $note
]);