<?php

require_once '../lib/SessionManager.php';

class Controller {

  public $sessionManager;
  public $user;

  public function __construct() {
    $this->sessionManager = new SessionManager();
    $this->user = $this->sessionManager->getUser();
  }

  public function getUser() {
    return $this->user;
  }

}

 ?>
