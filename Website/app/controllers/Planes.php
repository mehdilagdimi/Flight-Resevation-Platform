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
        }
    }

?>