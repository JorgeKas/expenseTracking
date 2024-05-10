<?php

namespace Core;

class Authenticator
{

    public function attempt($email, $password)
    {
        $db = App::resolve(Database::class);
        // Match the credentials
        $user = $db->query('SELECT * FROM users WHERE email = :email', [
            'email' => $email
        ])->find();

        if ($user) {
            // User exists but we need to check the password
            if (password_verify($password, $user['password'])) {
                // Log in the user if credentials are correct
                $this->login([
                    'email' => $email
                ]);

                return true;
            }
        }
        return false;
    }

    public function login($user)
  {
    $_SESSION['user'] = [
      'email' => $user['email']
    ];

    session_regenerate_id(true);
  }

    public function logout()
  {
    Session::destroy();
  }

}