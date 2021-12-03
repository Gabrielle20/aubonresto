<?php
include_once "./App/Reservation.php"; 
if(!empty($_SESSION['id_user']))
{
    $reservation = new Reservation($_SESSION['id_user']); 
    $reservations_list = $reservation->getReservations(); 
}
else{
    header('Location: /RedirectionReservation.php');
}