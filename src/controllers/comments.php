<?php

require_once 'src/model.php';
require_once 'src/models/comments.php';

function comments($id)
{
  $comments = getAllComments($id);

  if (!isset($_GET['comment']) && !isset($_GET['rate'])) {
    $validation['comment'] = true;
    $validation['rate'] = true;
  }

  if (isset($_GET['comment']) && isset($_GET['rate'])) {
    $validation['comment'] = boolval($_GET['comment']);
    $validation['rate'] = boolval($_GET['rate']);
  }

  $commentForm = commentForm($id, $validation);
  $article = $comments[0]['name'];
  $averageRating = rating(getAverageRating($id));

  require_once 'templates/comments.php';
}