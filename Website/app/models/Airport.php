<?php
    class Airport extends Model{
        public function __construct(){
            parent::__construct();
            $this->table = 'airports';
        }

        public function getAirports(){
            return $this->getTable();
        }

        public function deleteAirport($airportID){
            $this->db->query("DELETE FROM $this->table WHERE airportID='$airportID'");
            $this->db->execute();
         }
    }
    
?>