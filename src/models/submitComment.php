<?php
function checkCommentInputs($formDatas)
{

  ['comment' => $comment, 'rate' => $rate] = $formDatas;

  if (empty($comment)) {
    $comment = 0;
  } else {
    $comment = 1;
  }

  if (empty($rate) || (intval($rate) < 0 || intval($rate) > 5)) {
    $rate = 0;
  } else {
    $rate = 1;
  }

  $validation = ['comment' => $comment, 'rate' => $rate];
  return $validation;
}

function setComment($formDatas)
{
  [
    'user_id' => $author_id,
    'article_id' => $article_id,
    'comment' => $comment,
    'rate' => $rate
  ] = $formDatas;


  try {
    $mysqlClient = new PDO('mysql:host=localhost;dbname=my_ecommerce;charset=utf8', 'root', 'root');
  } catch (Exception $e) {
    throw new Exception($e->getMessage());
  }

  try {
    $sqlQuery = 'INSERT INTO `comments` (`id`, `author_id`, `article_id`, `comment`, `rate`) VALUES (NULL, :author_id, :article_id, :comment, :rate);';
    $statement = $mysqlClient->prepare($sqlQuery);
    $statement->execute([
      'author_id' => $author_id,
      'article_id' => $article_id,
      'comment' => $comment,
      'rate' => $rate,
    ]);
  } catch (Exception $e) {
    throw new Exception($e->getMessage());
  }
}