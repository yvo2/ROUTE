<h5>Kommentar löschen</h5>
<form action="/Comment/doDelete" method="post">
  <div class="comment" name="rt-comment" rows="8"><?= str_replace("\n", "<br>", $comment->bewertung) ?></div>
  <input type="hidden" value="<?= $comment->id ?>" name="rt-id">
    <br><h6>Bist du dir sicher?</h6>
  <input class="btn btn-primary rt-btn" type="submit" value="Ja, löschen.">
  <a class="btn btn-secondary rt-btn-margin" href="/Exkursion">Nein, zurück zur Ansicht</a>
</form>
