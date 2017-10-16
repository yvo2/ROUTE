<?php
  $config = require('components/config.php');
  require_once('src/Connection.php');
?>

<div class="rt-results">
  <?php
    if (strlen($homebase) != 0 && strlen($via) != 0) {
      ?>
        Von <?php echo $homebase; ?> nach <?php echo $via; ?> und zurück.
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
          echo("Duration: $connection->duration<br>");
          echo("From: $connection->from<br>");
          echo("To: $connection->to<br>");
          echo('<hr>');
        }
      }

    } else {
      ?>
        Bitte fülle erst die erforderlichen Textfelder aus.
      <?php
    }
   ?>
</div>
