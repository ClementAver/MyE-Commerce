<?php
function addArticleToSESSION($id, $article)
{
  if (!isset($_SESSION['CART'][$id])) {
    $_SESSION['CART'][$id] = $article;
    $_SESSION['CART'][$id]['quantity'] = 1;
  } else {
    $_SESSION['CART'][$id]['quantity']++;
  }
}

function addToStock($article)
{
  $updatedStock = $article['stock'] - 1;
  setStock($updatedStock, $article['id']);
}