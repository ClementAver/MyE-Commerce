<?php

require_once 'src/model.php';
require_once 'src/models/gallery.php';

function gallery()
{
  $articles = getAllArticles();
  require_once 'templates/gallery.php';

}