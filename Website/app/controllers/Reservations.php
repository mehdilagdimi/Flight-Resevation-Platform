<?php
    class Reservations extends Flights{
        public function __construct (){
            $this->reservModel = $this->model('Reservation');
        }

        //default
        public function index(){
            $this->showReservations();
        }

        public function showReservations(){
            //display reservations
        }
    }
?>