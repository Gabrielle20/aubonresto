<?php
// namespace App;

include_once "./class/bdd/connexionbdd.php"; 

class Reservation
{
    //ATTRIBUTES
    private $conn; 
    private $connbdd; 
    private $id_user; 

    //METHODS
    public function __construct($id_user)
    {
        $this->id_user = $id_user;
        // $this->date_reservation = date("Y-m-d");
        $this->connbdd = (new ConnexionBDD("localhost:3307", "aubonresto_db", "root", "")); 
        $this->conn = $this->connbdd->OpenCon();
        // var_dump($this->conn); 
    }

    public function getId()
    {
        return $this->id_user; 
    }

    public function check_dispo_table($table, $date)
    {
        $sqlDispo = "SELECT COUNT(*) FROM reservations WHERE id_table = '$table' AND date_reservation = '$date'"; 
        $dispo = mysqli_fetch_all(($this->connbdd->getResults($this->conn, $sqlDispo)), MYSQLI_ASSOC); 
        $nb_disponibilites = $dispo[0]["COUNT(*)"];
        // var_dump($nb_disponibilites) ; 
        if($nb_disponibilites>0)
        {
            return false; 
        }
        else 
        {
            return true; 
        }
    }

    public function addReservation($reservation)
    {
        // $resOk = false; 
        // var_dump($reservation); 
        if(!empty($reservation))
        {
            
            $disponible = $this->check_dispo_table($reservation['id_table'], $reservation['date_reservation']); 
            if($disponible)
            {
                //requete pour inserer une reservation 
                $sqlInsertRes = ("INSERT INTO reservations (id_user, id_table, date_reservation) VALUES ('$this->id_user', '".$reservation['id_table']."', '".$reservation['date_reservation']."')");  
                $result = $this->connbdd->getResults($this->conn, $sqlInsertRes);

                //requete pour mettre a jour la le statut de la table a une date précise 
                // $sqlUpdateTable = ("UPDATE tables SET statut_table = '0', date_reservee = '".$reservation['date_reservee']."' WHERE id_table = '".$reservation['id_table']."'");  
                // $result = $this->connbdd->getResults($this->conn, $sqlUpdateTable); 

                // $resOk = true; 

                echo("Votre réservation à bien été prise en compte ! "); 
            }
            else 
            {
                echo("Cette table est déjà réservée à cette date, veuillez réessayer avec une autre date ou une autre table svp."); 
                // $resOk = false; 
            }
            
        }
        // $tab["reservation_validee"]=$resOk; 
        // return (json_encode($tab)); 
        include ROOT."/forms/reservation/save.php"; 
    }

    public function getReservations()
    {
        $sqlGetRes = "SELECT * FROM reservations WHERE id_user = '".$this->id_user."'"; 
        $resGetRes = mysqli_fetch_all(($this->connbdd->getResults($this->conn, $sqlGetRes)), MYSQLI_ASSOC); 
        
        $tabreservations = $resGetRes[0];  
        var_dump($resGetRes); 
    }
}