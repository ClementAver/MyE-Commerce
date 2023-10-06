<?php
use Controllers\Articles;
use Controllers\Cart;

?>

<?php $title = "Page d'accueil" ?>

<?php ob_start(); ?>

<?= $login ?>
<section class="hero">
  <h2>Bienvenue sur mon site e-commerce !</h2>
  <p>Vous pourrez retrouver ici les articles disponible à la vente dans notre boutique&nbsp;:</p>
</section>

<?php

(new Articles())->execute();
(new Cart())->execute();
?>

<?php $content = ob_get_clean(); ?>

<?php require_once 'layout.php' ?>