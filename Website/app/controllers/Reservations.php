<?php
    require_once "Flights.php";
    class Reservations extends Flights{
        public function __construct (){
            $this->reservModel = $this->model('Reservation');
        }

        //default
        public function index(){
            session_start();
            if(!$_SESSION['loggedIn']){
                $this->view('pages/login');
            }
            $this->showReservations();
        }

        public function showReservations(){
            //display reservations

            $reservs = $this->reservModel->getReservs();
            $data = [
                'title' => 'List of reservations',
                'reservations' => $reservs 
            ];

            $this->view('dashboard/showReservations', $data);
        }
    }
?>