<?php

require 'connect.php';

class Productos extends Conexion{
    
    public function selectProductos(){
        $conn = parent::conn();
        try {
            $query = $conn->query("SELECT * FROM productos");
            return $query;
        } catch (Exception $e) {
            return json_encode(["ERROR" => $e->getMessage()]);
        }
    }

    public function tallas($id){
        $conn = parent::conn();
        try{
            $tallas = [];
            $query = $conn->prepare("SELECT id_talla FROM tallas_productos WHERE id_producto=:id");
            $query->execute([":id" => $id]);
            if($query->rowCount() > 0){
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $tallaID){
                    $query = $conn->query("SELECT * FROM tallas WHERE id={$tallaID['id_talla']}");
                    foreach($query->fetchAll(PDO::FETCH_ASSOC) as $talla){
                        $tallas[] = $talla;
                    }
                }
            }

            return $tallas;

        }catch(PDOException $e){
            return json_encode(["ERROR: " => $e->getMessage()]);
        }
    }

}

?>