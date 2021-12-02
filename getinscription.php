<?php
include_once 'functions.php';
include_once './class/bdd/connexionbdd.php';
use App\FormInscription;
//----------------------------------------------------------------------------------------------

if(!empty($_POST)){

    $name = htmlspecialchars(strip_tags($_POST['name']));
    $firstname = htmlspecialchars(strip_tags($_POST['firstname']));
    $email = htmlspecialchars(strip_tags($_POST['email']));
    $phone =  "0" . strval(htmlspecialchars(strip_tags($_POST['phone'])));
    $address =  htmlspecialchars(strip_tags($_POST['address']));
    $password = $_POST['password'];

    //chiffrer le mot de passe en utilisant une clé aléatoire
    $key_chiffrement=random_key($length=20);
    $pwdhash=hash("sha512", $password.$key_chiffrement);

    $Inscription = new FormInscription($name, $firstname, $email, $phone, $address, $key_chiffrement,$pwdhash);
    $check = $Inscription->CheckForm();

    if ($check){
        $obj = json_decode($check);
        $tab["check"]=$obj;

    }
    print_r(json_encode($tab));
}
?>
