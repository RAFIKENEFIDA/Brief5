<?php


class ControllerPage_reservation
{
    private $date_entre;
    private $date_sortie;
    private $type_local;
    private $type_chambre;
    private $vue_chambre_simple;
    private $vue_chambre_double;
    private $pension;
    private $pension_demi;
    private $nombre_enfans;
    private $ages_enfants;
    private $services_enfants;



    public function __construct()
    {
        $this->index();
    }
    public function index()
    {

        $view = new View("Page_reservation");
        $view->generateSimple();
    }

    public function prend_reservation()
    {

        if (isset($_POST['submit'])) {

            echo     $this->date_entre = $_POST['date_entrer'] ?? null;
            echo     $this->date_sortie = $_POST['date_sortie'] ?? null;
            echo     $this->type_local = $_POST['localSelected'] ?? null;
            echo     $this->type_chambre = $_POST['chambre_selected'] ?? null;
            echo     $this->vue_chambre_simple = $_POST['vue_selected_chambre_simple'] ?? null;
            echo     $this->vue_chambre_double = $_POST['selected_vue_double'] ?? null;
            echo     $this->pension = $_POST['pensionSelected'] ?? null;
            echo     $this->pension_demi = $_POST['selected_type_pension_demi'] ?? null;
            echo     $this->nombre_enfans = $_POST['nombreEnfants'] ?? null;

            if()


            $data = array(
                'nbr_enfants' => $this->nombre_enfans,
                'date_entrer' => $this->date_entre,
                'date_sortie' => $this->date_sortie,
            );
            $result = Reservation::insert_table_reservation($data);


            for ($i = 0; $i < $this->nombre_enfans; $i++) {
                $age[$i] = $_POST['enfants' . $i] ?? null;
                $service[$i] = $_POST['service' . $i] ?? null;
            }
            if ($age) {
                echo var_dump($age);
            }
            if ($service) {
                echo var_dump($service);
            }
            echo var_dump($data);


            // Redirect::to('Page_reservation');
        }
    }
}