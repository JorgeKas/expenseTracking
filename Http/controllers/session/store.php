<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Http\Forms\LoginForm;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];


$form = new LoginForm();

if (! $form->validate($email, $password)) {
  return view('session/create.view.php', [
    'errors' => $form->errors()
  ]);
};


// Validate the form input
// $errors = [];

// if (!Validator::email($email)) {
//   $errors['email'] = 'Please enter a valid email address';
// }

// if (!Validator::string($password)) {
//   $errors['password'] = 'Please provide a valid password';
// }

// if (!empty($errors)) {
//   return view('session/create.view.php', [
//     'errors' => $errors
//   ]);
// }

// Match the credentials
$user = $db->query('SELECT * FROM users WHERE email = :email', [
  'email' => $email
])->find();

if ($user) {
  // User exists but we need to check the password
  if (password_verify($password, $user['password'])) {
    // Log in the user if credentials are correct
    login([
      'email' => $email,
    ]);

    header('Location: /');
    exit();
  }
}



// If password is incorrect then notify user
return view('session/create.view.php', [
    'errors' => [
      'email' => 'No account found with this email address and/or password'
    ]
  ]);