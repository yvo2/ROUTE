<?php

require_once '../repository/ConnectionRepository.php';
require_once '../repository/UserRepository.php';

class DefaultController {
    public function index() {
        $connectionRepository = new ConnectionRepository();
        $userRepository = new UserRepository();

        @$homebase = $_POST["rt-homebase"];
        $via = array();
        @$via[] = $_POST["rt-via0"];
        @$via[] = $_POST["rt-via1"];
        @$via[] = $_POST["rt-via2"];
        @$via[] = $_POST["rt-via3"];
        @$via[] = $_POST["rt-via4"];

        $view = new View('default_index');
        $view->title = 'Finden';
        $view->heading = 'ROUTE';
        $view->user = $userRepository->readById(1);
        $view->homebase = $homebase;
        $view->via = $via;
        $view->connectionResponse = $connectionRepository->getConnectionResult($homebase, $via);

        $view->display();
    }
}
