<?php
    class Pages extends Controller{
        public function __construct(){
            $this->userModel = $this->model('User');
        }

        public function index(){ //you can get parsed params in every controller's methods after using call_user_func_array
            // echo "home page";
            $data = [
                'title' => 'Home',
                'name' => 'ARID'
            ];

            // $this->view('pages/index', $data);
            $this->view('pages/index');
        }
        public function home(){
            $this->view('pages/home');
        }

        public function flights(){
            //display flights page
        }
        public function contact(){
            // echo 'contact page';
            $this->view('pages/contact');
        }

    }
?>