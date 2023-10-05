<?php
function isConnected()
{ ?>

  <?php ob_start(); ?>
  <p>Bonjour,
    <?= getUserFullName() ?> 👋
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

function getUserFullName()
{
  try {
    $mysqlClient = new PDO('mysql:host=localhost;dbname=my_ecommerce;charset=utf8', 'root', 'root');
  } catch (Exception $e) {
    throw new Exception($e->getMessage());
  }

  $sqlQuery = "SELECT full_name FROM users WHERE id = :id";
  $statement = $mysqlClient->prepare($sqlQuery);
  $statement->execute([
    'id' => $_COOKIE['LOGGED_USER'],

  ]);
  $result = $statement->fetch();

  return $result['full_name'];
  ;
}