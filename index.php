<?php

require 'functions.php';
//require 'router.php';

// Connect to DB and execute a querie
class Database {

}

// Conect to MySQL database
// 1. Initialise PDO
$dsn = "mysql:host=127.0.0.1;dbname=track_expense;port=3306;user=root;password=QAZwsx123;charset=utf8mb4";
$pdo = new PDO($dsn);

// prepare new querie
$statement = $pdo->prepare("select * from users");
$statement->execute();

$users = $statement->fetchAll(PDO::FETCH_ASSOC);
//dd($users);

foreach ($users as $user) {
  echo "<ul>" . $user['id'] . " " .  $user['name'] . "</ul>";
}