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

        public function deletePlane(){
            if (isset($_POST['delete'])){
                $id = $_POST['id_plane'];
                $this->planeModel->deletePlane($id);
            }
         }
    }

?>