<?php

class Connection {

  public $from;
  public $to;
  public $fromTime;
  public $toTime;
  public $duration;
  public $arrival;
  public $departure;
  public $platformFrom;
  public $platformTo;
  public $sections = array();

  public function __construct($connection) {
    $this->from = $connection->from->station->name;
    $this->to = $connection->to->station->name;
    $this->duration = $connection->duration;
    $this->arrival = $connection->to->arrival;
    $this->departure = $connection->from->departure;
    $this->platformFrom = $connection->sections[0]->departure->platform;
    $this->platformTo = $connection->sections[count($connection->sections)-1]->arrival->platform;

    foreach ($connection->sections as $section) {
      $this->sections[] = $section;
    }
  }

  public function getArrivalFormatted() {
    $dt = new DateTime($this->arrival);
    return $dt->format('H:i');
  }

  public function getDepartureFormatted() {
    $dt = new DateTime($this->departure);
    return $dt->format('H:i');
  }

  public function getFrom() {
    return $this->from;
  }

  public function getTo() {
    return $this->to;
  }

  public function getPlatformFrom() {
    return $this->platformFrom;
  }

  public function getPlatformTo() {
    return $this->platformTo;
  }

  public function getDuration() {
    return $this->duration;
  }

  public function getConnectionDuration() {
    return Connection::getDurationFormatted($this->getDuration());
  }

  public static function getDurationFormatted($duration) {
    $timeString = explode('d', $duration)[1];
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

public function getViasFormatted() {
  $result = "";
  $arrow = ' <i class="fa fa-arrow-right" aria-hidden="true"></i> ';

  //$trainChanges = array_pop($this->sections);
  $trainChanges = $this->sections;
  unset($trainChanges[count($trainChanges)-1]);

  foreach ($trainChanges as $section) {
    $result .= $section->arrival->station->name . $arrow;
  }

  return substr($result, 0, -strlen($arrow));
}

public function getPlatformVia() {
  $result = "";

  //$trainChanges = array_pop($this->sections);
  $trainChanges = $this->sections;
  //unset($trainChanges[count($trainChanges)-1]);
  //unset($trainChanges[0]);

  foreach ($trainChanges as $section) {
    $result .= "Abfahrt: " . $section->departure->platform . " Ankunft: " . $section->arrival->platform . " | ";
  }

  return $result;
}

  /**
   * Get a link to the detail page of this connection
   * @return string link to page
   */
   public function getDetailLink() {
     $vias = urlencode($this->getVias());
     $duration = urlencode($this->getDuration());
     $home = urlencode($this->getFrom());
     $platform = urlencode($this->getPlatformVia());
     $arrival = urlencode($this->getArrivalFormatted());
     $departure = urlencode($this->getDepartureFormatted());

     $link = "/Route/detail";
     $params = "?route=$home:$vias";
     $params .= "&duration=$duration";
     $params .= "&platform=$platform";
     $params .= "&arrival=$arrival";
     $params .= "&departure=$departure";

     return $link . $params;
   }

}

 ?>
