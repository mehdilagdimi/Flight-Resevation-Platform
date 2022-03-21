<?php
    class Users extends Controller{
        public function __construct(){
            $this->userModel = $this->model('User');
            $this->adminModel = $this->model('Admin');
        }

        //call showUsers because index is set up as default method so to make showUsers as default when requesting from Users class
        public function index(){
            // echo 'test new';
            // session_start();
            if(isset($_SESSION['loggedIn'])){
                if(!$_SESSION['loggedIn']){
                    header("location:" . URLROOT . "logins");
                }
                if($_SESSION['privilege'] == 'admin'){
                    $this->showUsers();
                }
            } else {
                header("location:" . URLROOT . "logins");
            }
            // else {
            //     $this->view('pages/index');
            // }
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

        public function deletePassenger(){
            if (isset($_POST['cancel']) || isset($_POST['delete'])){
                $id = $_POST['id_passenger'];
                $this->userModel->deletePassenger($id);
            }
            header("location:" . URLROOT . "reservations");
        }
        public function signup(){
            // echo 'hazma';
            session_start();
            // session_unset();
            session_destroy();
            session_start();

            if(isset($_POST['email'])){
                // echo 'add user';
                $this->userModel->addUser($_POST['phone'], $_POST['email'], $_POST['birthdate'], $_POST['passw']);
            }
            $this->view('pages/login');
         }

         public function deleteUser(){
            if (isset($_POST['delete'])){
                $id = $_POST['id_user'];
                $this->userModel->deleteUser($id);
            }
         }
        // public function showGuests()
        // public function showGuests(){
        //     //??
        // }
    }
?>