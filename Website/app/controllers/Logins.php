<?php
        // $email = $_POST['email'];
        // echo $email;
        // echo "hello";
        // echo __FILE__;
        // require_once "Flights.php";

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
                // $user; 
                // $header;
                if(isset($_POST['email'])){
                    // echo 'test';
                    if(!empty($checkAdmin = $this->adminModel->getAdmin($_POST['email'], $_POST['passw']))){ 
                        // echo 'inside admin test';
                        $user = 'admin'; 
                        $userID = $checkAdmin[0]->adminID;
                        // $header = 'dashboard/index';
                       $this->login($user, $userID);

                    } elseif (!empty($checkUser = $this->userModel->getUser($_POST['email'], $_POST['passw']))){
                        // echo 'inside user test';
                        $user = 'user';
                        // echo $checkUser[0]->userID;
                        $userID = $checkUser[0]->userID; 
                        // echo $userID;
                        // $header = 'pages/index';
                        $this->login($user, $userID);

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

             public function login($user, $userID){
                        // session_start();
                        // echo 'hello';
                        $_SESSION['privilege'] = $user;
                        $_SESSION["$user"] = $_POST['email'];
                        $_SESSION['loggedIn'] = true;  
                        $_SESSION['userID'] = $userID;

                        // $flights = $this->flightModel->getFlights();
                        // $planes = $this->planeModel->getPlanes();
                        // $airports = $this->airportModel->getAirports();
                        // $departures = $this->flightModel->getDepartures();
                        // $destinations = $this->flightModel->getDestinations();
                        // $flightsController = new Flights;
                        // $this->setReadableData();
                        // $flightsController->setReadableData();
                        header("location:" . URLROOT . "flights/index");
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
                setcookie('localthost', time() - 3600);
                header("location:" . URLROOT . "logins"); 
                // $this->view('pages/login');
             }

        }
?>