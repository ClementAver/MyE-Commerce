<?php

namespace Models;

use Utils\DatabaseConnection;

class ArticleRepository
{
  public DatabaseConnection $connection;

  public function getAllArticles()
  {
    $statement = $this->connection->getConnection()->prepare("SELECT * FROM articles WHERE availability = true");
    $statement->execute();

    $articles = [];
    while (($row = $statement->fetch())) {
      $article = new Article();
      $article->connection = $this->connection;
      $article->id = $row['id'];
      $article->name = $row['name'];
      $article->description = $row['description'];
      $article->seller = $row['seller'];
      $article->price = $row['price'];
      $article->stock = $row['stock'];

      $articles[] = $article;
    }

    return $articles;
  }

  public function getArticle($id)
  {
    $statement = $this->connection->getConnection()->prepare("SELECT * FROM articles WHERE id = :id");
    $statement->execute(['id' => $id]);

    while (($row = $statement->fetch())) {
      $article = new Article();
      $article->id = $row['id'];
      $article->name = $row['name'];
      $article->description = $row['description'];
      $article->seller = $row['seller'];
      $article->price = $row['price'];
      $article->stock = $row['stock'];
    }

    return $article;
  }

  public function averageRating($id)
  {
    $statement = $this->connection->getConnection()->prepare("SELECT AVG(rate) AS rate FROM comments WHERE article_id = :id");

    $statement->execute([
      'id' => $id,
    ]);
    $result = $statement->fetch();
    return $result['rate'];
  }
}