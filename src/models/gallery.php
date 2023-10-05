<?php

function getAllArticles()
{
  try {
    $mysqlClient = new PDO('mysql:host=localhost;dbname=my_ecommerce;charset=utf8', 'root', 'root');
  } catch (Exception $e) {
    throw new Exception('Erreur : ' . $e->getMessage());
  }

  $sqlQuery = 'SELECT * FROM articles WHERE availability = true';
  $statement = $mysqlClient->prepare($sqlQuery);
  $statement->execute();
  $articles = $statement->fetchAll();

  $formatted = array();

  foreach ($articles as $article) {
    $article['average_rate'] = getAverageRating($article['id']);
    $article['stars'] = rating(floatval($article['average_rate']));
    $article['can_be_purchased'] = purchase_form($article['id'], $article['stock']);

    array_push($formatted, $article);
  }

  return $formatted;
}