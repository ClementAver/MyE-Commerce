<?php

require_once 'src/model.php';
require_once 'src/models/cart.php';

function cart()
{
  $empty = isCartEmpty();

  $items = purchasedList();

  require_once 'templates/cart.php';
}