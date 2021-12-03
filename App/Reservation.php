<?php
namespace App;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


use Core\Database\ConnexionBDD;

// require_once '../vendor/phpmailer/phpmailer/src/Exception.php';
// require_once '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
// require_once '../vendor/phpmailer/phpmailer//src/SMTP.php';


include_once "./App/Mail.php"; 

class Reservation
{
    //ATTRIBUTES
    private $conn; 
    private $connbdd; 
    /**
     * @var integer
     */
    private int $id_user; 

    //METHODS
    /**
     * __construct
     *
     * @param [type] $id_user
     */
    public function __construct($id_user)
    {
        $this->id_user = $id_user;
        // $this->date_reservation = date("Y-m-d");
        $this->connbdd = (new ConnexionBDD("localhost:3307", "aubonresto_db", "root", "")); 
        $this->conn = $this->connbdd->OpenCon();
        // var_dump($this->conn); 
    }
    /**
     * getId
     *
     * @return int
     */
    public function getId()
    {
        return $this->id_user; 
    }
    /**
     * Undocumented function
     *
     * @param [int] $table
     * @param [date] $date
     * @return void
     */
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
    /**
     * addReservation
     *
     * @param [POST] $reservation
     * @return void
     */
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

                // $mail = new Mail($this->id_user); 

                // $mail->sendMail(); 


               return true;
            }
            else 
            {
                return false;
                // $resOk = false; 
            }
            
        }
        // $tab["reservation_validee"]=$resOk; 
        // return (json_encode($tab)); 
    }
    /**
     * getReservations
     *
     * @return array
     */
    public function getReservations()
    {
        $sqlReservations = "SELECT * FROM reservations WHERE id_user = '".$this->id_user."'"; 
        $sqlReservationResult = mysqli_query($this->conn, $sqlReservations);
        $reservations = mysqli_fetch_all($sqlReservationResult, MYSQLI_ASSOC);
        return($reservations);
        
        // var_dump($resGetRes); 
        // if(!empty($resGetRes))
        // {
        //     return($resGetRes); 
        //     require_once "../Templates/Reservations/index.php"; 
        // }
        // else
        // {
        //     return void() ; 
        // }
    }
}