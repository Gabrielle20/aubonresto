<?php

namespace App\Controller;

use App\Reservation;
use Core\Controller\DefaultController;

class ReservationController extends DefaultController
{

    public function formIndex(){
        if(!isset($_SESSION['id_user'])){
            $this->render('Reservations/RedirectionReservation');
        }
        else{
            $this->render("Reservations/save" );
        }
    }

    public function allMyReservIndex(){
        $reservation = new Reservation($_SESSION['id_user']);
        $reservations_list = $reservation->getReservations();
        $this->render("Reservations/index" , array(
            'reservations'=> $reservations_list
        ));
    }

    public  function addReservation($idUser, $params){
        $reservation = new Reservation($_SESSION['id_user']) ;
        $result = $reservation->addReservation($params);

        return $result;

    }

}