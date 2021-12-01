<?php

include('db_manager.php');

function MailExist($mail){
    $ConnexionBDD = New ConnexionBDD ();
    $conn = $ConnexionBDD->OpenCon();
    // Verifie que le mail entre n'existe pas dans la base de données
    $request_mail = ("SELECT COUNT(*) email_user FROM users WHERE email_user='$mail'");
    $verification_mail = $ConnexionBDD->getResults($conn,$request_mail);
    while ($row = $verification_mail -> fetch_array(MYSQLI_NUM)) {
        for ($i=0; $i <sizeof($row) ; $i++) {
            if ($row[0]==1) {
                return $MailExist= TRUE;
            }
            else{
                return false;
            }

        }
    }
}
// function qui insère les données du user dans la bdd
function InsertUser($name,$firstname,$email,$phone,$address,$key,$password){
    $ConnexionBDD = New ConnexionBDD();
    $conn = $ConnexionBDD->OpenCon();
    // Verifie que le login n'existe pas
    $request =  ("INSERT INTO `users`(id_user,type_user,name_user,firstname_user,email_user,phone_user,address_user,key_chiffrement,pass_user)
              VALUES (NULL,'user', '$name','$firstname' ,'$email','$phone','$address','$key','$password')");
    $verification = $ConnexionBDD->getResults($conn,$request);
    if($verification){
        return TRUE;
    }
}

// function qui vérifie si l'utilisateur est bien inscris
function verifUser($login,$password){
    $ConnexionBDD = New ConnexionBDD ();
    $conn = $ConnexionBDD->OpenCon();

    $request =  ("SELECT COUNT(*) FROM users WHERE email_user='$login' AND pass_user='$password'");

    $result = $ConnexionBDD->getResults($conn,$request);
    while($row= $result->fetch_row()){
        for ($i=0; $i <sizeof($row) ; $i++) {
            if ($row[0] == 1) {
                return TRUE;
            } else {
                return false;
            }
        }
    }

}
//fonction qui genere une clé aleatoire
function random_key($length=20){
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';
    for($i=0; $i<$length; $i++){
        $string .= $chars[rand(0, strlen($chars)-1)];
    }
    return $string;
}
?>
