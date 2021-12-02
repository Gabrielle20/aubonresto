<?php

namespace App\Controller;

use App\Reservation;
use Core\Controller\DefaultController;

class ReservationController extends DefaultController
{

    public function formIndex(){
        $this->render("Reservations/save" );
    }

    public function allMyReservIndex(){
        $this->render("Reservations/index" );
    }

    public  function addReservation($idUser, $params){
        $reservation = new Reservation($_SESSION['id_user']) ;
        $result = $reservation->addReservation($params);

        return $result;

    }

}