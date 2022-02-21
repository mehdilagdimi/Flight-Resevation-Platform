<?php
    require_once "Planes.php";
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
            $flights = $this->flightModel->getFlights();
            $data = [
                'title' => 'List of flights',
                'flights' => $flights
            ];
            
            // $this->view('pages/index', $data);
            $this->view('dashboard/index', $data);
        }
    } 
?>