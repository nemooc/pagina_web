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
        $html = "";
        if (isset($respuesta)) {
            session_start();
            $botonCarrito = "Inicie sesion para añadir al carrito";
            // compruebo si tengo un usuario logueado
            if (isset($_SESSION['id_usuario_web'])){
                $botonCarrito = "
                <input type='number' class='form-control' id='cantidad'>
                <button type='button' class='btn btn-info' onClick='agregarAlCarrito(".$respuesta['id_productos'].", \"".$respuesta['nombre']."\", \"".$respuesta['nom_archivo']."\", ".$respuesta['precio_venta'].")'>Añadir al Carrito</button>
                ";
            }

            $html = "
            <div class='col-12 col-lg-4'>
                <div style='height:200px;background-content:center;background-size:cover;background-image: url(../Imagenes_Cocinas/".$respuesta['nom_archivo'].");'> 
                </div>
            </div>
            <div class='col-8 col-lg-8'>
                <h2>".$respuesta['nombre']."</h2>
                <p>".$respuesta['detalles']."</p>
                <h4>$".$respuesta['precio_venta']."</h4>
                <div>
                ".$botonCarrito."
                </div>
            </div>";
        }
        echo json_encode($html);
        break;
}