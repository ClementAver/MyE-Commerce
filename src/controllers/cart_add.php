<?php

require_once 'src/model.php';
require_once 'src/models/cart_add.php';

function cart_add($id)
{
  $article = getArticle($id);

  addArticleToSESSION($id, $article);
  addToStock($article);

  header('Location: index.php');
}