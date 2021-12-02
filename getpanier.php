<?php


define("ROOT", __DIR__);

include_once "./App/Panier.php";
require_once "./class/bdd/connexionbdd.php";


$data = new Panier();
$connexionBDD = New ConnexionBDD ();
$conn = $connexionBDD->OpenCon();


if (!empty($_SESSION['id_user'])) {

    if (!empty($_GET) && isset($_GET['addcart']) && is_numeric($_GET['addcart'])) {
        $data->addToPanier($_GET['addcart']);
    }



    if (!empty($_GET) && isset($_GET['getpanier']) ) {
        $panierecup = $data->getCartElements();
        $panier = $panierecup[0];

        $articles = $panier['articles_array'];
        

        $list = unserialize($articles);

        $articles = [];

        foreach ($list as $id)  {
            
            $query = ("SELECT * FROM articles WHERE id_article = '$id'");
            $result = mysqli_query($conn, $query);

            $article = mysqli_fetch_all($result, MYSQLI_ASSOC);

            $articles[] = $article[0];
        }


        $count = count($articles);
        

        include ROOT."/Templates/Panier/panier.php";
    }
}

