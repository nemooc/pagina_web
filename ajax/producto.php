<?php

require '../models/Producto.php';







switch ($_GET['op']) {

    case "traerProductos":
        $respuesta = Producto::traerProductos();
        $data = array();

        while ($reg = $respuesta->fetch_object()){

            $data[] = array( 
                "id_produ" => $reg->id_productos,
                "nombre" => $reg->nombre,   
                "precio_venta" => $reg->precio_venta,
                "foto"=> $reg->foto,
            );
        }
        echo json_encode($data);
    break;
    
    case "traerCategoria":
        $respuesta = Producto::traer_Categorias();
        $data = array();
        while ($reg = $respuesta->fetch_object()){

            $data[] = array(
                "categoria" => $reg->categoria,
            );
        }
        echo json_encode($data);
    break;

}