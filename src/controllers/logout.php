<?php

namespace Controllers;

use Models\LogoutRepository;

class Logout
{
  public function execute()
  {
    $logout = new LogoutRepository();
    if (isset($_COOKIE['LOGGED_USER'])) {
      $logout->unsetUserCookie();
    }
    header('Location: index.php');
  }
}