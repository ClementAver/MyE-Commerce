<?php

namespace Models;

use Utils\DatabaseConnection;

class LoginRepository
{

  public DatabaseConnection $connection;

  public function checkLoginInputs($post)
  {
    if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
      $email = false;
    } else {
      $email = true;
    }

    if (!empty($post['password'])) {
      $password = true;
    } else {
      $password = false;
    }

    $validation = ['email' => $email, 'password' => $password];
    return $validation;
  }

  public function getUser($email, $password)
  {
    $statement = $this->connection->getConnection()->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
    $statement->execute([
      'email' => $email,
      'password' => $password,
    ]);
    $result = $statement->fetch();
    return $result;
  }


  public function setUserCookie($id)
  {
    $arr_cookie_options = [
      'expires' => time() + 365 * 24 * 3600000,
      'path' => '/',
      'secure' => true,
      'httponly' => true,
      'samesite' => 'none',
    ];

    setcookie(
      'LOGGED_USER',
      $id,
      $arr_cookie_options,
    );
  }
}