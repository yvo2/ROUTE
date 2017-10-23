<?php

require_once '../repository/ConnectionRepository.php';
require_once '../lib/Controller.php';

class DefaultController extends Controller {
    public function index() {
        $connectionRepository = new ConnectionRepository();

        @$homebase = htmlspecialchars($_POST["rt-homebase"]);
        $via = array();
        @$via[] = htmlspecialchars($_POST["rt-via0"]);
        @$via[] = htmlspecialchars($_POST["rt-via1"]);
        @$via[] = htmlspecialchars($_POST["rt-via2"]);
        @$via[] = htmlspecialchars($_POST["rt-via3"]);
        @$via[] = htmlspecialchars($_POST["rt-via4"]);

        $view = new View('default_index');
        $view->title = 'Finden';
        $view->heading = 'ROUTE';
        $view->user = $this->getUser();
        $view->homebase = $homebase;
        $view->via = $via;
        $view->connectionResponse = $connectionRepository->getConnectionResult($homebase, $via);

        $view->display();
    }
}
