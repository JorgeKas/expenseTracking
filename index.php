<?php

require 'functions.php';
require 'Database.php';
//require 'router.php';

$dbconfig = require('dbconfig.php');

$db = new Database($dbconfig['database']);

$id = ($_GET['id']);
$query = "select * from users where id = ?";

$users = $db->query($query, [$id])->fetch(PDO::FETCH_ASSOC);

dd($users);

// foreach ($users as $user) {
//   echo "<ul>" .  $user['name'] . "</ul>";
// }