<?php

namespace Controllers;

use Models\CartRepository;

class Cart
{
  public function execute()
  {
    $cart = new CartRepository();

    $empty = "";
    if (!isset($_SESSION['CART']) || count($_SESSION['CART']) == 0) {
      $empty = '<div><p>Panier vide</p></div>';
    }

    $items = [];
    if (isset($_SESSION['CART']) && count($_SESSION['CART']) > 0) {
      $items = $cart->purchasedList();
    }

    require_once 'templates/cart.php';
  }
}