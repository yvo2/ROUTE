<?php
session_start();

require_once 'lib/Dispatcher.php';
require_once 'lib/View.php';

require_once 'controller/DefaultController.php';

$dispatcher = new Dispatcher();
$dispatcher->dispatch();
