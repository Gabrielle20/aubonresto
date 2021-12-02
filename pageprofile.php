<?php
include_once 'functions.php';
include_once './class/bdd/connexionbdd.php';
use App\FormConnexion;
?>
<html>
<?php include('./Templates/headHtml.html');?>
<body>
<?php
if(isset($_SESSION["id_user"])){

    include('./Templates/nav.php');?>

    <div class="row">
        <div class="leftSideBar">
            <?php include('./Templates/sidebar.php');?>
        </div>
        <div class="infoUserBody">
            <img class="imgProfil" src="./images/bonAppetit.jpg">

        </div>
    </div>
<?php }else{
    header('Location: /index.php');
} ?>
<?php include "./Templates/footerHtml.html"?>
</body>
</html>