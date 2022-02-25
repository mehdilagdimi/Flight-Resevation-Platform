<?php
    require_once "Flights.php";
    class Reservations extends Flights{
        public function __construct (){
            $this->reservModel = $this->model('Reservation');
        }

        //default
        public function index(){
            session_start();
    
            if(!$_SESSION['loggedIn']){
              
                $this->view('pages/login');
            }else {
                // echo "test";
                $this->showReservations();
            }
           
        }

        public function showReservations(){
            //display reservations
            // echo 
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
                echo "user reservations view";
                $this->view('pages/reservations', $data);
            }
        }

        public function cancelReservation(){
            if (isset($_POST['delete'])){
                $id = $_POST['id_reserv'];
                $this->reservModel->deleteReserv($id);
            }
        }

    }
?>