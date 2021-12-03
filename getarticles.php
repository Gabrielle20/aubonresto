<?php

define("ROOT", __DIR__);
include_once "./App/Article.php";
include_once "./App/Panier.php";

$data = new Article();
$panier = new Panier();

// Récupère le single article
if (!empty($_GET) && isset($_GET['articles']) && isset($_GET['id']) && is_numeric($_GET['id']) && !isset($_GET['delete'])) {
    if (!empty($_SESSION['id_user'])) {
        if (isset($_GET['addcart'])) {
            $panier->addToPanier($_GET['addcart']);
        }
    }

    $singleArticle = $data->getArticle($_GET['id']);

    $article = $singleArticle[0];

    include ROOT."/Templates/Articles/single.php";
}


// Récupère toutes les entrées
if (!empty($_GET) && isset($_GET['articles']) && $_GET['articles'] === "entrees" && !isset($_GET['id']) && !isset($_GET['delete'])) {
    if (!empty($_SESSION['id_user'])) {
        if (isset($_GET['addcart'])) {
            $panier->addToPanier($_GET['addcart']);
        }
    }

    $articles = $data->getArticles();
    include ROOT."/Templates/Articles/entrees.php";
}


// Récupère tous les plats
if (!empty($_GET) && isset($_GET['articles']) && $_GET['articles'] === "plats" && !isset($_GET['id']) && !isset($_GET['delete'])) {
    if (!empty($_SESSION['id_user'])) {
        if (isset($_GET['addcart'])) {
            $panier->addToPanier($_GET['addcart']);
        }
    }


    $plats = $data->getPlats();

    include ROOT."/Templates/Articles/listPlats.php";
}


// Récupère tous les desserts
if (!empty($_GET) && isset($_GET['articles']) && $_GET['articles'] === "desserts" && !isset($_GET['id']) && !isset($_GET['delete'])) {
    if (!empty($_SESSION['id_user'])) {
        if (isset($_GET['addcart'])) {
            $panier->addToPanier($_GET['addcart']);
        }
    }


    $desserts = $data->getDesserts();

    include ROOT."/Templates/Articles/listDesserts.php";
}


// Récupère toutes les boissons
if (!empty($_GET) && isset($_GET['articles']) && $_GET['articles'] === "boissons" && !isset($_GET['id']) && !isset($_GET['delete'])) {
    if (!empty($_SESSION['id_user'])) {
        if (isset($_GET['addcart'])) {
            $panier->addToPanier($_GET['addcart']);
        }
    }


    $boissons = $data->getBoissons();

    include ROOT."/Templates/Articles/listBoissons.php";
}



// récupèrer tous les articles
if (!empty($_SESSION['id_user'])) {


    // Création d'un nouvel article
    if (!empty($_GET) && isset($_GET['articles']) && $_GET['articles'] === "new" && !isset($_GET['id'])) {
        $newArticle = $data->addArticle($_POST);

        include ROOT."/Templates/Articles/new.php";
    }

    // Modification d'un article
    if (!empty($_GET) && isset($_GET['edit']) && is_numeric($_GET['edit'])) {
        $article = $data->editArticle($_POST, $_GET['edit']);

        include ROOT."/Templates/Articles/edit.php";
    }




    // liste de tous les articles en admin
    if (!empty($_GET) && isset($_GET['articles']) && $_GET['articles'] === "all") {
        $articles = $data->getAll();

        include ROOT."/Templates/Articles/all.php";
    }


    // supprimer un article
    if (!empty($_GET) && isset($_GET['delete']) && is_numeric($_GET['delete'])) {
        
        $articles = $data->deleteArticle($_GET['delete']);

        include ROOT."/Templates/Articles/all.php";
    }
}