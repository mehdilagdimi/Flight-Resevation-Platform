<?php

    class Pages extends Controller{
        public function __construct(){
            $this->userModel = $this->model('User');
            $this->flightModel = $this->model('Flight');
        }

        public function index(){ //you can get parsed params in every controller's methods after using call_user_func_array
            // echo "home page";
            $flights = $this->flightModel->getFlights();
            $data = [
                'title' => 'Home',
                'flights' => $flights
            ];
                            
            if(isset($_SESSION['admin'])){
                // $this->view('pages/index', $data);
                $this->view('pages/index', $data);
                header ("location : ./../../dashboard/index.php");
            }
            if(isset($_SESSION['user'])){
                  // $this->view('pages/index', $data);
                $this->view('pages/index', $data);
                header ("location : ./../../pages/index.php");
            }

            $this->view('pages/login');
        
        }


        public function signup(){
            //sign in
            $this->view('pages/signup');
        }

        public function login(){
            $this->view('pages/login');
        }
        
        public function contact(){
            // echo 'contact page';
            $this->view('pages/contact');
        }

    }
?>