<?php
    require_once "./class/bdd/connexionbdd.php";
    include_once "./App/Panier.php";

    $connexionBDD = New ConnexionBDD ();
    $conn = $connexionBDD->OpenCon();

    if (!empty($_SESSION['id_user']))
    {
        $data = new Panier();
        $count = $data->getNbrCartElements();
    }
    
?>