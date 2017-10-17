<?php

class Connection {

  public $from;
  public $to;
  public $duration;
  public $arrival;
  public $departure;

  public function __construct($connection) {
    $this->from = $connection->from->station->name;
    $this->to = $connection->to->station->name;
    $this->duration = $connection->duration;
    $this->arrival = $connection->to->arrival;
    $this->departure = $connection->from->departure;
  }

  public function getFrom() {
    return $this->from;
  }

  public function getTo() {
    return $this->to;
  }

  public function getDuration() {
    return $this->duration;
  }

}

 ?>
