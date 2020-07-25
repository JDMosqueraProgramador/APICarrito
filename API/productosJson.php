<?php 

header('Access-Control-Allow-Origin: http://localhost:4200');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-type: application/json; charset=utf-8");

require '../core/productos.php';

$productos = new Productos();

switch($_SERVER["REQUEST_METHOD"]){

    case 'GET':
        $productosList = $productos->selectProductos();

        $products = [];
    
        foreach($productosList->fetchAll(PDO::FETCH_ASSOC) as $producto){
            // echo $producto['id'];
            $producto['tallas'] = $productos->tallas($producto['id']);
    
            $products[] = $producto;
        }
    
        echo json_encode($products);
    break;

    case 'POST':
        
        $producto = file_get_contents("php://input");
        $producto = json_decode($producto);

        if(isset($producto->nombre) && isset($producto->precio)){

        }
    break;

}









// echo json_encode($productosList->fetchAll(PDO::FETCH_ASSOC));

?>