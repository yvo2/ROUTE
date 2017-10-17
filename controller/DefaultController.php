<?php

require_once '../repository/ConnectionRepository.php';

class DefaultController
{
    public function index()
    {

        $connectionRepository = new ConnectionRepository();

        @$homebase = $_POST["rt-homebase"];
        @$via = $_POST["rt-via"];

        $view = new View('default_index');
        $view->title = 'Finden';
        $view->heading = 'ROUTE';
        $view->homebase = $homebase;
        $view->via = $via;
        $view->connectionResponse = $connectionRepository->getConnectionResult($homebase, $via);

        $view->display();
    }
}
