<?php

define("ROOT", __DIR__);
include_once "./App/Article.php";


$data = new Article();

// Récupère le single article
if (!empty($_GET) && isset($_GET['articles']) && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $singleArticle = $data->getArticle($_GET['id']);

    $article = $singleArticle[0];

    include ROOT."/Templates/Articles/single.php";
}


// Récupère toutes les ehrtées
if (!empty($_GET) && isset($_GET['articles']) && $_GET['articles'] === "entrees" && !isset($_GET['id'])) {
    $articles = $data->getArticles();
    include ROOT."/Templates/Articles/entrees.php";
}



// Récupère tous les plats
if (!empty($_GET) && isset($_GET['articles']) && $_GET['articles'] === "plats" && !isset($_GET['id'])) {

    $plats = $data->getPlats();

    include ROOT."/Templates/Articles/listPlats.php";
}



// Récupère tous les desserts
if (!empty($_GET) && isset($_GET['articles']) && $_GET['articles'] === "desserts" && !isset($_GET['id'])) {

    $desserts = $data->getDesserts();

    include ROOT."/Templates/Articles/listDesserts.php";
}



// Récupère toutes les boissons
if (!empty($_GET) && isset($_GET['articles']) && $_GET['articles'] === "boissons" && !isset($_GET['id'])) {

    $boissons = $data->getBoissons();

    include ROOT."/Templates/Articles/listBoissons.php";
}


// Création d'un nouvel article
if (!empty($_SESSION['id_user'])) {
    if (!empty($_GET) && isset($_GET['articles']) && $_GET['articles'] === "new" && !isset($_GET['id'])) {
        $newArticle = $data->addArticle($_POST);

        include ROOT."/Templates/Articles/new.php";
    }
}
