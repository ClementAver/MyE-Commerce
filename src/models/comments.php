<?php
function getAllComments($id)
{
  try {
    $mysqlClient = new PDO('mysql:host=localhost;dbname=my_ecommerce;charset=utf8', 'root', 'root');
  } catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
  }

  $sqlQuery = "SELECT u.full_name, c.comment, c.rate, a.name FROM comments c INNER JOIN users u ON u.id = c.author_id INNER JOIN articles a ON a.id = c.article_id WHERE c.article_id = :id";
  $statement = $mysqlClient->prepare($sqlQuery);
  $statement->execute([
    'id' => $id,
  ]);
  $result = $statement->fetchAll();
  return $result;
}

function commentForm($id, $validation)
{
  $content = "";
  if (isset($_COOKIE['LOGGED_USER']) || !empty($_COOKIE['LOGGED_USER'])):
    ob_start();
    require('templates/commentForm.php');
    $content = ob_get_clean();
  endif;
  return $content;
}