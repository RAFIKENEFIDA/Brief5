<?php

require_once "views/view.php";


class Router
{
    private $view;

    public function routeReq()
    {


        try {
            spl_autoload_register(function ($class) {
                $path = "models/" . $class . ".php";
                if (file_exists($path)) {
                    require_once "$path";
                } else {
                    $path = "app/" . $class . ".php";
                    require_once "$path";
                }
            });
            $url = "";

            if (isset($_GET["param"])) {

                $url = explode("/", filter_var($_GET["param"]), FILTER_SANITIZE_URL);

                $controllerClass = "Controller" . ucfirst(strtolower($url[0]));


                $controllerFile = "Controllers/$controllerClass.php";
                if (file_exists($controllerFile)) {
                    require_once "$controllerFile";
                    $obj = new $controllerClass();

                    if (isset($url[1]) & !empty($url[1])) {
                        if (method_exists($obj, $url[1])) {
                            $action = $url[1];

                            if (isset($url[2]) & !empty($url[2])) {
                                $obj->$action($url[2]);
                            } else {
                                $obj->$action();
                            }
                        } else {
                            http_response_code(404);
                            echo "this method doesn't exist";
                        }
                    } else {
                        $action = "index";
                        $obj->$action();
                    }
                } else {
                    require_once "Controllers/ControllerAcceuil.php";
                }
            }
        } catch (\Exception $e) {
            $erroMsg = $e->getMessage();
            require_once('views/viewAcceuil.php');
        }
    }
}