<?php

define("ROOT", __DIR__);
include_once "./App/Article.php";
include_once "./App/Panier.php";

$data = new Article();
$panier = new Panier();


if (!empty($_GET) && isset($_GET['paiement'])) {
    
    include ROOT."/Templates/Panier/paiement.php";
}