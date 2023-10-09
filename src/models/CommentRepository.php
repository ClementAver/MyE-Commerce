<?php

namespace Models;

use Utils\DatabaseConnection;

class CommentRepository
{
  public DatabaseConnection $connection;

  public function getAllComments($id)
  {
    $statement = $this->connection->getConnection()->prepare("SELECT u.full_name as author, c.comment, c.rate, a.id AS article_id FROM comments c INNER JOIN users u ON u.id = c.author_id INNER JOIN articles a ON a.id = c.article_id WHERE c.article_id = :id ");
    $statement->execute(['id' => $id]);

    $comments = [];
    while (($row = $statement->fetch())) {
      $comment = new Comment();
      $comment->author = $row['author'];
      $comment->comment = $row['comment'];
      $comment->rate = $row['rate'];
      $comment->article = $row['article_id'];

      $comments[] = $comment;
    }
    return $comments;
  }
  public function commentForm($id, $validation)
  {
    ob_start();
    require('templates/commentForm.php');
    $content = ob_get_clean();

    return $content;
  }

  public function checkCommentInputs($formDatas)
  {
    ['comment' => $comment, 'rate' => $rate] = $formDatas;

    if (empty($comment)) {
      $comment = 0;
    } else {
      $comment = 1;
    }

    if ($rate === "" || intval($rate) < 0 || intval($rate) > 5) {
      $rate = 0;
    } else {
      $rate = 1;
    }

    $validation = ['comment' => $comment, 'rate' => $rate];
    return $validation;
  }

  public function setComment($formDatas)
  {
    [
      'user_id' => $author_id,
      'article_id' => $article_id,
      'comment' => $comment,
      'rate' => $rate
    ] = $formDatas;

    try {
      $statement = $this->connection->getConnection()->prepare("INSERT INTO `comments` (`id`, `author_id`, `article_id`, `comment`, `rate`) VALUES (NULL, :author_id, :article_id, :comment, :rate);");
      $statement->execute([
        'author_id' => $author_id,
        'article_id' => $article_id,
        'comment' => $comment,
        'rate' => $rate,
      ]);
    } catch (\Exception $e) {
      throw new \Exception($e->getMessage());
    }
  }
}