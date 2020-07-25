<?php 


require 'consultas.php';

class Usuarios extends Consultas{
    
    public function selectUsuarios(){
        $conn = parent::conn();
        try{
            $query = $conn->query("SELECT * FROM usuarios");
            return $query;
        }catch(PDOException $e){
            exit("ERROR: " . $e->getMessage());
        }
    }

    public function iniciarSesion($correo, $password){
        $conn = parent::conn();
        try {
            $query = $conn->prepare("SELECT * FROM usuarios WHERE correo=:correo and password=:password");
            $query->execute([
                ":correo" => $correo,
                ":password" => $password
            ]);

            return $query;
        } catch (Exception $e) {
            return json_encode(["ERROR" => $e->getMessage()]);
        }
    }
}


// foreach($us->fetchAll(PDO::FETCH_ASSOC) as $user){

//     echo $user['nombre'];
// }



?>