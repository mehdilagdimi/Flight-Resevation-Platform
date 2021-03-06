<?php
    class User extends Model{
        // private $db;
        
        // public function __construct(){
        //     $this->db = new Database;
        // }
        //specify which DB table
        // private $email;
        // private $passw;
        public $id;
        public $passengerID;
        protected $phone;
        protected $email;
        protected $birthDate;
        protected $passw;


        public function __construct(){
            parent::__construct();
            $this->table = 'users';
        }

        public function getUsers(){
            // $this->db->query("SELECT * FROM users");
            // $result = $this->db->resultSet();
            return $this->getTable();
        }
        public function getPassengers(){
            $this->table = 'passengers';
            $results = $this->getTable();
            $this->table = 'users';
            return $results;
        }

    
        public function addPassenger($userID, $volID, $fName, $lName, $birthDate){
            $this->table = 'passengers';
            $this->db->query("INSERT INTO $this->table (userID, volID, fName, lName, birthDate) VALUES ('$userID', '$volID', '$fName', '$lName', '$birthDate') ");      
            $this->db->execute();
            $this->id = 'passengerID';
            $this->passengerID = $this->getRecordHighestID($this->id);
            $this->table = 'users';
            return $this->passengerID;
        }
     
        public function addUser($phone, $email, $birthDate, $passw){
            // echo $phone.' | '. $email.' | '. $birthDate.' | '. $passw;
            // return;
            $this->db->query("INSERT INTO $this->table (phone, email, birthDate, passw) VALUES ('$phone', '$email', '$birthDate', '$passw') ");
            $this->db->execute();
        }

        public function getUser($email, $passw){

                $this->db->query("SELECT * FROM $this->table WHERE email = '$email' AND passw = '$passw' ");
                $result = $this->db->resultSet();
                return $result;
        }

        public function deleteUser($userID){
            $this->db->query("DELETE FROM $this->table WHERE userID='$userID'");
            $this->db->execute();
        }
        public function deletePassenger($id){
            $this->table = 'passengers';
            $this->db->query("DELETE FROM $this->table WHERE passengerID='$id'");
            $this->db->execute();
            $this->table = 'users';

        }
    }
?> 
