<?php

define("ROOT", __DIR__);
include_once "./App/Article.php";


$data = new Article();

if (!empty($_GET) && isset($_GET['articles']) && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $singleArticle = $data->getArticle($_GET['id']);

    $article = $singleArticle[0];
    // $singleArticle = $singleArticle[0];

    include ROOT."/Templates/Articles/single.php";
}

if (!empty($_GET) && isset($_GET['articles']) && $_GET['articles'] === "entrees" && !isset($_GET['id'])) {
    $articles = $data->getArticles();
    include ROOT."/Templates/Articles/entrees.php";
}

if (!empty($_GET) && isset($_GET['articles']) && $_GET['articles'] === "plats" && !isset($_GET['id'])) {

    $plats = $data->getPlats();

    include ROOT."/Templates/Articles/listPlats.php";
}


if (!empty($_GET) && isset($_GET['articles']) && $_GET['articles'] === "desserts" && !isset($_GET['id'])) {

    $desserts = $data->getDesserts();

    include ROOT."/Templates/Articles/listDesserts.php";
}


if (!empty($_GET) && isset($_GET['articles']) && $_GET['articles'] === "boissons" && !isset($_GET['id'])) {

    $boissons = $data->getBoissons();

    include ROOT."/Templates/Articles/listBoissons.php";
}



