<?php

include_once 'functions.php';
include_once './class/bdd/connexionbdd.php';
include_once './class/connexion/formconnexion.php';

include './Templates/headHtml.html';
//----------------------------------------------------------------------------------------------

if(isset($_SESSION["id_user"])){
    //Recuperer les informations de l'utilisateur
    $session=$_SESSION['id_user'];
    $ConnexionBDD = New ConnexionBDD ('mysql-aubonresto.alwaysdata.net','aubonresto_db','250765_dbuser','aubonrestobg95');
    $conn = $ConnexionBDD->OpenCon();
    $request=("SELECT * FROM users WHERE id_user='$session'");
    $data= $ConnexionBDD->getResults($conn,$request);
    while ($row = $data -> fetch_array(MYSQLI_NUM)) {

        $name=$row[2];
        $firstname=$row[3];
        $email=$row[4];
        $phonenumber=$row[5];
        $address=$row[6];
    }
    include('./Templates/nav.php');?>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><strong>Mes informations personnelles:</strong></h4>
            <img class="card-img-top" src="/images/profil.png" alt="Card image cap" style="width: 6rem;">
            <p class="card-text"><strong>Nom:</strong> <?= $name; ?></p>
            <p class="card-text"><strong>Prénom:</strong> <?= $firstname; ?></p>
            <p class="card-text"><strong>Adresse mail: </strong> <?= $email; ?></p>
            <p class="card-text"><strong>Numéro de téléphone: 0</strong> <?= $phonenumber; ?></p>
            <p class="card-text"><strong></strong>Adresse: <?= $address; ?></p>

        </div>
    </div>


<?php }else{
    header('Location: /index.php');
} ?>