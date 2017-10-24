<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading">ROUTE</h1>
    <p class="lead text-muted">Finde deine Exkursion!</p>
    <form method="post" class="rt-search">
      <label class="text-muted" for="rt-homebase">Homebase: </label><input value="<?= $homebase ?>" placeholder="z.B. Bern" class="form-control" id="rt-homebase" name="rt-homebase" type="text"><br>
      <label class="text-muted" for="rt-via">Welche Destinationen möchtest du besuchen? </label><input value="<?= $via[0] ?>" placeholder="z.B. Locarno" class="form-control" id="rt-via0" name="rt-via0" type="text"><br>
      <input value="<?= $via[1] ?>" placeholder="Weitere Destination..." class="form-control" id="rt-via1" name="rt-via1" type="text"><br>
      <input value="<?= $via[2] ?>" placeholder="Weitere Destination..." class="form-control" id="rt-via2" name="rt-via2" type="text"><br>
      <input value="<?= $via[3] ?>" placeholder="Weitere Destination..." class="form-control" id="rt-via3" name="rt-via3" type="text"><br>
      <input value="<?= $via[4] ?>" placeholder="Weitere Destination..." class="form-control" id="rt-via4" name="rt-via4" type="text"><br>
      <input class="btn btn-primary"type="submit" value="Los gehts!">
    </form>
  </div>
</section>

<div class="row">
  <div class="rt-results">
    <?php
      if (strlen($homebase) != 0 && count($via) != 0) {
        ?>
          <div class="rt-text"> Von <?= $homebase ?> nach <?= $via[0] ?> und zurück nach <?= $homebase ?>. </div>
          <hr>
        <?php
        if (!$connectionResponse->hasConnections()) {
          echo 'Keine Verbindung verfügbar :(';
        } else {
          foreach ($connectionResponse->getConnections() as $connection) {
            ?>
            <a href="<?= $connection->getDetailLink() ?>">
              <div class="card">
              <p class="cardtext"><?= $connection->getDurationFormatted() ?><br></p>
              <p class="cardtext">Homebase: <?= $connection->from ?><br></p>
              <p class="cardtext">Umsteigeorte: <?= $connection->getVias() ?></p>
              </div>
            </a>


            <?php
          }
        }
      } else {
        ?>
          <div class="rt-errortext">Bitte fülle die erforderlichen Textfelder aus</div>
        <?php
      }
     ?>

  </div>
</div>
