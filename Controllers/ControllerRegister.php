<?php



class ControllerRegister
{

    public function __construct()
    {
        $this->index();
    }
    public function index()
    {

        $view = new View("Register");
        $view->generateSimple();
    }

    static  public function register()
    {


        if (isset($_POST['submit'])) {


            $data = array(

                'first_Name' => $_POST['first_Name'],
                'last_Name' => $_POST['last_Name'],
                'email' => $_POST['email'],
                'password' => $_POST['repeat_password'],

            );



            $result = User::insertUser($data);
            if ($result === 'ok') {
                Session::set('sucess', 'Compte crée');
                Redirect::to('login');
            } else {
                echo $result;
            }
        }
    }
}