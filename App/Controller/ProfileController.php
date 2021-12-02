<?php

namespace App\Controller;
use App\Article;
use Core\Controller\DefaultController;
use Core\Database\ConnexionBDD;

class ProfileController extends DefaultController
{

    public function index($content = null){
        $this->render("Profile/baseProfile", array(
            'content'=> $content != null ? $content : ''
        ));

    }
    public function infoUser(){
        $session=$_SESSION['id_user'];

        $ConnexionBDD = New ConnexionBDD ();
        $conn = $ConnexionBDD->OpenCon();

        $request=("SELECT * FROM users WHERE id_user='$session'");
        $data= $ConnexionBDD->getResults($conn,$request);
        while ($row = $data -> fetch_array(MYSQLI_NUM)) {

            $name=$row[2];
            $firstname=$row[3];
            $email=$row[4];
            $phonenumber=$row[5];
            $address=$row[6];
        }

        $content = $this->getHtmlBody("Profile/infosUser", array(
            'name' => $name,
            'firstname' => $firstname,
            'email' => $email,
            'phonenumber' => $phonenumber,
            'address' => $address
        ) );

        $this->index($content);


    }

    public function getHtmlBody(string $pathView, array $params = [])
    {
        ob_start();
        extract($params);
        require ROOT."/templates/$pathView.php";
        $content = ob_get_clean();

        return $content;
    }

    public function getAll(){

        $content = $this->getHtmlBody('Articles/all_products', array(
            'articles' => (new Article())->getAll()
        ));

        $this->index($content);
    }

    public function newProduct(){
        $content = $this->getHtmlBody('Articles/new_product');
        $this->index($content);
    }

}