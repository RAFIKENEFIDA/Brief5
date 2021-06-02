<?php



class User
{

    static public function login($data)
    {
        $email = $data['email'];
        $strm = DB::connect()->prepare("SELECT *FROM utilisateur WHERE email='$email'");
        $strm->execute() or die('SQL');

        return $strm->fetch();
    }

    static public function insertUser($data)
    {
        $strm = DB::connect()->prepare('INSERT INTO utilisateur(id_role,nom,prenom,email,password_user)
         VALUES(0,:first_Name,:last_Name,:email,:password) ');
        $strm->bindParam((':first_Name'), $data['first_Name']);
        $strm->bindParam((':last_Name'), $data['last_Name']);
        $strm->bindParam((':email'), $data['email']);
        $strm->bindParam((':password'), $data['password']);

        if ($strm->execute()) {
            return 'ok';
        } else {
            return 'error';
        }
    }
    static public function FindEmail($email)
    {
        $strm = DB::connect()->prepare("SELECT  * FROM utilisateur WHERE email='$email'");
        $strm->execute() or die('SQL');
        $x = $strm->fetch();
        return $x;
    }
}