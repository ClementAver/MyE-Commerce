<?php
function removeArticleFromSESSION($id, $article)
{
  if (isset($_SESSION['CART'][$id])) {
    if ($_SESSION['CART'][$id]['quantity'] <= 1) {
      unset($_SESSION['CART'][$id]);
    } else {
      $_SESSION['CART'][$id]['quantity']--;
    }
  }
}

function removeFromStock($article)
{
  $updatedStock = $article['stock'] + 1;
  setStock($updatedStock, $article['id']);
}