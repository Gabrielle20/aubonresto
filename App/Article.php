<?php

// namespace App;

require_once "./class/bdd/connexionbdd.php";

class Article
{
    private int $prix;
    private string $name;
    private string $description;
    private string $type;

    private $ConnexionBDD;
    private $conn;


    public function __construct() {
        $this->ConnexionBDD = New ConnexionBDD ();
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



}