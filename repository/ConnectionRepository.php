<?php

require_once '../model/ConnectionResponse.php';
require_once '../config/config.php';

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
   * @return ConnectionResponse Object
   */
  public function getConnectionResult($from, $vias) {
    global $config;
    $connections = file_get_contents($config["endpoint_url"].'?from='.$from.'&to='.$from.'&via='.$vias);
    $parsedConnections = json_decode($connections);
    return new ConnectionResponse($parsedConnections);
  }

}

 ?>
