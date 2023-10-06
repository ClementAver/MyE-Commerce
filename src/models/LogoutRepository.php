<?php

namespace Models;

class LogoutRepository
{
  public function unsetUserCookie()
  {
    unset($_COOKIE['LOGGED_USER']);
    setcookie('LOGGED_USER', '', -1, '/');
  }
}