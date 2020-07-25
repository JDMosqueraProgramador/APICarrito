<?php 

header('Access-Control-Allow-Origin: http://localhost:4200');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-type: application/json; charset=utf-8");

require '../core/tallas.php';

$tallas = new Tallas;

$tallasSe = $tallas->selectTallas();

$tallasJson = $tallasSe->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($tallasJson);

?>