<?php

require_once '../model/Connection.php';

/**
 * This entity holds information about multiple connections.
 */
class ConnectionResponse {

  public $connections = array();

  public function __construct($connections) {
    foreach ($connections->connections as $connection) {
      $this->connections[] = new Connection($connection);
    }
  }

  /**
   * @return bool true if there are any connections available, false otherwise
   */
  public function hasConnections() {
    return count($this->connections) != 0;
  }

  /**
   * @return array Array of available Connections
   */
  public function getConnections() {
    return $this->connections;
  }

}

 ?>
