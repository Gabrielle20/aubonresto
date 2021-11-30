<?php
include_once 'functions.php';
include_once './class/bdd/connexionbdd.php';
include_once './class/inscription/forminscription.php';

//----------------------------------------------------------------------------------------------

if(!empty($_POST)){

    $name = htmlspecialchars(strip_tags($_POST['name']));
    $firstname = htmlspecialchars(strip_tags($_POST['firstname']));
    $email = htmlspecialchars(strip_tags($_POST['email']));
    $phone =  "0" . strval(htmlspecialchars(strip_tags($_POST['phone'])));
    $address =  htmlspecialchars(strip_tags($_POST['address']));
    $password = $_POST['password'];

    $Inscription = new FormInscription($name,$firstname,$email, $phone,$address, $password);
    $check = $Inscription->CheckForm();

    if ($check){
        $obj = json_decode($check);
        $tab["check"]=$obj;

    }
    print_r(json_encode($tab));
}
?>
