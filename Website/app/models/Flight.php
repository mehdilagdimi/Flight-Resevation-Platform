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

        public function getDepartures(){
            $this->table = 'departures';
            $result = $this->getTable();
            $this->table = 'vols';
            return $result;
        }

        public function getDestinations(){
            $this->table = 'destinations';
            $result = $this->getTable();
            $this->table = 'vols';
            return $result;
        }
    }
?>