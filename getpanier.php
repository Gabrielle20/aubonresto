<?php



define("ROOT", __DIR__);

include_once ROOT."/App/Panier.php";
require_once ROOT."/class/bdd/connexionbdd.php";


$data = new Panier();
$connexionBDD = New ConnexionBDD ();
$conn = $connexionBDD->OpenCon();


if (!empty($_SESSION['id_user'])) {
    // ajouter des éléments au panier
    // if (!empty($_GET) && isset($_GET['addcart']) && is_numeric($_GET['addcart']) && !isset($_GET['removearticle'])) {
    //     $data->addToPanier($_GET['addcart']);
    // }
    
    // récupérer le panier
    if (!empty($_GET) && isset($_GET['getpanier']) && !isset($_GET['removearticle']) ) {
        $panierecup = $data->getCartElements();

        if (!empty($panierecup) && $panierecup !== null) {
            
            $panier = $panierecup[0];
    
            if ($panier['articles_array'] !== null) {

                $articles = $panier['articles_array'];
                
        
                $list = unserialize($articles);

                if ($list !== false) {
                    $articles = [];
                    
                    foreach ($list as $id)  {
                        
                        $query = ("SELECT * FROM articles WHERE id_article = '$id'");
                        $result = mysqli_query($conn, $query);
            
                        $article = mysqli_fetch_all($result, MYSQLI_ASSOC);
            
                        $articles[] = $article[0];
                    }
            
            
                    $count = count($articles);
                }
                else {
                    $articles = null;
                }
        
            }
            else {
                $articles = null;
            }

        }
        else {
            $articles = null;
            $count = 0;
            $panier = null;
        }

        // $type = $data->payOnline($_POST);
        

        include ROOT."/Templates/Panier/panier.php";
    }


    // enlever des éléments du panier
    if (!empty($_GET) && isset($_GET['getpanier']) && isset($_GET['removearticle']) && is_numeric($_GET['removearticle'])  ) {
        
        $data->removeFromPanier($_GET['panierid'], $_GET['removearticle']);
    }

    if (!empty($_POST) && isset($_POST['valide'])) {

        $data->updateStatusPanier($_POST['valide']);
        header('Location: /remerciement.php');
        var_dump($_POST['valide']);
    }
}

