<?php

global $config;
// In der Variable $config werden alle Daten in einem Array gespeichert, welche für Benutzer- und Routenhandling wichtg sind.
$config = array(
  "endpoint_url"  => 'http://transport.opendata.ch/v1/connections',

  "database" => array(
    "host"      => 'localhost:3307',
    "username"  => 'root',
    "password"  => '',
    "database"  => 'route-db'
  )
);

 ?>
