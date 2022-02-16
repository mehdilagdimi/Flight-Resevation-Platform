<?php
    class Users extends Controller{
        public function __construct(){
            $this->userModel = $this->model('User');
            $this->adminModel = $this->model('Admin');
        }

        //call showUsers because index is set up as default method so to make showUsers as default when requesting from Users class
        public function index(){
            $this->showUsers();
            // echo 'hello from users controller';
        }

        public function showAdmins(){
            $admins = $this->adminModel->getAdmins();
            $data = [
                'title' => 'List of admins',
                'admins' => $admins
            ];
        }

        public function showUsers(){
            $users = $this->userModel->getUsers();
            $data = [
                'title' => 'Users Page',
                'users' => $users
            ];
            $this->view('users/showUsers', $data);
        }

        public function showGuests(){
            //??
        }
    }
?>