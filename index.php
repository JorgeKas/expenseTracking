<?php

require 'functions.php';
require 'Database.php';
//require 'router.php';

$dbconfig = require('dbconfig.php');

$db = new Database($dbconfig['database']);
$users = $db->query("select * from users")->fetchAll(PDO::FETCH_ASSOC);

dd($users);

// foreach ($users as $user) {
//   echo "<ul>" .  $user['name'] . "</ul>";
// }