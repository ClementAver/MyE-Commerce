<?php

namespace Controllers;

use Utils\DatabaseConnection;
use Models\CommentRepository;
use Models\ArticleRepository;

class Comments
{
  public function execute($id)
  {
    $connection = new DatabaseConnection();

    $commentRepository = new CommentRepository();
    $commentRepository->connection = $connection;
    $comments = $commentRepository->getAllComments($id);

    $articleRepository = new ArticleRepository();
    $articleRepository->connection = $connection;

    $article = $articleRepository->getArticle(($comments[0]->article));
    $article->connection = $connection;

    if (!isset($_GET['comment']) && !isset($_GET['rate'])) {
      $validation['comment'] = true;
      $validation['rate'] = true;
    }

    if (isset($_GET['comment']) && isset($_GET['rate'])) {
      $validation['comment'] = boolval($_GET['comment']);
      $validation['rate'] = boolval($_GET['rate']);
    }

    $commentForm = "";
    if (isset($_COOKIE['LOGGED_USER']) || !empty($_COOKIE['LOGGED_USER'])) {
      $commentForm = $commentRepository->commentForm($article->id, $validation);
    }

    $averageRating = $article->stars();

    require_once 'templates/comments.php';
  }
}