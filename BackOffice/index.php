<html>

<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/Templates/headHtml.html');
define("ROOT", __DIR__);
if(!isset($_SESSION['type_user']) || $_SESSION['type_user'] != 'admin'){
    header("Location: ./connexion.php");
}
?>



<body>

<div><?php include($_SERVER['DOCUMENT_ROOT'].'/Templates/nav.php');?></div>

<?php include($_SERVER['DOCUMENT_ROOT'].'/Templates/sidebar.php');?>




<?php include($_SERVER['DOCUMENT_ROOT'].'/Templates/footerHtml.html')?>



</body>



</html>
