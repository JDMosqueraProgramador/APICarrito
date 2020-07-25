<?php 

require 'connect.php';

class Consultas extends Conexion{

    protected $query;

    public function Select($columnas, $tabla, $where){
        $con = parent::conn();
        try {
            $this->query = "SELECT ${columnas} FROM ${tabla}";

            if(!empty($where)){
                $this->query = $this->query + $where;
            }

            return $con->query($this->query);
        } catch (Exception $e) {
            return ["Error" => "ERROR: " . $e->getMessage()];
        }
    }
}
