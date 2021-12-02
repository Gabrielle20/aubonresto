<?php
define("ROOT", __DIR__);
include_once "../App/Reservation.php"; 
$reservation = new Reservation($_SESSION['id_user']) ; 
$reservation->addReservation($_POST); 
$reservation->getReservations(); 

