<?php

namespace Models;

use Utils\DatabaseConnection;

class CartRepository
{
  public DatabaseConnection $connection;
  public function addArticleToSESSION($id, $article)
  {
    if (!isset($_SESSION['CART'][$id])) {
      $_SESSION['CART'][$id] = [
        'id' => $article->id,
        'name' => $article->name,
        'price' => $article->price,
        'stock' => $article->stock
      ];

      $_SESSION['CART'][$id]['quantity'] = 1;
    } else {
      $_SESSION['CART'][$id]['quantity']++;
    }
  }

  public function removeArticleFromSESSION($id, $article)
  {
    if ($_SESSION['CART'][$id]['quantity'] <= 1) {
      unset($_SESSION['CART'][$id]);
    } else {
      $_SESSION['CART'][$id]['quantity']--;
    }
  }

  public function addToStock($article)
  {
    $updatedStock = $article->stock - 1;
    $this->setStock($updatedStock, $article->id);
  }

  public function removeFromStock($article)
  {
    $updatedStock = $article->stock + 1;
    $this->setStock($updatedStock, $article->id);
  }

  public function setStock($updatedStock, $id)
  {
    try {
      $statement = $this->connection->getConnection()->prepare("UPDATE articles SET stock = :updatedStock WHERE id = :id");
      $statement->execute(['updatedStock' => $updatedStock, 'id' => $id]);
    } catch (\Exception $e) {
      throw new \Exception($e->getMessage());
    }
  }

  function purchasedList()
  {
    $content = array();

    foreach ($_SESSION['CART'] as $article) {
      ob_start();
      if ($article['stock'] >= 1) {
        $shop_form = $this->purchase_form($article['id'], $article['stock']);
      }
      require('templates/cart_item.php');
      $item = ob_get_clean();
      array_push($content, $item);
    }

    return $content;
  }

  public function purchase_form($id, $stock)
  {
    ob_start(); ?>
    <form action="index.php?action=addToCart&id=<?= urlencode($id) ?>" method="post">
      <input type="hidden" name="id" value="<?= $id ?>" />
      <button type="submit" aria-label="Ajouter au panier">🛒</button>
    </form>
    <?php $content = ob_get_clean();
    return $content;
  }
}