<h5>Kommentar bearbeiten</h5>
<form action="/Comment/edit" method="post">
  <textarea class="form-control" name="rt-comment" rows="8" id="edittext" onchange="cmdeditCheck()"><?= $comment->bewertung ?></textarea>
  <input type="hidden" value="<?= $comment->id ?>" name="rt-id">
  <div class="rt-validation" id="editerrortext"><?= $commentValidationError ?></div>
  <input class="btn btn-primary rt-btn" type="submit">
  <a class="btn btn-secondary rt-btn-margin" href="/Exkursion">Zurück zur Ansicht</a>
</form>
