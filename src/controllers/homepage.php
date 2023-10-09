<?php

namespace Controllers;

use Utils\DatabaseConnection;
use Models\HomepageRepository;

class Homepage
{
  public function execute()
  {
    $homepage = new HomepageRepository();
    $homepage->connection = new DatabaseConnection();

    $login = '<a href="index.php?action=login">Se connecter</a>';
    if (isset($_COOKIE['LOGGED_USER']) || !empty($_COOKIE['LOGGED_USER'])) {
      $login = $homepage->isConnected();
    }

    require_once 'templates/homepage.php';
  }
}