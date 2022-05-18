<?php
header("Content-type: image/jpeg");
require '../config/connection.php';

class Producto
{
    public function __construct()
    {

    }

    public static function traerProductos ($categoria)
    {
        $sql = "SELECT * from productos";
        if ($categoria != "TODOS") {
            $sql = "SELECT * from productos where categoria = '$categoria' ";
        }
        
        return ejecutarConsulta($sql);

    
    }

    public static function traer_Categorias ()
    {
    $sql = "SELECT categoria FROM productos GROUP BY categoria";
    return ejecutarConsulta($sql);
   
    }


}