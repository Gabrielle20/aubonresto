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

    public function getTotal()
    {
        return $total;
    }

    public function setTotal()
    {
        $this->total = $total;
    }



    public function getStatut()
    {
        return $statut;
    }

    public function setStatut()
    {
        $this->statut = $statut;
    }



    public function getContenu()
    {
        return $contenu;
    }

    public function setContenu()
    {
        $this->contenu = $contenu;
    }

    

    public function getUser()
    {
        return $user;
    }

    public function setUser()
    {
        $this->user = $user;
    }




    public function getCartElements() {


        $userId = $_SESSION['id_user'];

        $query = ("SELECT * FROM panier WHERE id_user = $userId");
        $result = mysqli_query($this->conn, $query);
        $panier = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $panier;
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

            
            
            if (!empty($panier)) {
                $panier = $panier[0];
                $panierId = $panier['id_panier'];
                $prevtotal = $panier['total_panier'];

                $panier_data = unserialize($panier['articles_array']);
                $panier_data[] .= $articleId;
                $articles_serialized = serialize($panier_data);

                $total = $prevtotal + $articlePrix;

                $insert = "UPDATE panier SET id_user = '$userId', articles_array = '$articles_serialized', total_panier = $total, statut_panier = 'En cours' WHERE id_panier = $panierId";
                
            }
            else {
                $articles = [];
                $articles[] = $articleId;
                $articles_serialized = serialize($articles);

                $total = $articlePrix;

                $insert = "INSERT INTO panier (id_user, articles_array, total_panier, statut_panier) VALUES ('$userId', '$articles_serialized', '$total', 'En cours')";
            }


            if (mysqli_query($this->conn, $insert)) {
                echo "Article ajouté au panier";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
            }
        }

    }
}