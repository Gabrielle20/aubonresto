<?php

namespace App\Controller;

use Core\Controller\DefaultController;
use Core\Database\ConnexionBDD;
use App\FormConnexion;

class ConnexionController extends DefaultController
{
    /**
     * Page Index
     *
     * @return void
     */
    public function index()
    {
        $this->render("Connexion/connexion" );
    }


    public function login($params){
        if(!empty($params)){

            $login =  htmlspecialchars(strip_tags($params['login']));
            $password = $params['password'];
            $role = $params['role'];

            //connexion a la base de donnéesafin de récuperer la clé de chiffrement
            $ConnexionBDD = New ConnexionBDD ();
            $conn = $ConnexionBDD->OpenCon();


            $request =  ("SELECT key_chiffrement FROM users WHERE email_user='$login'");
            $result = $ConnexionBDD->getResults($conn,$request);
            while ($key = $result -> fetch_array(MYSQLI_NUM)) {

                $cle_chiffrement=$key[0];
            }

            $pwdhash=hash("sha512", $password.$cle_chiffrement);

            $Connexion = new FormConnexion($login, $pwdhash);
            $check = $Connexion->CheckForm();

            if ($check){

                $get_data = ("SELECT * FROM users WHERE email_user='$login' and pass_user= '$pwdhash'");
                $data = $ConnexionBDD->getResults($conn,$get_data);
                while ($row = $data -> fetch_array(MYSQLI_NUM)) {
                    $_SESSION['id_user']=$row[0];
                    $_SESSION['type_user'] = $row[1];
                    $_SESSION['name_user'] = $row[2];
                    $_SESSION['firstname_user'] = $row[3];
                    $_SESSION['email_user'] = $row[4];
                    $_SESSION['phone_user'] = $row[5];
                    $_SESSION['address_user'] = $row[6];

                }

                $obj = json_decode($check);
                $tab["check"]=$obj;

            }
            return $tab;
        }
    }

    public function logOut(){
        $_SESSION = array();
        session_destroy();
        header('Location: ?page=login');
        exit();
    }
}