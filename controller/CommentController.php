<?php
require_once '../repository/CommentRepository.php';
require_once '../lib/Controller.php';

class CommentController extends Controller {

  public function edit() {
    if (!$this->getUser()->signedIn) {
      die('Please <a href="/User/login">Sign in</a>');
    }

    $view = new View('route_edit');
    $view->valid = true;
    $view->user = $this->getUser();
    $view->title = "Bearbeiten";
    $view->commentValidationError = "";
    $id = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      @$id = $_POST["rt-id"];
      if (!isset($id) || empty($id)) {
        die("Keine ID gefunden.");
      }

      $commentRepository = new CommentRepository();
      $bewertung = htmlspecialchars($_POST["rt-comment"]);
      if (!isset($bewertung) || empty($bewertung)) {
        $view->commentValidationError = "Bitte gib einen Kommentar ein.";
        $view->valid = false;
      }

      if (strlen($bewertung) <= 3) {
        $view->commentValidationError = "Bitte gib einen Kommentar ein, der länger als 3 Zeichen ist.";
        $view->valid = false;
      }

      $comment = $commentRepository->readById($id);

      if ($this->getUser()->id != $comment->userId) {
        die("Lacking permission. <a href='/'>Zurück</a>");
      }

      if ($view->valid) {
        $commentRepository->update($id, $bewertung);
        header("Location: /Route/detail?route=$comment->route");
        die();
      }

    } else {

      @$id = $_GET["id"];
      if (!isset($id) || empty($id)) {
        die("Keine ID gefunden.");
      }
    }

    $commentRepository = new CommentRepository();
    if (!$this->getUser()->signedIn) {
      die('Please <a href="/User/login">Sign in</a>');
    }

    $comment = $commentRepository->readById($id);

    if ($this->getUser()->id != $comment->userId) {
      die('Lacking permission. <a href="/Exkursion">Back</a>');
    }
    $view->comment = $comment;
    $view->display();
  }

  public function delete() {
    @$id = $_GET["id"];
    if (!isset($id) || empty($id)) {
      die("Keine ID gefunden.");
    }

    $commentRepository = new CommentRepository();
    if (!$this->getUser()->signedIn) {
      die('Please <a href="/User/login">Sign in</a>');
    }

    $comment = $commentRepository->readById($id);

    if ($this->getUser()->id != $comment->userId) {
      die('Lacking permission. <a href="/Exkursion">Back</a>');
    }

    $view = new View('route_delete');
    $view->comment = $comment;
    $view->user = $this->getUser();
    $view->title = "Löschen";
    $view->display();
  }

  public function doDelete() {
    if (!$this->getUser()->signedIn) {
      die('Please <a href="/User/login">Sign in</a>');
    }

    $commentRepository = new CommentRepository();
    @$id = $_POST["rt-id"];
    if (!isset($id) || empty($id)) {
      die("Keine ID gefunden.");
    }

    $comment = $commentRepository->readById($id);

    if ($this->getUser()->id != $comment->userId) {
      die("Lacking permission. <a href='/'>Zurück</a>");
    }

    $commentRepository->delete($id);

    header("Location: /Route/detail?route=$comment->route");
  }

}

 ?>
