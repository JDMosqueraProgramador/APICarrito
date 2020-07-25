<?php

require "connect.php";

class Tallas extends Conexion{
    
    public function selectTallas(){
        $conn = parent::conn();
        try {
            $query = $conn->query("SELECT * FROM tallas");
            return $query;
        } catch (PDOException $e) {
            return json_encode(["ERROR" => $e->getMessage()]);
        }
    }
}

?>