<?php

class ControllerLogin
{

    public function __construct()
    {
        $this->index();
    }
    public function index()
    {

        $view = new View("Login");
        $view->generateSimple();
    }

    static public function auth()
    {
        session_start();
        if (isset($_POST["submit"])) {
            $data['email'] = $_POST["email"];
            $result = User::login($data);

            if ($_POST['email'] === $result['email'] && $_POST['password'] === $result['password_user']) {

                $_SESSION['id'] = $result['id_user'];
                $_SESSION['id_role'] = $result['id_role'];
            }


            if (isset($_SESSION['id'])) {
                Redirect::to('Dasboard');
            } else {

                Redirect::to('Login');
            }
        }
    }
}