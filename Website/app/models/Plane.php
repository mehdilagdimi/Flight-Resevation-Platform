<?php
    Class Plane extends Model{
        public function __construct(){
            $this->table = 'planes';
        }

        public function getPlanes(){
            return $this->getTable();
        }
    }
?>