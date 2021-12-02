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
        $results =$this->processCart();
        $this->render("Panier/panier", $results);
    }

    public function processCart()
    {
        $data = new Panier();
        $connexionBDD = new ConnexionBDD ();
        $conn = $connexionBDD->OpenCon();

        $result = array();


        if (!empty($_SESSION['id_user'])) {
            // ajouter des éléments au panier
            // if (!empty($_GET) && isset($_GET['addcart']) && is_numeric($_GET['addcart']) && !isset($_GET['removearticle'])) {
            //     $data->addToPanier($_GET['addcart']);
            // }


            // récupérer le panier
            if (!empty($_GET) && isset($_GET['getpanier']) && !isset($_GET['removearticle'])) {
                $panierecup = $data->getCartElements();

                if (!empty($panierecup) && $panierecup !== null) {

                    $results['panier'] = $panierecup[0];

                    if ($result['panier']['articles_array'] !== null) {

                        $articles = $results['panier']['articles_array'];


                        $list = unserialize($articles);

                        if ($list !== false) {
                            $results['articles'] = [];

                            foreach ($list as $id) {

                                $query = ("SELECT * FROM articles WHERE id_article = '$id'");
                                $result = mysqli_query($conn, $query);

                                $article = mysqli_fetch_all($result, MYSQLI_ASSOC);
                                $results['articles'][] = $article[0];
                            }


                            $results['count'] = count($results['articles']);
                        } else {
                            $results['articles'] = null;
                        }

                    } else {
                        $results['articles'] = null;
                    }

                } else {
                    $results['articles'] = null;
                    $results['count'] = 0;
                    $results['panier'] = null;
                }

                $results['type'] = $data->payOnline($_POST);

                return $results;


            }

        }
    }


}