<?php

namespace App;

use Core\Database\ConnexionBDD;
class Article
{
    private int $prix;
    private string $name;
    private string $description;
    private string $type;

    private $ConnexionBDD;
    private $conn;


    public function __construct() {
        $this->ConnexionBDD = New ConnexionBDD();
        $this->conn = $this->ConnexionBDD->OpenCon();

    }


    public function getType() {
        return $type;
    }

    public function setType() {
        $this->type = $type;
    }

    public function getPrix() {
        return $prix;
    }

    public function setPrix(int $prix) {
        $this->prix = $prix;
    }


    public function getName() {
        return $name;
    }

    public function setName(string $name) {
        $this->name = $name;
    }


    public function getDescription() {
        return $description;
    }

    public function setDescription(string $description) {
        $this->description = $description;
    }


    /**
     * Récupère tous les produits
     *
     * @return void
     */
    public function getAll() {
        $query = ("SELECT * FROM articles");
        $result = mysqli_query($this->conn, $query);
        $articles = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $articles;
    } 



    /**
     * Récupère tous les articles
     *
     * @return void
     */
    public function getArticles() {

        $query = ("SELECT * FROM articles WHERE type_article = 'entrées'");
        $result = mysqli_query($this->conn, $query);
        $articles = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $articles;

    }



    /**
     * Récupère les articles de type plats
     *
     * @return void
     */
    public function getPlats() {

        $query = ("SELECT * FROM articles WHERE type_article = 'plats'");
        $result = mysqli_query($this->conn, $query);
        $plats = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $plats;
    }



    /**
     * Récupère les articles de type desserts
     *
     * @return void
     */
    public function getDesserts() {
        $query = ("SELECT * FROM articles WHERE type_article = 'desserts'");
        $result = mysqli_query($this->conn, $query);
        $desserts = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $desserts;
    }
    


    /**
     * Récupère les articles de type boissons
     *
     * @return void
     */
    public function getBoissons() {
        $query = ("SELECT * FROM articles WHERE type_article = 'boissons'");

        $result = mysqli_query($this->conn, $query);
        $boissons = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $boissons;
    }



    /**
     * Récupère un article
     *
     * @param integer $id
     * @return void
     */
    public function getArticle(int $id) {
        $query = ("SELECT * FROM articles WHERE id_article = $id");

        $result = mysqli_query($this->conn, $query);
        $singleArticle = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        return $singleArticle;
    }



    /**
     * Création d'un nouvel article
     *
     * @param array $article
     * @return void
     */
    public function addArticle(array $article) {
        
        if (!empty($article)) {
            $name = $article["name_article"];
            $type = $article["type_article"];
            $prix = $article["prix_article"];
            $desc = $article["description_article"];

            $query = "INSERT INTO articles (name_article, type_article, prix_article, description_article) VALUES ('$name', '$type', '$prix', '$desc')";
            
            if (mysqli_query($this->conn, $query)) {
                echo "L'article a bien été créé";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
            }
        }
    }


    /**
     * Éditer un article
     *
     * @param [type] $elt
     * @param [type] $id
     * @return void
     */
    public function editArticle($elt, $id) {

        if (!empty($id)) {

            $query = ("SELECT * FROM articles WHERE id_article = $id");
            $result = mysqli_query($this->conn, $query);
            $article = mysqli_fetch_all($result, MYSQLI_ASSOC);

            if (!empty($article)) {
                $article = $article[0];
            }


            if (!empty($elt)) {

                $name = $elt["name_article"];
                $type = $elt["type_article"];
                $prix = $elt["prix_article"];
                $desc = $elt["description_article"];

                $query = "UPDATE articles SET name_article = '$name', type_article = '$type', prix_article = '$prix', description_article = '$desc' WHERE id_article = '$id'";

                if (mysqli_query($this->conn, $query)) {
                    echo "L'article a bien été créé";


                    $newURL = "../getarticles.php?articles=all";
                    header('Location: '.$newURL);
                    exit;

                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
                }
            }

            return $article;
        }
    }



    /**
     * Supprimer un article
     *
     * @param integer $id
     * @return void
     */
    public function deleteArticle(int $id) {
        $sql = "DELETE FROM articles WHERE id_article = $id";

        if ($this->conn->query($sql) === TRUE) {
        echo "L'article a bien été supprimé";
        } else {
        echo "Error deleting record: " . $this->conn->error;
        }

        return $this->getAll();
    }

}