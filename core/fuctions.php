<?php

function crearCapetasConNombreAlAzar(string $path, $pre){
        
    $carpeta = $pre.rand(10000000000, 99999999999);
    if(is_dir($path.$carpeta)){
        $carpeta = $pre.rand(10000000000, 99999999999);
    }

    if(mkdir($path.$carpeta, 0700)){
        return $carpeta;
    }
}

?>