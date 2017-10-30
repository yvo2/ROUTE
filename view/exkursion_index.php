<section class="searchcontainer">
  <div class="container no-limits">
    <?php

    if (count($exkursionen) == 0) {
      ?>
        <h4>Keine bewerteten Exkursionen gefunden. Versuche es später erneut! :C</h4>
      <?php
    }

    foreach ($exkursionen as $exkursion) {
      ?>
      <a href="/Route/detail?route=<?= $exkursion->route ?>">
        <div class="card">
          <p class="cardtext">Homebase: <?= explode(':', $exkursion->route)[0]; ?><br></p>
          <p class="cardtext">Umsteigeorte: <?= explode(':', $exkursion->route)[1]; ?></p>
        </div>
      </a>
      <?php
    }
    ?>
  </div>
</section>
