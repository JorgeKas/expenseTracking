<?php

// Show all the notes

use Core\App;
use Core\Database;

// $config = require base_path('dbconfig.php');
// $db = new Database($config['database']);

$db = App::resolve(Database::class);

$notes = $db->query('select * from notes where user_id = 1')->get();

view("notes/index.view.php", [
  'heading' => 'My Notes',
  'notes' => $notes
]);