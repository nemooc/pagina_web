<?php

require '../models/productoModels.php';



switch ($_GET['op']) {

    case "traerProductos":
        $categoria = $_GET['categoria'];
        $respuesta = Producto::traerProductos($categoria);
        $data = array();

        while ($reg = $respuesta->fetch_object()){

            $data[] = array( 
                "id_productos" => $reg->id_productos,
                "nombre" => $reg->nombre,   
                "precio_venta" => $reg->precio_venta,
                "nom_archivo" => $reg->nom_archivo,
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
    case 'traerProducto':
        $id = $_GET['id'];
        $respuesta = Producto::traer_Producto($id);
        echo json_encode($respuesta);
        break;
}