<?php
    Class Reservation extends Flight{

        public function __construct(){
            $this->table = 'reservs';
        }
        
        public function getReservs(){
            return $this->getTable();
        }
    }

    
?>