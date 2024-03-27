<?php

$config = require('dbconfig.php');
$db = new Database($config['database']);

$heading = 'Note';
$currentUserId = 1;

//$id = $_GET['id'];

$note = $db->query('select * from notes where id = :id', [
  'id' => $_GET['id']
  ])->findOrFail();

  authorize($note['user_id'] === $currentUserId);

  require "views/note.view.php";