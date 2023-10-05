<?php $title = "Commentaires" ?>

<?php ob_start(); ?>

<h2>Commentaires à propos de l'article :
  <?= $article; ?>
</h2>
<h3>Note moyenne :
  <?= $averageRating; ?>
</h3>

<?= $commentForm; ?>
<section class="comments">
  <?php foreach ($comments as $comment) { ?>
    <article>
      <p>
        <?= rating($comment['rate']) ?>
      </p>
      <p>
        <?= $comment['comment'] ?>
      </p>
      <p>
        <?= $comment['full_name'] ?>
      </p>
    </article>
  <?php } ?>
</section>

<?php $content = ob_get_clean(); ?>

<?php require_once 'layout.php' ?>