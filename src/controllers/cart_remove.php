<?php

require_once 'src/model.php';
require_once 'src/models/cart_remove.php';

function cart_remove($id)
{

  $article = getArticle($id);

  removeArticleFromSESSION($id, $article);
  removeFromStock($article);

  header('Location: index.php');
}