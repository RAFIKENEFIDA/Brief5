<?php


class Reservation
{


    static  function insert_table_reservation($data)
    {
        $strm = DB::connect()->prepare('INSERT INTO reservation(nbr_enfants,date_entrer,date_sortie,id_client)
         VALUES(:nbr_enfants,:date_entrer,:date_sortie,169) ');
        $strm->bindParam((':nbr_enfants'), $data['nbr_enfants']);
        $strm->bindParam((':date_entrer'), $data['date_entrer']);
        $strm->bindParam((':date_sortie'), $data['date_sortie']);

        if ($strm->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
        Redirect::to('Page_reservation');
    }
}