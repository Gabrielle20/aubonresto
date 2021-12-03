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

    public function deleteArtcile($id){
        $result = (new Article())->deleteArticle($id);
        echo $result;
    }

    public function editIndex($id){
        $article = (new Article)->getArticle($id);
        $this->render('Articles/edit',array(
            "article" => $article[0]
        ));
    }

    public function editArticle($values, $id){
        $result = (new Article())->editArticle($values, $id);
        echo $result;

    }



}