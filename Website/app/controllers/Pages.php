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

            // $this->view('pages/index', $data);
            $this->view('pages/index', $data);
        
        }


        public function signin(){
            //sign in
            $this->view('pages/signIn', $data);
        }

        public function login(){
            $this->view('pages/login', $data);
        }
        
        public function contact(){
            // echo 'contact page';
            $this->view('pages/contact');
        }

    }
?>