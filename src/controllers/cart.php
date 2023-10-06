<?php

namespace Controllers;

use Models\CartRepository;

class Cart
{
  public function execute()
  {
    $cart = new CartRepository();
    $empty = $cart->isCartEmpty();
    $items = $cart->purchasedList();

    require_once 'templates/cart.php';
  }
}