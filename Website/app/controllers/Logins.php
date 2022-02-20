<?php
        class Login extends Controller{
            
            public function __construct(){
                $this->userModel = $this->model('User');
                $this->adminModel = $this->model('Admin');
            }

            public function index(){
                $this->verifyLogin();
            }

            public function verifyLogin(){
                if(isset($_POST['email'])){
                    if(!empty($checkAdmin = $this->adminModel->getAdmin($_POST['email'], $_POST['passw']))){ 
                        session_start();
                        $_SESSION['admin'] = $_POST['email'];
                        $_SESSION['loggedIn'] = true;  
                        $data = [
                            'Session user' => 'Admin',
                            'admin'  => $checkAdmin
                        ]; 
                        $this->view('dashboard/index', $data); 

                    } elseif (!empty($checkUser = $this->userModel->getUser($_POST['email'], $_POST['passw']))){
                        session_start();
                        $_SESSION['user'] = $_POST['email'];
                        $_SESSION['loggedIn'] = true;  
                        $data = [
                            'Session user' => 'Admin',
                            'admin'  => $checkAdmin
                        ]; 
                        $data = [
                            'Session user' => 'User',
                            'user'  => $checkUser
                        ];
                        $this->view('pages/index', $data); 

                    } else {
                        $_SESSION['loggedIn'] = false;
                        $this->view('pages/login', "User not found");
                    }
                }
             }
        }
?>