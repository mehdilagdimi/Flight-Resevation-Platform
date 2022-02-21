<?php
        // $email = $_POST['email'];
        // echo $email;
        // echo "hello";
        // echo __FILE__;
        class Logins extends Controller{
            
            public function __construct(){
                $this->userModel = $this->model('User');
                $this->adminModel = $this->model('Admin');
                $this->flightModel = $this->model('Flight');
                $this->planeModel = $this->model('Plane');
                $this->airportModel = $this->model('Airport');
            }

            public function index(){
                $this->verifyLogin();
            }

            // public function testlogin(){
            //     $this->view("pages/testlogin");
            // }
            public function verifyLogin(){
                // echo 'hello';
                // echo $_POST['email']; 
                // echo (isset($_POST['email']));
                $user; 
                $header;
                if(isset($_POST['email'])){
                    // echo 'test';
                    if(!empty($checkAdmin = $this->adminModel->getAdmin($_POST['email'], $_POST['passw']))){ 
                        // echo 'inside admin test';
                        $user = 'admin'; 
                        $header = 'dashboard/index';
                       $this->login($user, $header, $checkAdmin);

                    } elseif (!empty($checkUser = $this->userModel->getUser($_POST['email'], $_POST['passw']))){
                        // echo 'inside user test';
                        $user = 'user'; 
                        $header = 'pages/index';
                        $this->login($user, $header, $checkUser);

                    } else {
                        $_SESSION['loggedIn'] = false;
                        $this->view('pages/login', "User not found");
                    }
                }
             }

             public function login($user, $header, $checkUser){
                        session_start();
                        // echo 'hello';
                        $_SESSION["$user"] = $_POST['email'];
                        $_SESSION['loggedIn'] = true;  

                        $flights = $this->flightModel->getFlights();
                        $planes = $this->planeModel->getPlanes();
                        $airports = $this->airportModel->getAirports();
                        $departures = $this->flightModel->getDepartures();
                        $destinations = $this->flightModel->getDestinations();

                        $this->setReadableData($flights, $departures, $destinations, $airports, $planes);
                        
                        // $user = ucwords()
                        $data = [
                            'Session user' => ucwords("$user"),
                            'user'  => $checkUser,
                            'flights' => $flights,
                            // 'planes' => $planes,
                            // 'departures' => $departures,
                            // 'destinations' => $destinations
                        ];
                        // echo "$header";
                        $this->view("$header", $data); 
             }
             
             public function setReadableData($flights, $departures, $destinations, $airports, $planes){
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
             }
        }
?>