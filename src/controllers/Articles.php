<?php

namespace Controllers;

use Utils\DatabaseConnection;
use Models\ArticleRepository;

class Articles
{
  public function execute()
  {
    $articleRepository = new ArticleRepository();
    $articleRepository->connection = new DatabaseConnection();
    $articles = $articleRepository->getAllArticles();

    require_once 'templates/articles.php';
  }
}