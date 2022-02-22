<?php
    require_once "Planes.php";
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
            if($_SESSION['privilege'] == 'admin'){
                $this->setReadableData();
            } else {
                $this->view('pages/index');
            }
        }

        public function showFlights($flights){
            //Display flights
            // $flights = $this->flightModel->getFlights();
            $data = [
                'Session user' => ucwords($_SESSION['privilige']),
                // 'user'  => $checkUser,
                'flights' => $flights
            ];
            
            // $this->view('pages/index', $data);
            if($_SESSION['privelege'] = 'admin'){
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
    } 
?>