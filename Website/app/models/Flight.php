<?php
    Class Flight extends Plane{
        
        public function __construct(){
            $this->table = 'vols';
        }

        public function getFlights(){
            return $this->getTable();
        }
    }
?>