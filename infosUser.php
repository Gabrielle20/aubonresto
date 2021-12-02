<?php
include_once 'functions.php';
use Core\Database\ConnexionBDD;
use App\FormConnexion;
?>
<html>
<?php include('./Templates/headHtml.html');?>
<body>
<?php
if(isset($_SESSION["id_user"])){
    //Recuperer les informations de l'utilisateur
    $session=$_SESSION['id_user'];

    $ConnexionBDD = New ConnexionBDD ();
    $conn = $ConnexionBDD->OpenCon();

    $request=("SELECT * FROM users WHERE id_user='$session'");
    $data= $ConnexionBDD->getResults($conn,$request);
    while ($row = $data -> fetch_array(MYSQLI_NUM)) {
        $id_user=$row[0];
        $name=$row[2];
        $firstname=$row[3];
        $email=$row[4];
        $phonenumber=$row[5];
        $address=$row[6];
    }
    include('./Templates/nav.php');?>

    <div class="row">
        <div class="leftSideBar">
            <?php include('./Templates/sidebar.php');?>
        </div>
        <div class="infoUserBody">
            <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
                <div class="cardUser p-4">
                    <div class=" image d-flex flex-column justify-content-center align-items-center">
                        <button class="btnCardUser btn-secondary">
                            <img class="imgCard" src="/images/profil.png" height="100" width="100" />
                        </button> <span class="name mt-3"><?= $name." ".$firstname; ?></span>
                        <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                            <span class="idd"><strong>Adresse mail: </strong><?= $email; ?></span>
                        </div>
                        <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                            <span class="idd"><strong>Numéro de téléphone: </strong>  0<?= $phonenumber; ?></span>
                        </div>
                        <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                            <span class="idd"><strong>Adresse: </strong><?= $address; ?></span>
                        </div>
                        <div class=" d-flex mt-2">
                            <a href="../updateProfil.php?editUser=<?= $id_user ?>" class="btn1 btn-dark">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }else{
    header('Location: /index.php');
} ?>

<?php include "./Templates/footerHtml.html"?>
</body>
</html>