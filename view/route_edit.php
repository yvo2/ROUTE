<h5>Kommentar bearbeiten</h5>
<form action="/Comment/doEdit" method="post">
  <textarea class="form-control" name="rt-comment" rows="8"><?= $comment->bewertung ?></textarea>
  <input type="hidden" value="<?= $comment->id ?>" name="rt-id">
  <input class="btn btn-primary rt-btn" type="submit">
  <a class="btn btn-secondary rt-btn-margin" href="/Exkursion">Zurück zur Ansicht</a>
</form>
