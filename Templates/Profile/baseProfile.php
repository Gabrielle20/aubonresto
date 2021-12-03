<?php
use Core\Database\ConnexionBDD;
use App\FormConnexion;

if(isset($_SESSION["id_user"])){?>

    <div style="display:flex; ">
        <div class="leftSideBar ">
            <?php include(ROOT.'/Templates/sidebar.php');?>
        </div>
        <div>
            <?= $content ?>
        </div>
    </div>
<?php }else{
    header('Location: /index.php');
} ?>