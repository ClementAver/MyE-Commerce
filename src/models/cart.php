<?php
function isCartEmpty()
{
  $content = "";

  if (!isset($_SESSION['CART']) || count($_SESSION['CART']) == 0) {
    $content = '<div><p>Panier vide</p></div>';
  }

  return $content;
}

function purchasedList()
{
  $content = array();

  if (isset($_SESSION['CART']) && count($_SESSION['CART']) > 0) {
    foreach ($_SESSION['CART'] as $article) {
      ob_start();
      $shop_form = purchase_form($article['id'], $article['stock']);
      require('templates/cart_item.php');
      $item = ob_get_clean();
      array_push($content, $item);
    }
  }

  return $content;
}