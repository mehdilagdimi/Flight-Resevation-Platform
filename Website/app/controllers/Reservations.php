<?php
    require_once "Flights.php";
    class Reservations extends Flights{
        public function __construct (){
            $this->reservModel = $this->model('Reservation');
            $this->userModel = $this->model('User');
            $this->flightModel = $this->model('Flight');
        }

        //default
        public function index(){
            // session_start();
            if(isset($_SESSION['loggedIn'])){

                if(!$_SESSION['loggedIn']){
                
                    header("location:" . URLROOT . "logins");
                }else {
                    // echo "test";
                    $this->showReservations();
                }
            } else {
                // echo "test";
                header("location:" . URLROOT . "logins");
            }
        }
           

        public function showReservations(){
            //display reservations
            // echo 
            // session_start();
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
                // echo "user reservations view";
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
           
            // session_start();
            // echo $_POST['plane'];
            // echo $_SESSION["privilege"]; 
            if(isset($_SESSION["privilege"]) && isset($_POST['addReservation']) ){
                if($_SESSION["privilege"] == 'user'){
                    $volID = $_POST['volID'];
                    //verify availabel seats
                    $flight = $this->flightModel->getSpecific('volID', $volID);
                    $numOfReserv = 1; //default is one, otherwise it is dependant on how many reservation the user wants to book
                    echo $flight[0]->availableSeats;
                    if($flight[0]->availableSeats == 0 ){
                        $_POST = [];
                        echo "No seat is available on this flight. Choose another one";
                        return;
                    }
                    // echo "hello";
                    // echo $volID;
                    else { for($i = 0; $i <=  $numOfReserv; $i++)
                        $userID = $_SESSION['userID']; // set this when logging in => change logins controller
                        $volID = $_POST['volID'];
                        $fName = $_POST['fName'];
                        $lName =  $_POST['lName'];
                        $birthDate = $_POST['birthDate'];
                        $seatNum = $_POST['seatNum'];
                        // $goingComing =  $_POST['goingComing'] = 'going'; //default value change it dynamically according to form
                        $goingComing = 'going';
                        // echo "testing going coming POST" . $_POST['goingComing'];

                        if($_POST['type'] == 'roundTrip'){
                            // if($_SESSION['roundTrip'] == 'going'){
                                $_SESSION['roundTrip'] = true;
                            // }
                        } else {
                            $_SESSION['roundTrip'] = false;
                        }                
                    
                        $passengerID = $this->userModel->addPassenger($userID, $volID, $fName, $lName, $birthDate);
                        // echo 'inside addflight in FLights contro';
                        
                        // echo "plane  $planeModel";
                        
                        $this->reservModel->addReservation($passengerID, $goingComing, $seatNum);           

                        }
                        // $airportID = $this->airportModel->getAirportID($airportTO);
                        // $this->flightModel->addDestination($volID, $airportID);
                    }
            }
            $_POST = [];
            
            header("location:" . URLROOT ."reservations/showReservations");
            // $this->setReadableData();
          
        }
    }
?>