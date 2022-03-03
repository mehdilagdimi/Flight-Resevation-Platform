<?php
    require_once ('Flight.php');

    Class Reservation extends Flight{

        public function __construct(){
            parent::__construct();
            // $this->table = 'reservs';
            $this->table = 'reservations';
        }
        
        public function getReservs(){
            // return $this->getTable();
            $id = 'reservID';
            return $this->getTableOrder($id);
        }

        public function deleteReserv($reservID){
            $this->db->query("DELETE FROM $this->table WHERE reservID='$reservID'");
            $this->db->execute();
        }

        public function addReservation($volID, $passengerID, $goingComing, $seatNum){
            // echo $this->table;
            $this->db->query("INSERT INTO $this->table (passengerID, goingComing, seatNum) VALUES ('$passengerID','$goingComing', '$seatNum') ");
            $this->db->execute();
        }

        public function updateReserv($reservID, $volID, $passengerID, $goingComing, $seatNum){     
            $this->db->query("UPDATE $this->table SET passengerID ='$passengerID', goingComing='$goingComing', seatNum='$seatNum' WHERE reservID='$reservID'");
            $this->db->execute();
        } 

    }
    
?>