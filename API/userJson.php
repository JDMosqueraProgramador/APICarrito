<?php 

header('Access-Control-Allow-Origin: http://localhost:4200');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-type: application/json; charset=utf-8");

require '../core/usuarios.php';

$users = new Usuarios;
$us = $users->selectUsuarios()->fetchAll(PDO::FETCH_ASSOC);

// $us = ["dfsd" => ["dsd", "dfd"], "sef" => "fsdf"];

// foreach($us as $u){
//     echo $u["id"];
//     echo $u["nombre"];
//     echo $u["apellidos"];
//     echo $u["correo"];
//     echo $u["password"];
//     echo $u["administrador"];
// }

$us = filter_var_array($us, FILTER_SANITIZE_STRING);
$e = json_encode($us);

// echo $us[0]['nombre'];
echo ($e);

?>