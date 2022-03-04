<?php
    require_once ('Plane.php');
    
    Class Flight extends Plane{
        
        public function __construct(){
            parent::__construct();
            $this->table = 'vols';
            // $this->planeModel = new Plane;
        }

        public function getFlights(){
            return $this->getTable();
        }

        // public function getFlight(){

        // }

        public function deleteFlight($planeID){
            $this->db->query("DELETE FROM $this->table WHERE volID = '$planeID'");
            $this->db->execute();
        }

        public function updateFlight($volID, $planeID, $departureDate, $arrivalDate, $availableSeats, $price){
            $this->db->query("UPDATE $this->table SET planeID='$planeID', departureDate='$departureDate', arrivalDate='$arrivalDate', availableSeats='$availableSeats', price='$price' WHERE volID='$volID'");
            $this->db->execute();
        }

        public function addFlight($planeID, $departureDate, $arrivalDate, $availableSeats, $price){
                // echo 'inside addflight in FLight model';
                $this->db->query("INSERT INTO $this->table (planeID, departureDate, arrivalDate, availableSeats, price) VALUES ('$planeID', '$departureDate', '$arrivalDate', '$availableSeats', '$price') ");
                $this->db->execute();
                $id = 'volID';
                return $this->getRecordHighestID($id);
            } 
    
        public function addDeparture($volID, $airportID){
            $this->table = 'departures';
            $this->db->query("INSERT INTO $this->table (volID, airportID) VALUES ('$volID', '$airportID') ");
            $this->db->execute();
            $this->table = 'vols';
            // return $result;
        }

        public function addDestination($volID, $airportID){
            $this->table = 'destinations';
            $this->db->query("INSERT INTO $this->table (volID, airportID) VALUES ('$volID', '$airportID') ");
            $this->db->execute();
            $this->table = 'vols';
            // return $result;
        }
        // public function getNumSeats(){
        //     $this->db->query("INSERT INTO $this->table (volID, airportID) VALUES ('$volID', '$airportID') ");
        //     $record = $this->db->single();
        //     return $record->col;
        // }
        public function getDeparture($volID, $airportID){
            $this->table = 'departures';
            $result = $this->getSpecific($volID, $airportID);
            $this->table = 'vols';
            return $result;
        }

        public function getDestination($volID, $airportID){
            $this->table = 'destinations';
            $result = $this->getSpecific($volID, $airportID);
            $this->table = 'vols';
            return $result;
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