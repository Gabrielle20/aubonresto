<?php
//----------------------------------------------------------------------------------------
/**
 * URL
 * @param : information à la base de donner (servername, dbname, username,password)
 * @return : une connexion a la bdd
 */

namespace Core\Database;

class ConnexionBDD{


    private $conn;

    public function __construct(){

        include ROOT."/Config/login_bdd.php";
        $this->conn = mysqli_connect($configBdd['servername'], $configBdd['username'], $configBdd['password'],$configBdd['dbname']);


    }
	public function ServerName(){
			return $this->servername;
	}
	public function DBName(){
			return $this->dbname;
	}
	public function UserName(){
			return $this->username;
	}
	public function Password(){
			return $this->password;
	}
	public function OpenCon()
	{
		if (!$this->conn){
			error_log("Connect failed");
		}
		$this->conn->set_charset('utf8');
 
		return $this->conn;
	}
	public function CloseCon($conn)
	{
		$conn -> close();
	}

	public function getResults($connexion,$request)
	 {

	    //Connexion à la base de données
	     $conn = $connexion;

	     $result = mysqli_query($conn,$request);
	     //fermeture de la connexion
	     
	     return $result;
	     $conn -> close();
	 }

	public function __toString(){
	    $out  = "<------------------Connxion à la BDD-----------------><br>";
	    $out .= "<p> ServerName : ".$this->servername ."</p>";
	    $out .= "<p> DBName : ".$this->dbname."</p>";
	    $out .= "<p> UserName : ".$this->username."</p>";
	    $out .= "<p> Password : ".$this->password."</p>";
	    return $out;
    }

}


?>