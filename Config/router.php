<?php
/************************ Version ou vous définissez vos routes ***************************/
// use App\Controller\ArticleController;
use App\Controller\IndexController;
use App\Controller\ArticleController;
use App\Controller\InscriptionController;
use App\Controller\ConnexionController;
use App\Controller\PanierController;


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
    }
}
else{
    (new IndexController)->index();
}
