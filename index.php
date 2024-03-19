<?php

require 'functions.php';
require 'Database.php';
//require 'router.php';

$db = new Database();
$users = $db->query("select * from users")->fetchAll(PDO::FETCH_ASSOC);

dd($users);

// foreach ($users as $user) {
//   echo "<ul>" .  $user['name'] . "</ul>";
// }