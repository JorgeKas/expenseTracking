<?php

$config = require base_path('dbconfig.php');
$db = new Database($config['database']);

$currentUserId = 1;

//$id = $_GET['id'];

$note = $db->query('select * from notes where id = :id', [
  'id' => $_GET['id']
  ])->findOrFail();

  authorize($note['user_id'] === $currentUserId);

view("notes/show.view.php", [
  'heading' => 'Note',
  'note' => $note
]);