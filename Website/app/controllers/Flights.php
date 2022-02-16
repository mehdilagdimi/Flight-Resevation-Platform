<?php
    Class Flights extends Planes{
        public function __construct(){
            $this->flightModel = $this->model('Flight');
        }

        //default method is index and calling the one we need
        public function index(){
            $this->showFlights();
        }

        public function showFlights(){
            //Display flights
        }
    }
?>