<?php
use Core\Database\ConnexionBDD;
use App\FormConnexion;

if(isset($_SESSION["id_user"])){?>

    <div class="row">
        <div class="leftSideBar">
            <?php include(ROOT.'/Templates/sidebar.php');?>
        </div>
        <div class="body">
            <?= $content ?>
        </div>
    </div>
<?php }else{
    header('Location: /index.php');
} ?>