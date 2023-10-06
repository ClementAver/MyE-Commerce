<?php

namespace Utils;

class DatabaseConnection
{
  public ?\PDO $database = null;

  public function getConnection(): \PDO
  {
    if ($this->database === null) {
      try {
        $this->database = new \PDO('mysql:host=localhost;dbname=my_ecommerce;charset=utf8', 'root', 'root');
      } catch (\Exception $e) {
        die('Erreur : ' . $e->getMessage());
      }
    }

    return $this->database;
  }
}