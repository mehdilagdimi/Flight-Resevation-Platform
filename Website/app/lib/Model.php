<?php
    class Model {
        protected $db;
        protected $table = "";
        // private $query;
        
        public function __construct(){
            $this->db = new Database;
        }

        public function getTable(){
            // $query = "SELECT * FROM " . $table; 
            $this->db->query("SELECT * FROM " . $this->table);
            // $this->db->query("SELECT * FROM vols");
            $result = $this->db->resultSet();
            return $result;
        }

        public function getSpecific($col, $constraint){
            $this->db->query("SELECT * FROM $this->table WHERE $col = '$constraint'");
            $result = $this->db->resultSet();
            return $result;
        }

        public function getRecordHighestID($id){
            $this->db->query("SELECT * FROM $this->table WHERE $id = (SELECT max($id) FROM $this->table)");
            $record = $this->db->single();
            $maxID = $record->$id;
            return $maxID;
        }

        // public function addRecord($constraints_arr){
        //     $this->db->query("INSERT INTO ")
        // }
        
        // public function getSpecificRows(){
        //     $this->db->query("SELECT * FROM " . $this->table . " WHERE " . $c_1 . " = ");
        // }
        //get row with multuple constraints
        // public function getRow(...$constraints){
        //     // $len = count($constraints);
        //     $constraints_sql = "";
        //     foreach($constraints as $c){
        //         $constraints_sql +=  
        //     }
        //     $this->db->query("SELECT * FROM " . $this->table . "WHERE " . $constraints[] );
        //     $result = $this->db->resultSet();
        //     return $result;
        // }

    }
?>