<?php
namespace App\Controller;

use Core\Controller\DefaultController;
use Core\Database\ConnexionBDD;

class IndexController extends DefaultController
{
    /**
     * Page Index
     *
     * @return void
     */
    public function index()
    {
        $this->render("Home/index", );
    }

}