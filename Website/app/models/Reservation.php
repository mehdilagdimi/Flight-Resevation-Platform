<?php
    require_once ('Flight.php');

    Class Reservation extends Flight{

        public function __construct(){
            parent::__construct();
            $this->table = 'reservs';
        }
        
        public function getReservs(){
            return $this->getTable();
        }

        public function deleteReserv($reservID){
            $this->db->query("DELETE FROM reservs WHERE id='$reservID'");
            $this->db->execute();
        }
    }

    
?>