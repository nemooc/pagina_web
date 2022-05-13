<?php
header("Content-type: image/jpeg");
require '../config/connection.php';

class Producto
{
    public function __construct()
    {

    }

    public static function traerProductos ()
    {
    $sql = "SELECT p.*,CAST(i.foto AS CHAR(10000) CHARACTER SET utf8) as foto from productos as p LEFT JOIN imagenes as i ON p.id_imagen = i.id;";
    return ejecutarConsulta($sql);

    
    }

    public static function traer_Categorias ()
    {
    $sql = "SELECT categoria FROM productos GROUP BY categoria";
    return ejecutarConsulta($sql);
   
    }


}