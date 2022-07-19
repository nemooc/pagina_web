<?php

require '../config/connection.php';

class Ventas
{
    public function __construct()
    {

    }

   
    public static function terminarCompra ($total_venta, $id_producto, $nombre, $precio, $cantidad, $subtotal){
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $dni = $_SESSION['dni_clientes'];
        $fecha = date('Y-m-d');
        // Creamos venta
        $sql = "INSERT INTO ventas (total_venta, dni, fecha, tipo_venta, tipo_de_factura, estado,estado_seguimiento) values ($total_venta,$dni,'$fecha','WEB','B','PENDIENTE','-')";
        $idVenta = ejecutarConsulta_retornarID($sql);

        
        //crear detalles
        $i=0;
        while ($i < count($id_producto)) {
            $sql="INSERT INTO detalles_ventas (codigo, nombre, precio_venta, cantidad, subtotal, numero_venta) VALUES ('$id_producto[$i]', '$nombre[$i]', '$precio[$i]','$cantidad[$i]', '$subtotal[$i]', '$idVenta')";
            ejecutarConsulta($sql);
            $sql ="UPDATE productos set stock_actual = stock_actual - $cantidad[$i]  WHERE (id_productos = '$id_producto[$i]')";
            ejecutarConsulta($sql);
            $i++;
        }

        // si todo se ejecuta correctamente, retorna true
        return true;

    }

    public static function mostrarMisPedidos (){
        $dni = $_SESSION['dni_clientes'];
        $sql = "SELECT * from ventas  where dni = $dni and tipo_venta = 'WEB' order by numero_venta desc";
      return ejecutarConsulta($sql);
        
        }

        public static function mostrarDetallesCompra ($id){
            
            $sql = "SELECT * FROM detalles_ventas WHERE numero_venta = $id";
            return ejecutarConsulta($sql);
          
            }
        
    
            
}