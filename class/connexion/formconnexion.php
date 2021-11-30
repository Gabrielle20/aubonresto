<?php
include_once 'functions.php';

class FormConnexion{

	private $login;
	private $password;



	public function __construct(string $login, string $password){	

		$this->login = $login;
		$this->password = $password;

	}
	public function GetLogin(){
		return $this->login;
	}
	public function GetPassword(){
		return $this->password;
	}

 	public function CheckForm(){
 			
 			$message=false;
			if (!empty($this->login) AND !empty($this->password) ) {
				$ConnexionOk=false;
 				$UserExist=verifUser($this->login,$this->password);
				 //-----------------------------------------------------------
				if ($UserExist){
					$ConnexionOk=TRUE;
				}
				//afficher les resultat en json
			      $tab["ConnexionOk"]=$ConnexionOk;
			      $tab["UserExist"]=$UserExist;
				
			}
			else{
				$message=TRUE;
				$tab["errorMessage"]=$message;
				
			}
			
			return (json_encode($tab));
	}
	public function __toString(){

        $out  = "<------------------Info User-----------------><br>";
        $out .= "<p> Login : ".$this->login."</p>";
        $out .= "<p> Mot de passe: ". $this->password ."</p>";
        return $out;
    }

}



?>
