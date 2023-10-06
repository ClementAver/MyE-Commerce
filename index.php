<?php
session_start();

require_once 'vendor/autoload.php';

use Controllers\CartAdd;
use Controllers\CartRemove;
use Controllers\Comments;
use Controllers\Login;
use Controllers\Logout;
use Controllers\SubmitComment;
use Controllers\Homepage;

try {
  if (isset($_GET['action']) && $_GET['action'] !== '') {
    if ($_GET['action'] === 'addToCart') {
      if (isset($_GET['id']) && $_GET['id'] > 0) {
        (new CartAdd())->execute($_POST['id']);
      }
    }
    if ($_GET['action'] === 'removeFromCart') {
      if (isset($_GET['id']) && $_GET['id'] > 0) {

        (new CartRemove())->execute($_POST['id']);
      }
    }
    if ($_GET['action'] === 'comments') {
      if (isset($_GET['id']) && $_GET['id'] > 0) {

        (new Comments())->execute($_GET['id']);
      }
    }
    if ($_GET['action'] === 'login') {
      (new Login())->execute($_POST);
    }
    if ($_GET['action'] === 'logout') {
      (new Logout())->execute();
    }
    if ($_GET['action'] === 'submitComment') {
      if (isset($_GET['id']) && $_GET['id'] > 0) {
        (new SubmitComment())->execute($_POST);
      }
    }
  } else {
    (new Homepage())->execute();
  }
} catch (Exception $e) {
  $errorMessage = $e->getMessage();

  require('templates/error.php');
}