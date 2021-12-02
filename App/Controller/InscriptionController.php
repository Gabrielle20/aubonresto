<?php

namespace App\Controller;

use Core\Controller\DefaultController;
use Core\Database\ConnexionBDD;


class InscriptionController extends DefaultController
{
    /**
     * Page Index
     *
     * @return void
     */
    public function index()
    {
        $this->render("Inscription/inscription" );
    }


    public function register($params){
        var_dump($params);die();
    }

}