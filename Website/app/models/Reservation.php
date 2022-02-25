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
            $this->db->query("DELETE FROM $this->table WHERE reservID='$reservID'");
            $this->db->execute();
        }

        public function addReserv($volID, $passengerID, $dateReserv, $goingComing, $seatNum){
            $this->db->query("INSERT INTO $this->table VALUES (volID, passengerID, dateReserv, goingComing, seatNum) VALUES ('$volID', '$passengerID', '$dateReserv', '$goingComing', '$seatNum') ");
            $this->db->execute();
        }

        public function updateReserv($volID, $passengerID, $dateReserv, $goingComing, $seatNum){     
            $this->db->query("UPDATE $this->table SET volID = '$reservID', departureDate='$departureDate', arrivalDate='$arrivalDate', availableSeats='$availableSeats', price='$price', [state]='$state' WHERE id='$volID'");
            $this->db->execute();
        } 

    }
    
?>