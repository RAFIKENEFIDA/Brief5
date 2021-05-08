<?php

class View
{
    private $file;
    public function __construct($action)
    {
        $this->file = "views/view" . $action . ".php";
    }

    public function generateSimple()
    {
        if (file_exists($this->file)) {
            require_once $this->file;
        } else {
            throw new Exception("view introvable");
        }
    }

    public function generateFileSimple()
    {
        if (file_exists($this->file)) {

            require_once $this->file;
        } else {
            throw new Exception("view introuvable");
        }
    }
}