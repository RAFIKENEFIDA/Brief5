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

                Session::set('success', '');
                Redirect::to('Dasboard');
            } else {
                Session::set('erro', 'mot de passe est incorrect');
                Redirect::to('Login');
            }
        }
    }

    static public function logout()
    {
        session_start();
        unset($_SESSION['id']);

        Redirect::to('Login');
    }
}