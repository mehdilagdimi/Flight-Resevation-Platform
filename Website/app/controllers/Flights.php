<?php
    require_once "Planes.php";

    class Destinations extends Controller{
        public function __construct(){
            $this->flightModel = $this->model('Flight');
        }
    }

    class Departures extends Controller{

    }

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

         public function addFlight($phone, $email, $birthDate, $passw){
            // echo $phone.' | '. $email.' | '. $birthDate.' | '. $passw;
            // return;
            $this->db->query("INSERT INTO $this->table (phone, email, birthDate, passw) VALUES ('$phone', '$email', '$birthDate', '$passw') ");
            $this->db->execute();
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
?>