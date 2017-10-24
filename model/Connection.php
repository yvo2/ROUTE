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

  public function getDurationFormatted() {
    $timeString = explode('d', $this->getDuration())[1];
    $times = explode(':', $timeString);
    $hours = intval($times[0]);
    $minutes = intval($times[1]);

    return "Diese Reise dauert $hours Stunden und $minutes Minuten";
  }

  /**
   * Get a comma-seperated list of all vias
   * @return string comma-seperated
   */
  public function getVias() {
    $result = "";

    //$trainChanges = array_pop($this->sections);
    $trainChanges = $this->sections;
    unset($trainChanges[count($trainChanges)-1]);

    foreach ($trainChanges as $section) {
      $result .= $section->arrival->station->name . ", ";
    }

    return substr($result, 0, -2);
  }

  /**
   * Get a link to the detail page of this connection
   * @return string link to page
   */
   public function getDetailLink() {
     $vias = urlencode($this->getVias());
     $duration = urlencode($this->getDuration());
     $home = urlencode($this->getFrom());

     $link = "/Route/detail";
     $params = "?route=$home:$vias";
     $params .= "&duration=$duration";

     return $link . $params;
   }

}

 ?>
