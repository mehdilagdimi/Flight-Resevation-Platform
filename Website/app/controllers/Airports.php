<?php
    Class Airports extends Controller{
        public function __construct(){
            $this->airportModel = $this->model('Airport');
        }

    //default method
        public function index(){
            session_start();
            if(isset($_SESSION['loggedIn'])){
                if(!$_SESSION['loggedIn']){
                    $this->view('pages/login');
                }
                if($_SESSION['privilege'] == 'admin'){
                    $this->showAirports();
                }
            } 
            // else {
            //     $this->view('pages/login');
            // }
          
        }

        public function showAirports(){
            //display planes
            $airports = $this->airportModel->getAirports();
            $data = [
                'title' => "List of planes",
                'airports' => $airports
            ];

            $this->view('dashboard/showAirports', $data); 
        }

        public function deleteAirport(){
            if (isset($_POST['delete'])){
                $id = $_POST['id_airport'];
                $this->airportModel->deleteUser($id);
            }
         }
    }

?>