<?php

class Dasboard
{



    static function SelectIdReservation()
    {

        $client = $_SESSION['id'];
        if ($_SESSION['id_role'] == 0) {
            $select = DB::connect()->prepare("SELECT id_reservation FROM reservation WHERE id_client='$client'");
        } else {
            $select = DB::connect()->prepare("SELECT id_reservation FROM reservation ");
        }
        $select->execute();
        return $select;
    }
    static function SelectTableAssociatif($id_reservation)
    {
        $req = DB::connect()->prepare("SELECT id_pension,id_bien FROM associatif WHERE id_reservation='$id_reservation'");
        $req->execute() or die('SQL');
        $select = $req->fetch();
        return $select;
    }



    static function SelectTableReservation($id_reservation, $id_bien, $id_pension)
    {
        $req = DB::connect()->prepare("SELECT reservation.nbr_enfants,date_entrer,date_sortie,prix_reservation,bien.local,type_chambre_double,type_vue,pension.type_pension FROM reservation,bien,pension WHERE reservation.id_reservation='$id_reservation' and bien.id_bien='$id_bien' and pension.id_pension='$id_pension'");
        $req->execute() or die('SQL');
        $bien = $req->fetch();
        return $bien;
    }
    static function DeletReservation($id_reservation)
    {
        $req = DB::connect()->prepare("DELETE FROM associatif WHERE id_reservation='$id_reservation'");
        $req->execute() or die('SQL');
        $req = DB::connect()->prepare("DELETE FROM reservation WHERE id_reservation='$id_reservation'");
        $req->execute() or die('SQL');
    }
}