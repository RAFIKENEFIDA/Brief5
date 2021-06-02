<?php

session_start();

class ControllerDasboard

{

    public function __construct()
    {
        $this->index();
    }
    public function index()
    {

        if (empty($_SESSION['id'])) {
            header('Location:login');
        }

        $view = new View("Dasboard");
        $view->generateSimple();
    }
    static public function logout()
    {

        unset($_SESSION['id']);
        header("location:login");
    }

    static public function selectReservation()
    {

        $table_reservation = Dasboard::SelectIdReservation();
        if (isset($table_reservation)) {

            $i = 0;
            while ($data = $table_reservation->fetch()) {

                $id_reservation[$i] = $data['id_reservation'];

                $table_associatif = Dasboard::SelectTableAssociatif($id_reservation[$i]);
                $id_pension = $table_associatif['id_pension'];
                $id_bien = $table_associatif['id_bien'];
                $reservation = Dasboard::SelectTableReservation($id_reservation[$i], $id_bien, $id_pension);
                $store[$i] = $reservation;
                $i++;
            }
        } else {
            $store = NULL;
        }



        return $store;
    }
}