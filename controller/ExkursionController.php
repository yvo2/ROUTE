<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../repository/CommentRepository.php';

class ExkursionController extends Controller {

  public function index() {
    $commentRepository = new CommentRepository();

    $view = new View('exkursion_index');
    $view->title = "Exkursion";
    $view->user = $this->getUser();
    $view->exkursionen = $commentRepository->readAll();
    $view->display();
  }
}

 ?>
