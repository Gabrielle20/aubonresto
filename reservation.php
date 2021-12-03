<?php
define("ROOT", __DIR__);
include_once "./App/Reservation.php"; 
if(!empty($_SESSION['id_user']))
{
    $reservation = new Reservation($_SESSION['id_user']) ; 
    $reservation->addReservation($_POST); 
}