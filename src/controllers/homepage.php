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
    $login = $homepage->isConnected();
    require_once 'templates/homepage.php';
  }
}