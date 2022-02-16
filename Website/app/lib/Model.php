<?php
    class Model {
        protected $db;
        protected $table;
        private $query;
        
        public function __construct(){
            $this->db = new Database;
        }

        public function getTable(){
            $query = 'SELECT * FROM' . $table . " ' "; 
            $this->db->query($query);
            $result = $this->db->resultSet();
            return $result;
        }
    }
?>