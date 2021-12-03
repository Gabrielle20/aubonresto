<?php

require_once "./class/bdd/connexionbdd.php";
class User
{
    private string $name;
    private string $firstname;
    private string $email;
    private int $telephone;
    private string $adresse;

    private $ConnexionBDD;
    private $conn;

    public function __construct() {
        $this->ConnexionBDD = New ConnexionBDD ();
        $this->conn = $this->ConnexionBDD->OpenCon();

    }


    public function editProfil($row, $idUser) {

        if (!empty($idUser)) {

            $query = ("SELECT * FROM users WHERE id_user = $idUser");
            $result = mysqli_query($this->conn, $query);
            $infosUser = mysqli_fetch_all($result, MYSQLI_ASSOC);

            if (!empty($infosUser)) {
                $infosUser = $infosUser[0];
            }


            if (!empty($row)) {

                $name = $row["name"];
                $firstname = $row["firstname"];
                $phone = $row["phone"];
                $address = $row["address"];
                $email = $row["email"];

                $query = "UPDATE users SET name_user = '$name', firstname_user = '$firstname', phone_user = '$phone', address_user = '$address', email_user= '$email' WHERE id_user = '$idUser'";

                if (mysqli_query($this->conn, $query)) {
                    echo "L'article a bien été créé";


                    $newURL = "../infosUser.php";
                    header('Location: '.$newURL);
                    exit;

                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($this->conn);
                }
            }

            return $infosUser;
        }
    }

}