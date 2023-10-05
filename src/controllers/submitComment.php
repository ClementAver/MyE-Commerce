<?php

require_once 'src/model.php';
require_once 'src/models/submitComment.php';

function submitComment($post)
{
  $formDatas = [
    'user_id' => $post['author_id'],
    'article_id' => $post['article_id'],
    'comment' => $post['comment'],
    'rate' => $post['rate'],
  ];

  $validation = checkCommentInputs($formDatas);
  if ($validation['comment'] && $validation['rate']) {
    setComment($formDatas);
    header('Location: index.php?action=comments&id=' . urlencode($post['article_id']));
  } else {
    header('Location: index.php?action=comments&id=' . urlencode($post['article_id']) . '&comment=' . $validation['comment'] . '&rate=' . $validation['rate']);

  }
}