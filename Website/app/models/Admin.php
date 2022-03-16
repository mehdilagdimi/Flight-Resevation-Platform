<?php
    require_once ('User.php');
    
    Class Admin extends User{
        private $fName;
        private $lName;

        public function __construct(){
            parent::__construct();
            $this->table = 'admins';
        }

        public function getAdmins(){
            return $this->getTable();
        }
        
        //add parameters for specific querying
        public function getAdmin($email, $passw){
            // $this->db->query("SELECT * FROM $this->table WHERE email = '$email' AND passw = '$passw'" );
            $this->db->query("SELECT * FROM $this->table WHERE email = '$email' AND passw = '$passw'" );
            $result = $this->db->resultSet();
            return $result;
        }
    }

?>