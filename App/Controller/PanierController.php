<?php

namespace App\Controller;
use Core\Controller\DefaultController;
use Core\Database\ConnexionBDD;
use App\Panier;
class PanierController extends DefaultController
{

    /**
     * Page Index
     *
     * @return void
     */
    public function index()
    {
        $this->render("Panier/panier", );
    }

    public function processCart(){

    }


}