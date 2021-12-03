<?php
/************************ Version ou vous définissez vos routes ***************************/
// use App\Controller\ArticleController;
use App\Controller\IndexController;
use App\Controller\ArticleController;
use App\Controller\InscriptionController;
use App\Controller\ConnexionController;
use App\Controller\PanierController;
use App\Controller\ReservationController;
use App\Controller\ProfileController;
use App\Controller\FactureController;


if (isset($_GET["page"]) && !empty($_GET["page"])) {
    switch ($_GET["page"]){
        case "getArticles":
            switch ($_GET["articles"]){
                case "entrees":
                    (new ArticleController())->entrees();
                break;

                case "plats":
                    (new ArticleController())->plats();
                break;

                case "desserts":
                    (new ArticleController())->desserts();
                break;

                case "boissons":
                    (new ArticleController())->boissons();
                break;



            }
        break;

        case "singleArticle":
            if(isset($_GET['id'])){
                (new ArticleController())->single($_GET['id']);
            }

            else{
                switch ($_GET["articles"]){
                    case "entrees":
                        (new ArticleController())->entrees();
                    break;

                    case "plats":
                        (new ArticleController())->plats();
                    break;

                    case "desserts":
                        (new ArticleController())->desserts();
                    break;

                    case "boissons":
                        (new ArticleController())->boissons();
                    break;



                }
            }
        break;

        case 'login':
            if (isset($_GET['action'])){
                $result = json_encode((new ConnexionController())->login($_POST));
                echo $result;
            }
            else{
                (new ConnexionController())->index();
            }
        break;

        case 'logOut':
            (new ConnexionController())->logOut();
        break;

        case 'register':
            if (isset($_GET['action'])){
                $result = json_encode((new InscriptionController())->register($_POST));
                return $result;
            }
            else{
                (new InscriptionController())->index();
            }
        break;

        case 'panier':
            (new PanierController())->index();
        break;

        case 'addToCart':
           $result = (new PanierController())->add($_POST['id']);
           echo $result;
        break;

        case 'delete':
            $result = (new PanierController())->delete($_POST['idArticle'], $_POST['idPanier']);
            echo json_encode($result);
        break;

        case 'saveReservation':
            (new ReservationController())->formIndex();
        break;

        case 'addReservation':
            $result = (new ReservationController())->addReservation($_SESSION['id_user'],$_POST);
            echo json_encode($result);
        break;

        case 'pageProfile' :
            if(isset($_GET['articles'])){
                switch ($_GET['articles']){
                    case "allProducts":
                        (new ProfileController())->getAll();
                        break;

                    case "newProduct":
                        (new ProfileController())->newProduct();
                        break;
                }
            }
            else{
                (new ProfileController())->index();
            }
        break;

        case 'infosUser':
            (new  ProfileController())->infoUser();
        break;

        case 'createFacture':
            header('Location: ../App/CreateFacture.php');
        break;

    }
}
else{
    (new IndexController)->index();
}
