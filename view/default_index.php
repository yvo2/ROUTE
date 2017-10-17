<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading">ROUTE</h1>
    <p class="lead text-muted">Finde eine Exkursion!</p>
    <form method="post" class="rt-search">
      <label class="text-muted" for="rt-homebase">Homebase: </label><input value="<?= $homebase ?>" placeholder="z.B. Bern" class="form-control" id="rt-homebase" name="rt-homebase" type="text"><br>
      <label class="text-muted" for="rt-via">Welche Destination möchtest du besuchen? </label><input value="<?= $via ?>" placeholder="z.B. Locarno" class="form-control" id="rt-via" name="rt-via" type="text"><br>
      <input class="btn btn-primary"type="submit" value="Los gehts!">
    </form>
  </div>
</section>

<div class="row">
  <div class="rt-results">
    <?php
      if (strlen($homebase) != 0 && strlen($via) != 0) {
        ?>
          Von <?= $homebase ?> nach <?= $via ?> und zurück nach <?= $homebase ?>.
          <hr>
        <?php
        if (!$connectionResponse->hasConnections()) {
          echo 'Keine Verbindung verfügbar';
        } else {
          foreach ($connectionResponse->getConnections() as $connection) {
            ?>
            <div class="card">
            <p class="cardtext">Dauer: <?= $connection->duration ?><br></p>
            <p class="cardtext">Homebase: <?= $connection->from ?><br></p>
            <p class="cardtext">Umsteigeorte: <?= $connection->getVias() ?></p>
            </div>
            <?php
          }
        }

      } else {
        ?>
          Bitte fülle erst die erforderlichen Textfelder aus.
        <?php
      }
     ?>
  </div>
</div>
