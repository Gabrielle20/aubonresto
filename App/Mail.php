<?php
// namespace App; 
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;

// require 'src/PHPMailer.php';
// require 'src/SMTP.php';

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

require_once './vendor/phpmailer/phpmailer/src/Exception.php';
require_once './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once './vendor/phpmailer/phpmailer//src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require_once "vendor/autoload.php";


include_once "./class/bdd/connexionbdd.php";

include_once "./class/bdd/connexionbdd.php";

class Mail 
{
    private $conn; 
    private $connbdd; 
    private $from; 
    private $to; 
    private $subject; 
    private $message; 
    private $headers; 

    public function __construct($id_user)
    {
        //db
        $this->connbdd = (new ConnexionBDD("localhost:3307", "aubonresto_db", "root", "")); 
        $this->conn = $this->connbdd->OpenCon();

        $this->from = "noreply.aubonrestau@gmail.com"; 
        $this->id_user = $id_user; 

        $sqlMail = "SELECT * FROM users WHERE id_user = '".$this->id_user."'"; 
        $sqlMailResult = mysqli_query($this->conn, $sqlMail);
        $userarr = mysqli_fetch_all($sqlMailResult, MYSQLI_ASSOC);
        $user = $userarr[0]; 
        // var_dump($user); 
        $this->to = $user["email_user"]; 
        $this->subject = "facture"; 
        $this->message = "test mailer facture"; 
        $this->headers = array(
            'From' => $this->from,
            'Reply-To' => $this->from,
            'X-Mailer' => 'PHP/' . phpversion()
        );
    }

    public function getConnBdd()
    {
        return $this->connbdd; 
    }
    public function getConn()
    {
        return $this->conn; 
    }


    public function getFrom()
    {
        return $this->from; 
    }
    public function setFrom($newFrom)
    {
        $this->from = $newFrom; 
    }

    public function getTo()
    {
        return $this->to; 
    }
    public function setTo($newTo)
    {
        $this->from = $newTo; 
    }

    public function getSubject()
    {
        return $this->subject; 
    }
    public function setSubject($newSubject)
    {
        $this->from = $newSubject; 
    }

    public function getMessage()
    {
        return $this->message; 
    }
    public function setMessage($newMessage)
    {
        $this->from = $newMessage; 
    }

    public function setHeaders($newFrom, $newTo, $newXmailer)
    {
        $this->headers = array(
            'From' => $newFrom,
            'Reply-To' => $newFrom,
            'X-Mailer' => 'PHP/' . phpversion()
        );
    }

    public function sendMail()
    {
        // //PHPMailer Object
        $mail = new PHPMailer(); //Argument true in constructor enables exceptions

        // //From email address and name
        $mail->Username = 'noreply.aubonrestau@gmail.com'; 
        $mail->Password = 'Aubonrestau95'; 
        $mail->Hostname = 'smtp.gmail.com';
        $mail->From = $this->from;
        $mail->FromName = "No Reply Aubonrestau";

        // //To address and name
        $mail->addAddress($this->to, "");

        // //Address to which recipient will reply
        $mail->addReplyTo($this->from, "Reply");

        // //Send HTML or Plain Text email
        $mail->isHTML(true);

        $mail->Subject = $this->subject;
        $mail->Body = "<i>Mail body in HTML</i>";
        $mail->AltBody = "This is the plain text version of the email content";

        try {
            $mail->send();
            echo "Message has been sent successfully";
        } catch (Exception $e) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }


//         $mail = new PHPMailer();
//         $mail->isSMTP();
//         $mail->Hostname = 'smtp.gmail.com';
//         $mail->SMTPAuth = false;
//         $mail->Username = 'noreply.aubonrestau@gmail.com'; 
//         $mail->Password = 'Aubonrestau95';  
//         $mail->SMTPSecure = 'ssl';
//         $mail->Port = 465;

//         $mail->setFrom($mail->Username, 'No Reply Aubonrestau');
//         $mail->addReplyTo('noreply.aubonrestau@gmail.com', 'No Reply Aubonrestau');
//         $mail->addAddress('bache.nour2@gmail.com', 'Nour');
//         $mail->Subject = 'Test Email via phpmailer SMTP using PHPMailer';

//         $mailContent = "<h1>Send HTML Email using SMTP in PHP</h1>
//     <p>This is a test email I’m sending using SMTP mail server with PHPMailer.</p>";
// $mail->Body = $mailContent;

//         if($mail->send()){
//             echo 'Message has been sent';
//         }else{
//             echo 'Message could not be sent.';
//             echo 'Mailer Error: ' . $mail->ErrorInfo;
//         }
        // mail($this->to, $this->subject, $this->$message,  $this->headers); 
    }
}