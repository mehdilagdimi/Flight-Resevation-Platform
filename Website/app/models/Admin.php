<?php
    Class Admin extends User{
        public function __construct(){
            $this->table = 'admins';
        }

        public function getAdmins(){
            return $this->getTable();
        }
        
        //add parameters for specific querying
        public function getAdmin(){

        }


?>