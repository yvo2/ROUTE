<?php

$config = require('config/config.php');

/**
 * This repository does not access a database.
 * Instead, it directly connects to the opendata endpoint
 * And parses it's result to a usable format
 */
class ConnectionRepository {

  /**
   * This connects to the endpoint and gets a result for the provided data
   *
   * @param from Locaton where to start
   * @param vias Array of Locations to visit
   */
  public function getConnectionsResult($from, $vias) {
    
  }

}

 ?>
