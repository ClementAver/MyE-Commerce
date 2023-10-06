<?php

namespace Models;

use \Utils\DatabaseConnection;

class HomepageRepository
{
  public DatabaseConnection $connection;

  public function isConnected()
  { ?>

    <?php ob_start(); ?>
    <p>Bonjour,
      <?= $this->getUserFullName() ?> 👋
    </p>
    <form action="index.php?action=logout" method="post">
      <input name="disconnect" type="hidden" value="yes">
      <button type="submit">Me déconnecter</button>
    </form>
    <?php $login = ob_get_clean();

    if (!isset($_COOKIE['LOGGED_USER']) || empty($_COOKIE['LOGGED_USER'])) {
      $login = '<a href="index.php?action=login">Se connecter</a>';
    }

    return $login;
  }

  public function getUserFullName()
  {
    $statement = $this->connection->getConnection()->prepare("SELECT full_name FROM users WHERE id = :id");
    $statement->execute([
      'id' => $_COOKIE['LOGGED_USER'],
    ]);
    $result = $statement->fetch();

    return $result['full_name'];
    ;
  }
}