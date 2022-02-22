<?php
    Class Airports extends Controller{
        public function __construct(){
            $this->airportModel = $this->model('Airport');
        }

    //default method
        public function index(){
            $this->showAirports();
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
    }

?>