<?php
    require_once ('Plane.php');
    
    Class Flight extends Plane{
        
        public function __construct(){
            parent::__construct();
            $this->table = 'vols';
        }

        public function getFlights(){
            return $this->getTable();
        }
    }
?>