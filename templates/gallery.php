<section class="gallery">

  <?php foreach ($articles as $article):
    ob_start()
      ?>
    <article>
      <h3>
        <?= $article['name'] ?>
      </h3>
      <p>
        <?= $article['stars']; ?>
      </p>
      <?= '<p class="seller">Vendu par : ' . $article['seller'] . '</p>' ?>
      <p>
        <?= $article['description'] ?>
      </p>
      <p class="price">
        <?= $article['price'] . '€' ?>
      </p>
      <?php
      if ($article['stock'] < 1) {
        echo '<p style="color: red; font-size:0.8rem;">Out of stock</p>';
      }
      ?>

      <div class="shop-comment">
        <?= $article['can_be_purchased'] ?>
        <form action="index.php?action=comments&id=<?= urlencode($article['id']) ?>" method="post">
          <!--  input utile ? pas sûr ! -->
          <input type="hidden" name="id" value=<?php echo $article['id'] ?> />
          <button type="submit" aria-label="Voir les commentaires pour cet article">🗨️</button>
        </form>
      </div>
    </article>
    <?php $article = ob_get_clean();
    echo $article;
    ?>
  <?php endforeach; ?>
</section>