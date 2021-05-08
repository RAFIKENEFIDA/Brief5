<?php
require_once './views/includes/alerts.php';
require_once "Controllers/Routeur.php";
$router = new Router;
$router->routeReq();