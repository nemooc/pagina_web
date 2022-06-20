<?php
require '../config/connection.php';

class Producto
{
    public function __construct()
    {

    }

    public static function traerProductos ($categoria)
    {
        $sql = "SELECT p.id_productos,p.nombre,p.precio_venta,i.nom_archivo from productos p LEFT JOIN imagenes i on p.id_imagen = i.id;";
        if ($categoria != "TODOS") {
            $sql = "SELECT p.id_productos,p.nombre,p.precio_venta,i.nom_archivo from productos p LEFT JOIN imagenes i on p.id_imagen = i.id
            where p.categoria = '$categoria'";
        }
        
        return ejecutarConsulta($sql);

    
    }

    public static function traer_Categorias ()
    {
    $sql = "SELECT categoria FROM productos GROUP BY categoria";
    return ejecutarConsulta($sql);
   
    }

    public static function traer_Producto ($id){
    $sql = "SELECT p.id_productos,p.nombre,p.precio_venta,i.nom_archivo,p.detalles from productos p LEFT JOIN imagenes i on p.id_imagen = i.id
    where p.id_productos = '$id'";
    return ejecutarConsultaSimpleFila($sql);

    }
    
}