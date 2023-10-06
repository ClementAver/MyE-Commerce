<?php

namespace Controllers;

use Utils\DatabaseConnection;
use Models\ArticleRepository;
use Models\CartRepository;

class CartAdd
{
  public function execute($id)
  {
    $articleRepository = new ArticleRepository();
    $articleRepository->connection = new DatabaseConnection();
    $cartRepository = new CartRepository();
    $cartRepository->connection = new DatabaseConnection();

    $article = $articleRepository->getArticle($id);

    $cartRepository->addArticleToSESSION($id, $article);
    $cartRepository->addToStock($article);

    header('Location: index.php');
  }
}