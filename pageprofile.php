<?php
include_once 'functions.php';
include_once './class/bdd/connexionbdd.php';
include_once './class/connexion/formconnexion.php';
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
        <div class="body">

        </div>
    </div>
<?php }else{
    header('Location: /index.php');
} ?>
</body>
</html>