<?php
function getAverageRating($id)
{
  try {
    $mysqlClient = new PDO('mysql:host=localhost;dbname=my_ecommerce;charset=utf8', 'root', 'root');
  } catch (Exception $e) {
    throw new Exception('Erreur : ' . $e->getMessage());
  }

  $sqlQuery = "SELECT AVG(rate) AS rate FROM comments WHERE article_id = :id";
  $statement = $mysqlClient->prepare($sqlQuery);
  $statement->execute([
    'id' => $id,
  ]);
  $result = $statement->fetch();
  return $result['rate'];
}

function rating($int)
{
  if ($int < 0 || $int > 5) {
    return '<span>note indisponible</span>';
  } else if ($int < 0.5) {
    return '<span>⚪⚪⚪⚪⚪</span>';
  } else if ($int < 1.5) {
    return '<span>🟠⚪⚪⚪⚪</span>';
  } else if ($int < 2.5) {
    return '<span>🟠🟠⚪⚪⚪</span>';
  } else if ($int < 3.5) {
    return '<span>🟡🟡🟡⚪⚪</span>';
  } else if ($int < 4.5) {
    return '<span>🟢🟢🟢🟢⚪</span>';
  } else {
    return '<span>🟢🟢🟢🟢🟢</span>';
  }
}

function purchase_form($id, $int)
{
  if ($int >= 1) {
    ob_start(); ?>
    <form action="index.php?action=addToCart&id=<?= urlencode($id) ?>" method="post">
      <input type="hidden" name="id" value="<?= $id ?>" />
      <button type="submit" aria-label="Ajouter au panier">🛒</button>
    </form>
    <?php $content = ob_get_clean();
    return $content;
  }
}

function getArticle($id)
{
  try {
    $mysqlClient = new PDO('mysql:host=localhost;dbname=my_ecommerce;charset=utf8', 'root', 'root');
  } catch (Exception $e) {
    throw new Exception($e->getMessage());
  }

  $sqlQuery = 'SELECT * FROM articles WHERE id = :id';
  $statement = $mysqlClient->prepare($sqlQuery);
  $statement->execute([
    'id' => $id,
  ]);
  $result = $statement->fetch();
  return $result;
}

function setStock($updatedStock, $id)
{
  try {
    $mysqlClient = new PDO('mysql:host=localhost;dbname=my_ecommerce;charset=utf8', 'root', 'root');
  } catch (Exception $e) {
    throw new Exception($e->getMessage());
  }

  try {
    $sqlQuery = 'UPDATE articles SET stock = :updatedStock WHERE id = :id';
    $statement = $mysqlClient->prepare($sqlQuery);
    $statement->execute([
      'updatedStock' => $updatedStock,
      'id' => $id,
    ]);
  } catch (Exception $e) {
    throw new Exception($e->getMessage());
  }
}