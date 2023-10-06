<?php

namespace Models;

class Comment
{
  public string $author;
  public string $comment;
  public string $rate;
  public int $article;

  public function stars()
  {
    $rate = $this->rate;

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
}