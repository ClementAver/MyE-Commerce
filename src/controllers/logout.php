<?php

require_once 'src/model.php';
require_once 'src/models/logout.php';

function logout()
{
  if (isset($_COOKIE['LOGGED_USER'])) {
    unsetUserCookie();
  }
  header('Location: index.php');
}