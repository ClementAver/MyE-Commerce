<?php

session_start();

require_once 'src/controllers/homepage.php';
require_once 'src/controllers/gallery.php';
require_once 'src/controllers/cart.php';
require_once 'src/controllers/cart_add.php';
require_once 'src/controllers/cart_remove.php';
require_once 'src/controllers/comments.php';
require_once 'src/controllers/login.php';
require_once 'src/controllers/logout.php';
require_once 'src/controllers/submitComment.php';

try {
  if (isset($_GET['action']) && $_GET['action'] !== '') {
    if ($_GET['action'] === 'addToCart') {
      if (isset($_GET['id']) && $_GET['id'] > 0) {
        cart_add($_POST['id']);
      }
    }
    if ($_GET['action'] === 'removeFromCart') {
      if (isset($_GET['id']) && $_GET['id'] > 0) {

        cart_remove($_POST['id']);
      }
    }
    if ($_GET['action'] === 'comments') {
      if (isset($_GET['id']) && $_GET['id'] > 0) {

        comments($_GET['id']);
      }
    }
    if ($_GET['action'] === 'login') {
      login($_POST);
    }
    if ($_GET['action'] === 'logout') {
      logout();
    }
    if ($_GET['action'] === 'submitComment') {
      if (isset($_GET['id']) && $_GET['id'] > 0) {
        submitComment($_POST);
      }
    }
  } else {
    homepage();
  }
} catch (Exception $e) {
  $errorMessage = $e->getMessage();

  require('templates/error.php');
}