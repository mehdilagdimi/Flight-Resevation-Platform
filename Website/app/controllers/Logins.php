<?php
        // $email = $_POST['email'];
        // echo $email;
        // echo "hello";
        // echo __FILE__;
        require_once "Flights.php";

        class Logins extends Controller{
            
            public function __construct(){
                $this->userModel = $this->model('User');
                $this->adminModel = $this->model('Admin');
                // $this->flightModel = $this->model('Flight');
                // $this->planeModel = $this->model('Plane');
                // $this->airportModel = $this->model('Airport');
            }

            public function index(){
                // echo "test 3";
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
                       $this->login($user, $header);

                    } elseif (!empty($checkUser = $this->userModel->getUser($_POST['email'], $_POST['passw']))){
                        // echo 'inside user test';
                        $user = 'user'; 
                        $header = 'pages/index';
                        $this->login($user, $header);

                    } else {
                        $_SESSION['loggedIn'] = false;
                        echo "Invalid login";
                        $this->view('pages/login', "User not found");
                    }
                }
                else {
                    // echo 'Enter an email to log in';
                    $this->view('pages/login');
                }
             }

             public function login($user, $header){
                        session_start();
                        // echo 'hello';
                        $_SESSION['privilege'] = $user;
                        $_SESSION["$user"] = $_POST['email'];
                        $_SESSION['loggedIn'] = true;  

                        // $flights = $this->flightModel->getFlights();
                        // $planes = $this->planeModel->getPlanes();
                        // $airports = $this->airportModel->getAirports();
                        // $departures = $this->flightModel->getDepartures();
                        // $destinations = $this->flightModel->getDestinations();
                        $flightsController = new Flights;
                        // $this->setReadableData();
                        $flightsController->setReadableData();
                        
                        // $user = ucwords()
                        // $data = [
                        //     'Session user' => ucwords("$user"),
                        //     'user'  => $checkUser,
                        //     'flights' => $flights,
                            // 'planes' => $planes,
                            // 'departures' => $departures,
                            // 'destinations' => $destinations
                        // ];
                        // echo "$header";
                        // $this->view("$header", $data); 
             }
             
             public function logout(){
                session_start();
                session_unset();
                session_destroy();
                // header("location: login.php");
                $this->view('pages/login');
             }

        }
?>