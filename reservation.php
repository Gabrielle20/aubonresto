<?php
define("ROOT", __DIR__);
include_once "./App/Reservation.php"; 
$reservation = new Reservation(1) ; 
$reservation->addReservation($_POST); 
$reservation->getReservations(); 

