<?php
    Class Airports extends Controller{
        public function __construct(){
            $this->airportModel = $this->model('Airport');
        }

    //default method
        public function index(){
            // session_start();
            if(isset($_SESSION['loggedIn'])){
                if(!$_SESSION['loggedIn']){
                    header("location:" . URLROOT . "logins");
                }
                if($_SESSION['privilege'] == 'admin'){
                    $this->showAirports();
                }
            } else {
                header("location:" . URLROOT . "logins");
            }
            // else {
            //     $this->view('pages/login');
            // }
          
        }
        
        // public function getAirports(){

        // }

        public function showAirports(){
            //display planes
            $airports = $this->airportModel->getAirports();
            $data = [
                'title' => "List of airports",
                'airports' => $airports
            ];

            if(isset($_SESSION['loggedIn'])){
                if($_SESSION['privilege'] == 'admin'){
                    $this->view('dashboard/showAirports', $data); 
                } else {
                    $this->view('pages/index', $data);
                    // return $data;
                }
             }
            }
         

        public function deleteAirport(){
            if (isset($_POST['delete'])){
                $id = $_POST['id_airport'];
                $this->airportModel->deleteUser($id);
            }
         }
    }

?>