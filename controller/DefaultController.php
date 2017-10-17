<?php

class DefaultController
{
    public function index()
    {
        $view = new View('default_index');
        $view->title = 'Finden';
        $view->heading = 'ROUTE';
        @$view->homebase = $_POST["rt-homebase"];
        @$view->via = $_POST["rt-via"];
        $view->display();
    }
}
