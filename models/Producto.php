<?php
require '../config/connection.php';

class Producto
{
    public function __construct()
    {
    }
    public static function traerProductos ()
    {
    $sql = "SELECT * FROM productos";
    return ejecutarConsulta($sql);
    
    }
   
}