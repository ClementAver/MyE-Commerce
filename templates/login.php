<?php $title = "Connexion" ?>

<?php ob_start(); ?>

<h1>Se connecter :</h1>



<form class="form" action="index.php?action=login" method="post">
  <div>
    <label for="email">E-mail</label>
    <input type="text" id="email" name="email" placeholder="françois.dupont@aol.com" />

    <span <?php if (!$validation['email']) {
      echo 'class="invalid"';
    } else {
      echo 'style="display: none"';
    }
    ?>>L'e-mail renseigné n'est pas valide.</span>
  </div>

  <div>
    <label for="password">Mot de passe</label>
    <input type="password" id="password" name="password" />

    <span <?php if (!$validation['password']) {
      echo 'class="invalid"';
    } else {
      echo 'style="display: none"';
    }
    ?>>Le mot de passe renseigné n'est pas valide.</span>
  </div>

  <button type="submit">Se connecter</button>
</form>

<p <?php if ($userNotFound) {
  echo 'class="invalid"';
} else {
  echo 'style="display: none"';
}
?>>Ce profil n'existe
  pas. Réessayer ?</p>

<a href='index.php' ?>
  Continuer mes achats
</a>

<?php $content = ob_get_clean(); ?>

<?php require_once 'layout.php' ?>