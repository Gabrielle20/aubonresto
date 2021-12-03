<?php

require_once "./class/bdd/connexionbdd.php";

class Panier
{
    private int $total = 0;
    private string $statut;
    private string $contenu;
    private string $user;

    private $ConnexionBDD;
    private $conn;



    public function __construct() {
        $this->ConnexionBDD = New ConnexionBDD ();
        $this->conn = $this->ConnexionBDD->OpenCon();

    }


    /**
     * Récupère les éléments du panier
     *
     * @return void
     */
    public function getCartElements() {
        $userId = $_SESSION['id_user'];

        $query = ("SELECT * FROM panier WHERE id_user = $userId");
        $result = mysqli_query($this->conn, $query);
        $panier = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $panier;
    }



    /**
     * Get number of elements in cart
     *
     * @return int
     */
    public function getNbrCartElements() {
        $userId = $_SESSION['id_user'];

        $query = ("SELECT * FROM panier WHERE id_user = $userId");
        $result = mysqli_query($this->conn, $query);
        $panier = mysqli_fetch_all($result, MYSQLI_ASSOC);

        if(!empty($panier)) {
            $panier = $panier[0];

            $articles = unserialize($panier['articles_array']);
    
            if ($articles !== false) {

                $count = count($articles);
        
                return $count;
            }
        }
        else {
            return;
        }
    }


    /**
     * Ajouter des articles au panier
     *
     * @param array $article
     * @return void
     */
    public function addToPanier(int $articleId) {

        if (!empty($articleId)) {

            // récupérer l'article à ajouter au panier
            $queryArticle = ("SELECT * FROM articles WHERE id_article = $articleId");
            $resultArticle = mysqli_query($this->conn, $queryArticle);
            $article = mysqli_fetch_all($resultArticle, MYSQLI_ASSOC);
            $articleName = $article[0]['name_article'];
            $articlePrix = $article[0]['prix_article'];


            // récupérer l'utilisateur
            $userId = $_SESSION['id_user'];


            // vérifier si un panier existe déjà pour cet utilisateur
            $queryForExisting = ("SELECT * FROM panier WHERE id_user = $userId");
            $result = mysqli_query($this->conn, $queryForExisting);
            $panier = mysqli_fetch_all($result, MYSQLI_ASSOC);

            
            // si un panier existe déjà pour cet utilisateur => UPDATE
            if (!empty($panier)) {
                $panier = $panier[0];
                $panierId = $panier['id_panier'];
                $prevtotal = $panier['total_panier'];
                

                if ($panier['articles_array'] !== "") {
                    $panier_data = unserialize($panier['articles_array']);
                }
                $panier_data[] = $articleId;
                $articles_serialized = serialize($panier_data);
                $total = $prevtotal + $articlePrix;

                $insert = "UPDATE panier SET id_user = '$userId', articles_array = '$articles_serialized', total_panier = $total, statut_panier = 'En cours' WHERE id_panier = $panierId";
                
            }
            // sinon, création dun nouveau panier => INSERT INTO
            else {
                $articles = [];
                $articles[] = $articleId;
                $articles_serialized = serialize($articles);
                $total = $articlePrix;

                $insert = "INSERT INTO panier (id_user, articles_array, total_panier, statut_panier) VALUES ('$userId', '$articles_serialized', '$total', 'En cours')";
            }


            if (mysqli_query($this->conn, $insert)) {
                // echo "Article ajouté au panier";
                return true;
            } else {
                return false;
                // echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
            }
        }

    }


    /**
     * Retirer des articles du panier
     *
     * @param integer $panierId
     * @param integer $articleId
     * @return void
     */
    public function removeFromPanier(int $panierId, int $articleId) {


        // récupérer l'article
        $articleObj = ("SELECT * FROM articles WHERE id_article = '$articleId'");
        $articleResult = mysqli_query($this->conn, $articleObj);
        $article = mysqli_fetch_all($articleResult, MYSQLI_ASSOC);

        $article = $article[0];
        $articlePrix = $article['prix_article'];


        // rédupérer le panier
        $query = ("SELECT * FROM panier WHERE id_panier = '$panierId'");
        $result = mysqli_query($this->conn, $query);
        $panier = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        if ($panier !== null) {
            $panier = $panier[0];
            $panierId = $panier['id_panier'];
            $totalPanier = $panier['total_panier'];
    
            // retirer l'article du tableau d'articles
            $listArticles = $panier['articles_array'];

            if ($listArticles !== null) {
                $panier_data = unserialize($panier['articles_array']);
        
                if (($key = array_search($articleId, $panier_data)) !== false) {
                    unset($panier_data[$key]);
                }
        
                $articles_serialized = serialize($panier_data);

                if ($articles_serialized === "a:0:{}") {
                    $articles_serialized = NULL;
                }
            }
            else {
                $articles_serialized = null;
            }
    
            // soustraire le prix de l'article du total
            $total = $totalPanier - $articlePrix;
        }
        else {
            $articles_serialized = NULL;
        }


        // update du panier en bdd
        $update = "UPDATE panier SET articles_array = '$articles_serialized', total_panier = '$total' WHERE id_panier = $panierId";

        if (mysqli_query($this->conn, $update)) {
            echo "Article retiré du panier";
        } else {
            echo "Error: " . $update . "<br>" . mysqli_error($this->conn);
        }

        $newURL = "../getpanier.php?getpanier";
        header('Location: '.$newURL);
        exit;
    }

    public function updateStatusPanier() {
        // récupérer l'utilisateur
         $userId = $_SESSION['id_user'];

        $statusArticle = $_POST['valide'];

        $query = ("UPDATE panier SET statut_panier = '$statusArticle' WHERE id_user = $userId");
        
        if (mysqli_query($this->conn, $query)) {
            // echo "Article ajouté au panier";
            return true;
        } else {
            return false;
            // echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        }
    }

    

    /**
     * Récupérer toutes les commandes
     *
     * @return void
     */
     public function payOnline($type) {

         if (!empty($type)) {
             $type = $type['typeName'];
    
    
            if ($type !== null && $type === "en-ligne") {
                $newURL = "App/Paiement.php";
                header('Location: '.$newURL);
                exit;
            }
        }
    }
}