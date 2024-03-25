<?php

$config = require('dbconfig.php');
$db = new Database($config['database']);

$heading = 'Note';

//$id = $_GET['id'];

$note = $db->query('select * from notes where id = :id', ['id' => $_GET['id']])->fetch();



require "views/note.view.php";