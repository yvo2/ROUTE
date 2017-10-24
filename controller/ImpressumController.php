<?php
require_once '../lib/Controller.php';

class ImpressumController extends Controller {
  public function index() {
    $view = new View('impressum');
    $view->title = "Impressum";
    $view->user = $this->getUser();
    $view->display();
  }
}

 ?>
