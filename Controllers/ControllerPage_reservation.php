<?php
session_start();
class ControllerPage_reservation
{
    private $date_entre;
    private $date_sortie;
    private $type_local;
    private $type_chambre;
    private $type_chambre_double;
    private $vue_chambre_simple;
    private $vue_chambre_double;
    private $pension;
    private $nombre_enfans;
    private $ages_enfants;
    private $services_enfants;

    public function __construct()
    {
        $this->index();
    }
    public function index()
    {

        if (empty($_SESSION['id'])) {
            header('Location:login');
        }

        $view = new View("Page_reservation");
        $view->generateSimple();
    }

    public function prend_reservation()
    {

        $this->date_entre = $_POST['date_entrer'] ?? null;
        $this->date_sortie = $_POST['date_sortie'] ?? null;
        $this->type_local = $_POST['localSelected'] ?? null;
        $this->type_chambre = $_POST['chambre_selected'] ?? null;
        $this->type_chambre_double = $_POST['chambre_double_selected'] ?? null;
        $this->vue_chambre_simple = $_POST['vue_selected_chambre_simple'] ?? null;
        $this->vue_chambre_double = $_POST['selected_vue_double'] ?? null;
        $this->pension = $_POST['pensionSelected'] ?? null;
        $this->nombre_enfans = $_POST['nombreEnfants'] ?? null;


        // recuperer les ages et les services des enfants pur inserer au tableaux des enfants
        $nombre_enfant = $this->nombre_enfans;

        for ($i = 0; $i < $this->nombre_enfans; $i++) {

            $ages[$i] = (int) $_POST['enfants' . $i] ?? null;
            $service[$i] = $_POST['service' . $i] ?? null;

            switch ($service[$i]) {
                case 'supp':
                    $id[$i] = 0;
                    break;
                case 'sans':
                    $id[$i] = 4;
                    break;
                case 'chambre simple':
                    $id[$i] = 2;
                    break;
                case 'supp adulte':
                    $id[$i] = 3;
                    break;
            }
            if (2 < $ages[$i]  && $ages[$i] < 14) {
                $id[$i] = 1;
            }
        }

        // recupere les infos pour remplire le tableau du reservation

        $data = array(
            'nbr_enfants' => $this->nombre_enfans,
            'date_entrer' => $this->date_entre,
            'date_sortie' => $this->date_sortie,
        );

        // recupere le pension et le bien pour rempolir le tableaux associatif

        switch ($this->pension) {
            case 'complete':
                $id_pension = 0;
                break;
            case 'sans':
                $id_pension = 1;
                break;
            case 'dej':
                $id_pension = 2;
                break;
            case 'diner':
                $id_pension = 3;
                break;
        }

        echo var_dump($id_pension);

        switch ($this->type_local) {
            case 'chambre':

                switch ($this->type_chambre) {
                    case 'chambre_simple':

                        switch ($this->vue_chambre_simple) {
                            case 'vueInt':
                                $id_bien = 0;
                                break;
                            case 'vueExt':
                                $id_bien = 1;
                                break;
                        }

                        break;
                    case 'chambre_double':

                        switch ($this->type_chambre_double) {
                            case 'litDouble':


                                switch ($this->vue_chambre_double) {
                                    case 'vueInt':
                                        $id_bien = 2;
                                        break;
                                    case 'vueExt':
                                        $id_bien = 3;
                                        break;
                                }

                                break;
                            case 'litSimple':
                                $id_bien = 4;
                                break;
                        }

                        break;
                }

                break;
            case 'bungalow':
                $id_bien = 5;
                break;
            case 'appartement':
                $id_bien = 6;
                break;
        }

        if (isset($_POST['ajouter'])) {
            $_SESSION["nombre_reservation"]++;
            $_SESSION["reservation_ages" . $_SESSION["nombre_reservation"]] =  $ages;
            $_SESSION["reservation_id" . $_SESSION["nombre_reservation"]] =  $id;
            $_SESSION["reservation_nombre_enfant" . $_SESSION["nombre_reservation"]] = $nombre_enfant;
            $_SESSION["reservation_data" . $_SESSION["nombre_reservation"]] =  $data;
            $_SESSION["reservation_id_bien" . $_SESSION["nombre_reservation"]] = $id_bien;
            $_SESSION["reservation_id_pension" . $_SESSION["nombre_reservation"]] = $id_pension;

            echo var_dump($_SESSION["reservation_ages" . $_SESSION["nombre_reservation"]]);
            echo var_dump($_SESSION["reservation_id" . $_SESSION["nombre_reservation"]]);
            echo var_dump($_SESSION["reservation_nombre_enfant" . $_SESSION["nombre_reservation"]]);
            echo var_dump($_SESSION["reservation_data" . $_SESSION["nombre_reservation"]]);
            echo var_dump($_SESSION["reservation_id_bien" . $_SESSION["nombre_reservation"]]);
            echo var_dump($_SESSION["reservation_id_pension" . $_SESSION["nombre_reservation"]]);
        } else {

            $result = Reservation::insertDetailleReservation();
            $result = Reservation::recupererIdR();

            if ($_SESSION["nombre_reservation"] > 0) {

                for ($i = 1; $i <= $_SESSION["nombre_reservation"]; $i++) {

                    $result = Reservation::insert_table_reservation($_SESSION["reservation_data" . $i]);

                    $res = Reservation::insert_table_enfants($_SESSION["reservation_ages" . $i], $_SESSION["reservation_id" . $i], $_SESSION["reservation_nombre_enfant" . $i]);

                    $rese = Reservation::insert_table_associatif($_SESSION["reservation_id_bien" . $i], $_SESSION["reservation_id_pension" . $i]);
                }
            }

            $result = Reservation::insert_table_reservation($data);

            $res = Reservation::insert_table_enfants($ages, $id, $nombre_enfant);

            $rese = Reservation::insert_table_associatif($id_bien, $id_pension);

            $_SESSION["nombre_reservation"] = 0;
            header("location:dasboard");
        }
    }
}