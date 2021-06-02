<?php



class ControllerAcceuil
{

    public function __construct()
    {
        $this->index();
    }
    public function index()
    {


        $view = new View("Acceuil");
        $view->generateSimple();
    }
}