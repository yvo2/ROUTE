<?php

class Connection {

  public $from;
  public $to;
  public $duration;
  public $arrival;
  public $departure;
  public $sections = array();

  public function __construct($connection) {
    $this->from = $connection->from->station->name;
    $this->to = $connection->to->station->name;
    $this->duration = $connection->duration;
    $this->arrival = $connection->to->arrival;
    $this->departure = $connection->from->departure;

    foreach ($connection->sections as $section) {
      $this->sections[] = $section;
    }
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

  /**
   * Get a comma-seperated list of all vias
   * @return string comma-seperated
   */
  public function getVias() {
    $result = "";

    foreach ($this->sections as $section) {
      $result .= $section->arrival->station->name . ", ";
    }

    return substr($result, 0, -2);
  }

}

 ?>
