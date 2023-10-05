<li>
  <span>
    <?php echo $article['name'] ?>
  </span>
  <span>
    <?php echo 'x' . $article['quantity'] ?>
  </span>
  <span>
    <?php echo $article['price'] * $article['quantity'] . '€' ?>
  </span>
  <div class="add-or-delete">
    <?= $shop_form ?>
    <form action="index.php?action=removeFromCart&id=<?= urlencode($article['id']) ?>" method="post">
      <!-- input utile ? pas sûr ! -->
      <input type="hidden" name="id" value=<?php echo $article['id'] ?> />
      <button type="submit" aria-label="supprimer cet article">🗑️</button>
    </form>
  </div>
</li>