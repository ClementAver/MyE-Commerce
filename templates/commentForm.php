<h2>Rédiger un commentaire</h2>
<form class="form" action="index.php?action=submitComment&id=<?= urlencode($id) ?>" method="post">
  <input name="author_id" type="hidden" value=<?= $_COOKIE['LOGGED_USER'] ?> />
  <input name="article_id" type="hidden" value=<?= $id ?> />
  <div> <label for="comment">Commentaire</label>
    <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
    <span <?php if (!$validation['comment']) {
      echo 'class="invalid"';
    } else {
      echo 'style="display: none"';
    }
    ?>>Ajoutez un
      commentaire.</span>
  </div>
  <div>
    <label for="rate">Note</label>
    <!-- <input type="number" min="0" max="5" step="1" name="rate" id="rate" /> -->
    <select name="rate" id="rate">
      <option value="">Choisir une note</option>
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>

    </select>
    <span <?php if (!$validation['rate']) {
      echo 'class="invalid"';
    } else {
      echo 'style="display: none"';
    }
    ?>>Note non
      renseignée.</span>
  </div>
  <button type="submit">Poster</button>
</form>