<?php
    Class Planes extends Controller{
        public function __construct(){
            $this->planeModel = $this->model('Plane');
        }

    //default method
        public function index(){
            $this->showPlanes();
        }

        public function showPlanes(){
            //display planes
            $planes = $this->planeModel->getPlanes();
            $data = [
                'title' => "List of planes",
                'planes' => $planes
            ];

            $this->view('dashboard/showPlanes', $data); 
        }
    }

?>