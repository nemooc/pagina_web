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

    public static function traer_Categorias ()
    {
    $sql = "SELECT categoria FROM productos GROUP BY categoria";
    return ejecutarConsulta($sql);
   
    }