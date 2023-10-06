<?php

namespace Controllers;

use \Utils\DatabaseConnection;
use Models\CommentRepository;

class SubmitComment
{
  public function execute($post)
  {

    $commentRepository = new CommentRepository();
    $commentRepository->connection = new DatabaseConnection();

    $formDatas = [
      'user_id' => $post['author_id'],
      'article_id' => $post['article_id'],
      'comment' => $post['comment'],
      'rate' => $post['rate'],
    ];

    $validation = $commentRepository->checkCommentInputs($formDatas);
    if ($validation['comment'] && $validation['rate']) {
      $commentRepository->setComment($formDatas);
      header('Location: index.php?action=comments&id=' . urlencode($post['article_id']));
    } else {
      header('Location: index.php?action=comments&id=' . urlencode($post['article_id']) . '&comment=' . $validation['comment'] . '&rate=' . $validation['rate']);

    }
  }
}