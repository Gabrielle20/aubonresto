<?php
namespace App;
use Core\Database\ConnexionBDD;

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
				$ConnexionOk = false;
 				$UserExist=$this->verifUser($this->login,$this->password);
				 //-----------------------------------------------------------
				if ($UserExist){
					$ConnexionOk=TRUE;
				}else{
					$ConnexionOk=false;
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
	// function qui vérifie si l'utilisateur est bien inscris
	function verifUser($login,$password){
		$ConnexionBDD = New ConnexionBDD ();
		$conn = $ConnexionBDD->OpenCon();

		$request =  ("SELECT COUNT(*) FROM users WHERE email_user='$login' AND pass_user='$password'");

		$result = $ConnexionBDD->getResults($conn,$request);
		while($row= $result->fetch_row()){
			for ($i=0; $i <sizeof($row) ; $i++) {
				if ($row[0] == 1) {
					return TRUE;
				} else {
					return false;
				}
			}
		}

	}
	public function __toString(){

        $out  = "<------------------Info User-----------------><br>";
        $out .= "<p> Login : ".$this->login."</p>";
        $out .= "<p> Mot de passe: ". $this->password ."</p>";
        return $out;
    }

}



?>
