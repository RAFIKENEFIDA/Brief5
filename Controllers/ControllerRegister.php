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
                'password' => $_POST['password'],
                'password_repaet' => $_POST['repeat_password'],

            );


            $email = User::FindEmail($_POST['email
            ']);
            if ($email == NULL && $_POST['repeat_password'] == $_POST['password']) {
                $result = User::insertUser($data);
                if ($result === 'ok') {

                    Redirect::to('login');
                }
            }
        }
    }
}