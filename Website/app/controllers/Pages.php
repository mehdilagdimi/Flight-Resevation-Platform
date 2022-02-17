<?php
    class Pages extends Controller{
        public function __construct(){
            $this->userModel = $this->model('User');
            $this->flightModel = $this->model('Model');
        }

            public function index(){ //you can get parsed params in every controller's methods after using call_user_func_array
            // echo "home page";
            $data = $this->UserModel->getFlights();
            $data = [
                'title' => 'Home',
                'name' => 'ARID'
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