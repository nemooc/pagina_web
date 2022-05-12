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
              
            );
        }
        echo json_encode($data);
    break;
    

}