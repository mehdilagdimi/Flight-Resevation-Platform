<?php
    Class Plane extends Model{
        public function __construct(){
            parent::__construct();
            $this->table = 'planes';
        }

        public function getPlanes(){
            return $this->getTable();
        }

        public function deletePlane($planeID){
            $this->db->query("DELETE FROM $this->table WHERE planeID='$planeID'");
            $this->db->execute();
         }
    }
?>
