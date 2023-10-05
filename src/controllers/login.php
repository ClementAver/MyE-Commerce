<?php

require_once 'src/model.php';
require_once 'src/models/login.php';

function login($post)
{
  $userNotFound = false;
  $validation = [
    'email' => true,
    'password' => true,
  ];

  if (isset($post['email']) && isset($post['password'])) {
    $validation = checkLoginInputs($post);

    if ($validation['email'] && $validation['password']) {
      $user = getUser($post['email'], $post['password']);

      if (isset($user['full_name'])) {
        setUserCookie($user['id']);
        header('Location: index.php');
      } else {
        $userNotFound = true;
      }
    }


  }

  require_once 'templates/login.php';
}