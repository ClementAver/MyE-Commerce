<?php
function unsetUserCookie()
{
  unset($_COOKIE['LOGGED_USER']);
  setcookie('LOGGED_USER', '', -1, '/');
}