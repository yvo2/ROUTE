<?php

require_once '../repository/ConnectionRepository.php';

class DefaultController
{
    public function index()
    {

        $connectionRepository = new ConnectionRepository();

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
        $view->homebase = $homebase;
        $view->via = $via;
        $view->connectionResponse = $connectionRepository->getConnectionResult($homebase, $via);

        $view->display();
    }
}
