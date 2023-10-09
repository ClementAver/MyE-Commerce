<?php

namespace Models;

use Utils\DatabaseConnection;

class Article
{
  public DatabaseConnection $connection;

  public int $id;
  public string $name;
  public string $desciption;
  public string $seller;
  public string $price;
  public int $stock;

  public function averageRating()
  {
    $statement = $this->connection->getConnection()->prepare("SELECT AVG(rate) AS rate FROM comments WHERE article_id = :id");

    $statement->execute([
      'id' => $this->id,
    ]);
    $result = $statement->fetch();
    return $result['rate'];
  }

  public function stars()
  {
    $rate = floatval($this->averageRating());

    if ($rate < 0 || $rate > 5) {
      return '<span>note indisponible</span>';
    } else if ($rate < 0.5) {
      return '<span>⚪⚪⚪⚪⚪</span>';
    } else if ($rate < 1.5) {
      return '<span>🟠⚪⚪⚪⚪</span>';
    } else if ($rate < 2.5) {
      return '<span>🟠🟠⚪⚪⚪</span>';
    } else if ($rate < 3.5) {
      return '<span>🟡🟡🟡⚪⚪</span>';
    } else if ($rate < 4.5) {
      return '<span>🟢🟢🟢🟢⚪</span>';
    } else {
      return '<span>🟢🟢🟢🟢🟢</span>';
    }
  }

  public function purchase_form()
  {
    if ($this->stock >= 1) {
      ob_start(); ?>
      <form action="index.php?action=addToCart&id=<?= urlencode($this->id) ?>" method="post">
        <input type="hidden" name="id" value="<?= $this->id ?>" />
        <button type="submit" aria-label="Ajouter au panier">🛒</button>
      </form>
      <?php $content = ob_get_clean();
      return $content;
    }
  }
}