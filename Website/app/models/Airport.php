<?php
    class Airport extends Model{
        public function __construct(){
            parent::__construct();
            $this->table = 'airports';
        }

        

        public function getAirports(){
            return $this->getTable();
        }

        public function getAirportID($airport){
            $this->db->query("SELECT * FROM $this->table WHERE airportAdress='$airport'");
            // $this->db->query("SELECT airportID FROM $this->table WHERE airportAdress='$airport'");
            // $id = $this->db->single();
            //return $id;
            $record = $this->db->single();
            return $record->airportID;
         }

        public function deleteAirport($airportID){
            $this->db->query("DELETE FROM $this->table WHERE airportID='$airportID'");
            $this->db->execute();
         }
        
         
    }
    
?>