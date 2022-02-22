<?php
    class Users extends Controller{
        public function __construct(){
            $this->userModel = $this->model('User');
            $this->adminModel = $this->model('Admin');
        }

        //call showUsers because index is set up as default method so to make showUsers as default when requesting from Users class
        public function index(){
            session_start();
            if(!$_SESSION['loggedIn']){
                $this->view('pages/login');
            }
            if($_SESSION['privelege'] == 'admin'){
                $this->showUsers();
            } else {
                $this->view('pages/index');
            }
            // echo 'hello from users controller';
        }

        public function showAdmins(){
            $admins = $this->adminModel->getAdmins();
            $data = [
                'title' => 'List of admins',
                'admins' => $admins
            ];

            $this->view('dashboard/showAdmins', $data);
        }

        public function showUsers(){
            $users = $this->userModel->getUsers();
            $data = [
                'title' => 'List of registered users',
                'users' => $users
            ];
            
            // $this->view('users/showUsers', $data);
            $this->view('dashboard/showUsers', $data);
        }

        protected function setPassword(){
            //
        }


        // public function showGuests()
        // public function showGuests(){
        //     //??
        // }
    }
?>