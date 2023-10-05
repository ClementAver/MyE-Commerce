<div class="cart">
  <h2>Mon panier</h2>

  <?= $empty ?>

  <ul>
    <?php
    foreach ($items as $item) {
      echo $item;
    }
    ?>
  </ul>
</div>