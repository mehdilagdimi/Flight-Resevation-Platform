<?php
    require_once "Planes.php";
//     require_once "Airports.php";

    // class Destinations extends Controller{
    //     public function __construct(){
    //         $this->flightModel = $this->model('Flight');
    //     }
    // }

    // class Departures extends Controller{
    //     public function __construct(){
    //         $this->flightModel = $this->model('Flight');
    //     }
    // }

    Class Flights extends Planes{
        public function __construct(){
            $this->flightModel = $this->model('Flight');
            $this->planeModel = $this->model('Plane');
            $this->airportModel = $this->model('Airport');
        }

        //default method is index and calling the one we need
        public function index(){
            // $this->showFlights();
            session_start();
            // if(!$_SESSION['loggedIn']){
            //     $this->view('pages/login');
            // }
            if(isset($_SESSION['loggedIn'])){
                if($_SESSION['loggedIn'] == true){
                    $this->setReadableData();
                } else {
                    $this->view('pages/login');
                }
            }
        }

        public function showFlights($flights){
            //Display flights
            // $flights = $this->flightModel->getFlights();
            $data = [
                'Session user' => ucwords($_SESSION['privilege']),
                // 'user'  => $checkUser,
                'flights' => $flights
            ];
            
            // $this->view('pages/index', $data);
            if($_SESSION['privilege'] == 'admin'){
                $this->view('dashboard/index', $data);
            } else {
                $this->view('pages/index', $data);
            }

        }


        public function setReadableData(){

            $flights = $this->flightModel->getFlights();
            $planes = $this->planeModel->getPlanes();
            $airports = $this->airportModel->getAirports();
            $departures = $this->flightModel->getDepartures();
            $destinations = $this->flightModel->getDestinations();

            foreach ($flights as $flight){
                foreach($planes as $plane){
                    if($flight->planeID == $plane->planeID){
                        $flight->plane = $plane->model;
                    }
                }
                foreach($departures as $departure){
                    if($flight->volID == $departure->volID){
                        foreach($airports as $airport){
                            if($departure->airportID == $airport->airportID){
                                $flight->departureAdress = $airport->airportAdress;
                            }
                        }
                    }
                }
                foreach($destinations as $destination){
                    if($flight->volID == $destination->volID){
                        foreach($airports as $airport){
                            if($destination->airportID == $airport->airportID){
                                $flight->destinationAdress = $airport->airportAdress;
                            }
                        }
                    }
                }

            }
            $this->showFlights($flights);
         }

         public function addFlight(){
            // echo $phone.' | '. $email.' | '. $birthDate.' | '. $passw;
            // return; //     echo"<pre>";
            //     print_r($_POST);
            //     return;
            // if(){
           
            // }
           

            session_start();
            // echo $_POST['plane'];
            // echo $_SESSION["privilege"]; 
            if(isset($_SESSION["privilege"]) && isset($_POST['saveflight']) ){
                if($_SESSION["privilege"] == 'admin'){
                    // echo 'inside addflight in FLights contro';
                    $planeModel = $_POST['plane'];
                    $departureDate =  $_POST['id_departDate'];
                    $arrivalDate = $_POST['id_arrivalDate'];
                    $airportFROM = $_POST['id_airportFROM'];
                    $airportTO = $_POST['id_airportTO'];
                    $state = $_POST['id_state'];
                    $availableSeats = $_POST['id_seats'];
                    $price = $_POST['id_price'];

                    // echo "plane  $planeModel";
                    $planeID = $this->planeModel->getPlaneID($planeModel);           
                    // echo "plane ID $planeID";
                    //add method will return flight ID
                    $volID = $this->flightModel->addFlight($planeID, $departureDate, $arrivalDate, $availableSeats, $price, $state);
                    
                    $airportID = $this->airportModel->getAirportID($airportFROM);
                    // echo "test h";
                    $this->flightModel->addDeparture($volID, $airportID);

                    $airportID = $this->airportModel->getAirportID($airportTO);
                    $this->flightModel->addDestination($volID, $airportID);
                }
            }
            $_POST = [];
            $this->setReadableData();
            
        }

         public function deleteFlight(){
            if (isset($_POST['delete'])){
                $id = $_POST['id_vol'];
                // echo " test delete $id"; 
                $this->flightModel->deleteFlight($id);
            }
         }

         public function updateFlight(){
            if (isset($_POST['delete'])){
                $id = $_POST['id_vol'];
                $this->flightModel->deleteFlight($id);
            }
         }

    }
