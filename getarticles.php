<?php

define("ROOT", __DIR__);
include_once "./App/Article.php";


$data = new Article();


if (!empty($_GET) && isset($_GET['articles']) && $_GET['articles'] === "entrees") {
    $articles = $data->getArticles();
    include ROOT."/Templates/Articles/entrees.php";
}

if (!empty($_GET) && isset($_GET['articles']) && $_GET['articles'] === "plats") {

    $plats = $data->getPlats();

    include ROOT."/Templates/Articles/listPlats.php";
}


if (!empty($_GET) && isset($_GET['articles']) && $_GET['articles'] === "desserts") {

    $desserts = $data->getDesserts();

    include ROOT."/Templates/Articles/listDesserts.php";
}



