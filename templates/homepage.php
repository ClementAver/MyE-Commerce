<?php $title = "Page d'accueil" ?>

<?php ob_start(); ?>

<?= $login ?>
<section class="hero">
  <h2>Bienvenue sur mon site e-commerce !</h2>
  <p>Vous pourrez retrouver ici les articles disponible à la vente dans notre boutique&nbsp;:</p>
</section>

<?php

gallery();
cart();
?>

<?php $content = ob_get_clean(); ?>

<?php require_once 'layout.php' ?>