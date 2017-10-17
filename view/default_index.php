<?php
  $config = require('components/config.php');
  require_once('src/Connection.php');
?>

<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading">ROUTE</h1>
    <p class="lead text-muted">Finde eine Exkursion!</p>
    <form method="post" class="rt-search">
      <label class="text-muted" for="rt-homebase">Homebase: </label><input placeholder="z.B. Bern" class="form-control" id="rt-homebase" name="rt-homebase" type="text"><br>
      <label class="text-muted" for="rt-via">Was möchtest du entdecken? </label><input placeholder="z.B. Locarno" class="form-control" id="rt-via" name="rt-via" type="text"><br>
      <input class="btn btn-primary"type="submit" value="Los gehts!">
    </form>
  </div>
</section>

<div class="row">
  <div class="rt-results">
    <?php
      if (strlen($homebase) != 0 && strlen($via) != 0) {
        ?>
          Von <?= $homebase ?> nach <?= $via ?> und zurück.
          <hr>
        <?php

        // Request
        $from = $homebase;
        $to = $homebase;

        $response = file_get_contents($config["endpoint_url"].'?from='.$from.'&to='.$to.'&via='.$via);

        $parsed = json_decode($response);

        if (count($parsed->connections) == 0) {
          echo 'Keine Verbindung verfügbar. :(';
        } else {
          foreach ($parsed->connections as $connection) {
            $connection = new Connection($connection);
            echo('<div class="card">');
            echo("Duration: $connection->duration<br>");
            echo("From: $connection->from<br>");
            echo("To: $connection->to<br>");
            echo('</div>');
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
