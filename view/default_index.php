<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading">ROUTE</h1>
    <p class="lead text-muted">Finde deine Exkursion!</p>
    <form method="post" class="rt-search">
      <label class="text-muted" for="rt-homebase">Homebase: </label><input value="<?= $homebase ?>" placeholder="z.B. Bern" class="form-control" id="rt-homebase" name="rt-homebase" type="text"><br>
      <label class="text-muted" for="rt-via0">Welche Destinationen möchtest du besuchen? </label><input value="<?= $via[0] ?>" placeholder="z.B. Locarno" class="form-control viainput" id="rt-via0" name="rt-via0" type="text" onfocus="focusEvent(0)" onblur="blurEvent(0)">
      <input value="<?= $via[1] ?>" placeholder="Weitere Destination..." class="form-control viainput" id="rt-via1" name="rt-via1" type="text" onfocus="focusEvent(1)" onblur="blurEvent(1)">
      <input value="<?= $via[2] ?>" placeholder="Weitere Destination..." class="form-control viainput" id="rt-via2" name="rt-via2" type="text" onfocus="focusEvent(2)" onblur="blurEvent(2)">
      <input value="<?= $via[3] ?>" placeholder="Weitere Destination..." class="form-control viainput" id="rt-via3" name="rt-via3" type="text" onfocus="focusEvent(3)" onblur="blurEvent(3)">
      <input value="<?= $via[4] ?>" placeholder="Weitere Destination..." class="form-control viainput" id="rt-via4" name="rt-via4" type="text" onfocus="focusEvent(4)" onblur="blurEvent(4)">
      <button class="btn btn-primary rt-btn stretch" id="mainbutton" type="submit"><i class="fa fa-subway" aria-hidden="true" onmouseover="onSearchButtonMouseOver()" onmouseout="onSearchButtonMouseOut()"></i></button>
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
            <a class="no-hover" href="<?= $connection->getDetailLink() ?>">
              <div class="card">
                <p class="cardtext">Abfahrt Home: <?= $connection->from . ", ab " . $connection->getDepartureFormatted() ?></p>
                <p class="cardtext">Umsteigeorte: <?= $connection->getVias() ?></p>
                <p class="cardtext">Ankunft Home: <?= $connection->getArrivalFormatted() ?></p>
                <p class="cardtext"><?= $connection->getConnectionDuration() ?></p>
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
