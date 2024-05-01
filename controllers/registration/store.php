<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

// Validate the form input
$errors = [];
if (!Validator::email($email)) {
  $errors['email'] = 'Please enter a valid email address';
}

$errors = [];
if (!Validator::string($password, 7, 255)) {
  $errors['password'] = 'Please enter a password of at least 7 chars';
}

if (!empty($errors)) {
 return view('registration/create.view.php', [
  'errors' => $errors
  ]);
}

$db = App::resolve(Database::class);
// Check if the account already exists
$user = $db->query('SELECT * FROM users WHERE email = :email', [
  'email' => $email
  ])->find();

// if it does redirect to the login page
if ($user) {
  header('Location: /login');
  exit();
} else {
  // if not then save the account to the database and log the user in and redirect
  $user = $db->query('INSERT INTO users (email, password) VALUES (:email, :password)', [
    'email' => $email,
    'password' => password_hash($password, PASSWORD_BCRYPT)
  ]);

 login([
  'email' => $email,
 ]);

  header ('Location: /');
  exit();
}