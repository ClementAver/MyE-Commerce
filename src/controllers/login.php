<?php

namespace Controllers;

use Utils\DatabaseConnection;
use Models\LoginRepository;

class Login
{
  public function execute($post)
  {
    $login = new LoginRepository();
    $login->connection = new DatabaseConnection();

    $userNotFound = false;
    $validation = [
      'email' => true,
      'password' => true,
    ];

    if (isset($post['email']) && isset($post['password'])) {
      $validation = $login->checkLoginInputs($post);

      if ($validation['email'] && $validation['password']) {
        $user = $login->getUser($post['email'], $post['password']);

        if (isset($user['full_name'])) {
          $login->setUserCookie($user['id']);
          header('Location: index.php');
        } else {
          $userNotFound = true;
        }
      }


    }

    require_once 'templates/login.php';
  }
}