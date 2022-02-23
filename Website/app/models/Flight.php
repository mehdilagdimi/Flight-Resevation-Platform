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

        // public function getFlight(){

        // }

        public function deleteFlight($planeID){
            $this->db->query("DELETE FROM vols WHERE id='$planeID'");
            $this->db->execute();
        }

        public function updateFlight($volID, $planeID, $departureDate, $arrivalDate, $availableSeats, $price, $state){
            $this->db->query("UPDATE vols SET planeID = '$planeID', departureDate='$departureDate', arrivalDate='$arrivalDate', availableSeats='$availableSeats', price='$price', [state]='$state' WHERE id='$volID'");
            $this->db->execute();
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