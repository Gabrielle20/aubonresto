<?php

function MailExist($mail){
    $ConnexionBDD = New ConnexionBDD ('mysql-aubonresto.alwaysdata.net','aubonresto_db','250765_dbuser','aubonrestobg95');
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
function InsertUser($name,$firstname,$email,$phone,$adress,$password){
    $ConnexionBDD = New ConnexionBDD ('mysql-aubonresto.alwaysdata.net','aubonresto_db','250765_dbuser','aubonrestobg95');
    $conn = $ConnexionBDD->OpenCon();
    // Verifie que le login n'existe pas
    $request =  ("INSERT INTO `users`(id_user,type_user,name_user,firstname_user,email_user,phone_user,adress_user,mdp_user)
              VALUES (NULL,'user', '$name','$firstname' ,'$email','$phone','$adress','$password')");
    $verification = $ConnexionBDD->getResults($conn,$request);
    if($verification){
        return TRUE;
    }
}

// function qui vérifie si l'utilisateur est bien inscris
function verifUser($login,$password){
    $ConnexionBDD = New ConnexionBDD ('mysql-aubonresto.alwaysdata.net','aubonresto_db','250765_dbuser','aubonrestobg95');
    $conn = $ConnexionBDD->OpenCon();

    $request =  ("SELECT email_user, pass_user FROM users WHERE email_user='$login' AND pass_user='$password'");
    return $ConnexionBDD->getResults($conn,$request);
}
?>
