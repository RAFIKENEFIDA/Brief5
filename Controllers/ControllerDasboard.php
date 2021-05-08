<?php



class ControllerDasboard
{

    public function __construct()
    {
        $this->index();
    }
    public function index()
    {

        $view = new View("Dasboard");
        $view->generateSimple();
    }
}