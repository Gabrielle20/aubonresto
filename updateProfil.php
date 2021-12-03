<?php

define("ROOT", __DIR__);
include_once "./App/User.php";

$data = new User();


if (!empty($_GET) && isset($_GET['editUser']) && is_numeric($_GET['editUser'])) {
    $infosUser = $data->editProfil($_POST, $_GET['editUser']);

    include ROOT."/Templates/editProfil.php";
}
?>