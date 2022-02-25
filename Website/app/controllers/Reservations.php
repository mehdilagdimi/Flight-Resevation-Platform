<?php
    require_once "Flights.php";
    class Reservations extends Flights{
        public function __construct (){
            $this->reservModel = $this->model('Reservation');
            $this->userModel = $this->model('User');
        }

        //default
        public function index(){
            session_start();
    
            if(!$_SESSION['loggedIn']){
              
                $this->view('pages/login');
            }else {
                // echo "test";
                $this->showReservations();
            }
           
        }

        public function showReservations(){
            //display reservations
            // echo 
            $reservs = $this->reservModel->getReservs();
            $data = [
                'title' => 'List of reservations',
                'reservations' => $reservs 
            ];
            //  echo $_SESSION['privilege'];
            if($_SESSION['privilege'] == 'admin'){
                $this->view('dashboard/showReservations', $data);
                // echo 'test';
            } else {
                echo "user reservations view";
                $this->view('pages/reservations', $data);
            }
        }

        public function cancelReservation(){
            if (isset($_POST['delete'])){
                $id = $_POST['id_reserv'];
                $this->reservModel->deleteReserv($id);
            }
        }

        public function addReservation(){
           
            session_start();
            // echo $_POST['plane'];
            // echo $_SESSION["privilege"]; 
            if(isset($_SESSION["privilege"]) && isset($_POST['addreserv']) ){
                if($_SESSION["privilege"] == 'user'){
                    $userID = $_SESSION['userID']; // set this when logging in => change logins controller
                    $volID = $_POST['volID'];
                    $fName = $_POST['fName'];
                    $lName =  $_POST['lName'];
                    $birthDate = $_POST['birthDate'];
                    $goingComing =  $_POST['goingComing'];
                   
                    $passengerID = $this->userModel->addPassenger($userID, $fName, $lName, $brithDate);
                    // echo 'inside addflight in FLights contro';
                    
                    // echo "plane  $planeModel";
                    $this->userModel->addReservation($volID, $passengerID, $goingComing, $seatNum);           
                    // echo "plane ID $planeID";
                    //add method will return flight ID
                    // $volID = $this->flightModel->addFlight($planeID, $departureDate, $arrivalDate, $availableSeats, $price, $state);
                    
                    $airportID = $this->airportModel->getAirportID($airportFROM);
                    // echo "test h";
                    $this->flightModel->addDeparture($volID, $airportID);

                    $airportID = $this->airportModel->getAirportID($airportTO);
                    $this->flightModel->addDestination($volID, $airportID);
                }
            }
            $_POST = [];
            
            header("location:" . URLROOT ."flights/index");
            // $this->setReadableData();
          
    }
?>