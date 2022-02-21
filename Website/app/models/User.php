<?php
    class User extends Model{
        // private $db;
        
        // public function __construct(){
        //     $this->db = new Database;
        // }
        //specify which DB table
        // private $email;
        // private $passw;

        public function __construct(){
            parent::__construct();
            $this->table = 'users';
        }

        public function getUsers(){
            // $this->db->query("SELECT * FROM users");
            // $result = $this->db->resultSet();
            return $this->getTable();
        }

        public function setUsers(){
            
        }

        public function getUser($email, $passw){

                $this->db->query("SELECT * FROM $this->table WHERE email = '$email' AND passw = '$passw' ");
                $result = $this->db->resultSet();
                return $result;
        }
    }
?> 
