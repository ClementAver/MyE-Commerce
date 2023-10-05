<?php

require_once 'src/model.php';
require_once 'src/models/homepage.php';

function homepage()
{
  $login = isConnected();
  require_once 'templates/homepage.php';
}