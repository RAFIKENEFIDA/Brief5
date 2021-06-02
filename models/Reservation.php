<?php


class Reservation
{


    static public function insert_table_reservation($data)
    {

        // $stmt = DB::connect()->prepare('SELECT id_R FROM detaille_reservation ORDER BY detaille_reservation.id_R DESC LIMIT 1');
        // $stmt->execute();
        // $row = $stmt->fetch();
        // echo $id_R = $row['id_R'];

        $client = $_SESSION['id'];
        $id_R = $_SESSION['id_R'];

        $strm = DB::connect()->prepare("INSERT INTO reservation(nbr_enfants,date_entrer,date_sortie,id_client,id_R)
         VALUES(:nbr_enfants,:date_entrer,:date_sortie,'$client',:id_R) ");
        $strm->bindParam((':nbr_enfants'), $data['nbr_enfants']);
        $strm->bindParam((':date_entrer'), $data['date_entrer']);
        $strm->bindParam((':date_sortie'), $data['date_sortie']);
        $strm->bindParam((':id_R'), $id_R);


        $strm->execute();
    }
    static public function insert_table_enfants($ages, $id, $nombre_enfant)
    {

        $req1 = DB::connect()->prepare('SELECT id_reservation FROM reservation ORDER BY reservation.id_reservation DESC LIMIT 1');
        $req1->execute();
        $row1 = $req1->fetch();
        echo "table_enfants" . $last_id = $row1['id_reservation'];

        $prix_enfants = 0;

        for ($i = 0; $i < $nombre_enfant; $i++) {
            $age = $ages[$i];
            $x = $id[$i];
            $client = $_SESSION['id'];
            $query = DB::connect()->prepare("INSERT INTO enfants (age,id_client,id_service) VALUES ($age,$client,$x)");

            $query->execute();

            $req1 = DB::connect()->prepare("SELECT prix_service FROM service_enfant  WHERE id_service='$id[$i]'");
            $req1->execute();
            $select = $req1->fetch();
            echo "prix servuce" . $prix_enfants += $select['prix_service'];
        }
        $query = DB::connect()->prepare("UPDATE reservation SET prix_reservation='$prix_enfants' WHERE id_reservation='$last_id'");

        $query->execute();

        echo "prix_enfants" . $prix_enfants;
    }

    static public function insert_table_associatif($id_bien, $id_pension)
    {

        // get last id_reservation insert
        $req1 = DB::connect()->prepare('SELECT id_reservation FROM reservation ORDER BY reservation.id_reservation DESC LIMIT 1');
        $req1->execute();
        $row1 = $req1->fetch();
        $last_id = $row1['id_reservation'];
        // insert id_pension and id_bien into data base

        $req2 = DB::connect()->prepare("INSERT INTO associatif (id_reservation,id_pension,id_bien) VALUES ($last_id,$id_pension,$id_bien)");
        $req2->execute();


        // get prix by id_bien and id_pension


        $req3 = DB::connect()->prepare("SELECT bien.prix_bien,pension.prix_pension FROM bien,pension WHERE id_bien='$id_bien' and id_pension='$id_pension'");
        $req3->execute();
        $row3 = $req3->fetch();
        echo "prix_bien" . $prix_bien = $row3['prix_bien'];
        echo  "prix_pension" . $prix_pension = $row3['prix_pension'];

        $prix_total = $row3['prix_bien'] + $row3['prix_pension'];
        echo "prix" . $prix_total;

        $req4 = DB::connect()->prepare("SELECT prix_reservation FROM reservation WHERE id_reservation='$last_id'");
        $req4->execute();
        $row4 = $req4->fetch();
        $select = $row4['prix_reservation'];

        echo "prix reservation" . $prix_total = $prix_total + $select;

        // insert prix reservation
        $req5 = DB::connect()->prepare("UPDATE reservation SET prix_reservation='$prix_total' WHERE id_reservation='$last_id'");
        $req5->execute();
    }

    static public function insertDetailleReservation()
    {
        $quer = DB::connect()->prepare("INSERT INTO  detaille_reservation (x) VALUES (1)");

        $quer->execute();
    }
    static public function recupererIdR()
    {

        $req1 = DB::connect()->prepare('SELECT id_R FROM detaille_reservation ORDER BY detaille_reservation.id_R DESC LIMIT 1');
        $req1->execute();
        $row1 = $req1->fetch();
        $_SESSION['id_R'] = $row1['id_R'];
    }
}