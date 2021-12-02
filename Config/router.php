<?php
/************************ Version ou vous définissez vos routes ***************************/
// use App\Controller\ArticleController;
use App\Controller\IndexController;
use App\Controller\ArticleController;


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
    }
}
else{
    (new IndexController)->index();
}
