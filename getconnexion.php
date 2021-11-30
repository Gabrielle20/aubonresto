<?php
include_once 'functions.php';
include_once './class/bdd/connexionbdd.php';
include_once './class/connexion/formconnexion.php';

//----------------------------------------------------------------------------------------------

if(!empty($_POST)){

    $login =  htmlspecialchars(strip_tags($_POST['login']));
    $password = $_POST['password'];

    //connexion a la base de donnéesafin de récuperer la clé de chiffrement
    $ConnexionBDD = New ConnexionBDD ('mysql-aubonresto.alwaysdata.net','aubonresto_db','250765_dbuser','aubonrestobg95');
    $conn = $ConnexionBDD->OpenCon();

    $Connexion = new FormConnexion($login, $password);
    $check = $Connexion->CheckForm();

    if ($check){
        $obj = json_decode($check);

        $get_data = ("SELECT * FROM users WHERE email_user='$login' and pass_user= '$password'");
        $data = $ConnexionBDD->getResults($conn,$get_data);

        $tab["check"]=$obj;

    }
    print_r(json_encode($tab));
}
