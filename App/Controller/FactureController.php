<?php

namespace App\Controller;

use Core\Database\ConnexionBDD;
use Core\Controller\DefaultController;


class FactureController extends  DefaultController
{

    /**
     * Page Index
     *
     * @return void
     */
    public function index()
    {
        $this->render("Facture/index");
    }


}