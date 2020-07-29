<?php 

header('Access-Control-Allow-Origin: http://localhost:4200');
// header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
// header("Content-type: application/json; charset=utf-8");

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
        require '../core/fuctions.php';
        $producto = file_get_contents("php://input");
        $producto = json_decode($producto);

        if(count($_FILES) > 0){
            $pathsFotos = [];

            $capeta = crearCapetasConNombreAlAzar("C:/Users/Mosquera/Desktop/Proyects/carritoDeCompras/src/assets/img/productos/", "P");
            foreach($_FILES as $i => $img){

                $name = "{$i}product.png";
                
                $nuevaUbicacion = "C:/Users/Mosquera/Desktop/Proyects/carritoDeCompras/src/assets/img/productos/$capeta/$name";


                if(move_uploaded_file($img["tmp_name"], $nuevaUbicacion)){
                    $pathsFotos[] = $nuevaUbicacion;
                }else{
                    $pathsFotos[] = "False";
                }
            }
            echo json_encode($pathsFotos);
            // $productos->agregarProductos();
        }else{
            echo json_encode($_FILES);
        }
    break;

}

// echo json_encode($productosList->fetchAll(PDO::FETCH_ASSOC));

?>