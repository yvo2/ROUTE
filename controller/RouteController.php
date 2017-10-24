<?php
require_once '../lib/Controller.php';
require_once '../repository/CommentRepository.php';

class RouteController extends Controller {

  public function detail() {
    $commentRepository = new CommentRepository();
    @$route = htmlspecialchars($_GET["route"]);
    @$duration = htmlspecialchars($_GET["duration"]);
    $home = explode(':', $route)[0];
    $vias = explode(':', $route)[1];

    $route = urlencode($home . ':' . $vias);

    $view = new View('route_detail');
    $view->user = $this->getUser();
    $view->title = 'Details';
    $view->via = $vias;
    $view->duration = $duration;
    $view->homebase = $home;
    $view->route = $route;

    $view->comments = $commentRepository->getByRoute(urldecode($route));

    $view->display();
  }

  public function create() {

    if (!$this->getUser()->signedIn) {
      die('Please <a href="/User/login">Sign in</a>');
    }

    @$comment = htmlspecialchars($_POST["rt-comment"]);
    @$route = htmlspecialchars($_POST["rt-route"]);
    $commentRepository = new CommentRepository();
    $commentRepository->create(urldecode($route), $comment, $this->getUser()->id);

    $home = explode(':', $route)[0];
    $vias = explode(':', $route)[1];

    header("Location: /Route/detail?route=$home:$vias");
  }

}

 ?>
