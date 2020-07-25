<?php

header('Access-Control-Allow-Origin: http://localhost:4200');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-type: application/json; charset=utf-8");

$dataPost =file_get_contents('php://input');
$dataPost = json_decode($dataPost);

if(isset($dataPost->correo) && isset($dataPost->contra)){
    
    $correo = $dataPost->correo;
    $password = $dataPost->contra;

    require "../core/usuarios.php";

    $usuarios = new Usuarios();

    $consulta = $usuarios->iniciarSesion($correo, $password);

    if($consulta->rowCount() > 0){
        $usuario = $consulta->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(["Login" => $usuario]);
    }else{
        echo json_encode(["Login" => null]);
    }

}



?>