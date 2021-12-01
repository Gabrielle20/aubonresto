<?php
include_once 'functions.php';

class formInscription{

    private $name;
    private $firstname;
    private $email;
    private $phone;
    private $address;
    private $key_chiffrement;
    private $password;



    public function __construct(string $name, string $firstname, string $email, int $phone,  string $address, string $key_chiffrement, string $password){

        $this->name = $name;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
        $this->key_chiffrement = $key_chiffrement;
        $this->password = $password;

    }
    public function Getname(){
        return $this->name;
    }
    public function Getfirstname(){
        return $this->firstname;
    }
    public function GetMail(){
        return $this->email;
    }
    public function Getphone(){
        return $this->phone;
    }
    public function Getaddress(){
        return $this->address;
    }
    public function GetKey(){
        return $this->key_chiffrement;
    }
    public function GetPassword(){
        return $this->password;
    }

    public function CheckForm(){

        $message=false;
        if (!empty($this->name) AND !empty($this->firstname) AND !empty($this->email) AND !empty($this->phone) AND !empty($this->address) AND !empty($this->password) ) {
            $inscriptionOk=false;
            $mailExist=MailExist($this->email);
            //-----------------------------------------------------------
            if ((!$mailExist)) {
                InsertUser($this->name,$this->firstname,$this->email,$this->phone,$this->address,$this->key_chiffrement,$this->password);
                $inscriptionOk=TRUE;
            }
            else{
                $inscriptionOk=false;
            }
            //afficher les resultat en json
            $tab["inscriptionOk"]=$inscriptionOk;
            $tab["mailExist"]=$mailExist;

        }
        else{
            $message=TRUE;
            $tab["errorMessage"]=$message;
        }

        return (json_encode($tab));
    }
    public function __toString(){

        $out  = "<------------------Info User-----------------><br>";
        $out .= "<p> nom : ".$this->name."</p>";
        $out .= "<p> Prénom : ".$this->firstname."</p>";
        $out .= "<p> Mail : ".$this->mail."</p>";
        if (!empty($this->phone)) {
            $out .= "<p> phone : ".$this->phone."</p>";
        }
        $out .= "<p> address : ".$this->address."</p>";
        $out .= "<p> Key: ". $this->key_chiffrement ."</p>";
        $out .= "<p> Mot de passe: ". $this->password ."</p>";
        return $out;
    }
}
?>