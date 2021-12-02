<?php

namespace App\Controller;

use Core\Controller\DefaultController;
use Core\Database\ConnexionBDD;
use App\Article;

class ArticleController extends DefaultController
{

    public function entrees(){

        $this->render('Articles/entrees',array(
            "articles" => (new Article)->getArticles()
        ));

    }
    public function plats(){

        $this->render('Articles/plats',array(
            "plats" => (new Article)->getPlats()
        ));

    }
    public function desserts(){

        $this->render('Articles/desserts',array(
            "desserts" => (new Article)->getDesserts()
        ));

    }
    public function boissons(){

        $this->render('Articles/boissons',array(
            "boissons" => (new Article)->getBoissons()
        ));

    }
    public function single($id){

        $this->render('Articles/single',array(
            "article" => (new Article)->getArticle($id)
        ));

    }



}