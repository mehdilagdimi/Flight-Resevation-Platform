<?php
    class Airport extends Model{
        public function __construct(){
            parent::__construct();
            $this->table = 'airports';
        }

        public function getAirports(){
            return $this->getTable();
        }
    }
?>