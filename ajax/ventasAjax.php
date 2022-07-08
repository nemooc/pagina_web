<?php
session_start();
require '../models/VentasModels.php';



switch ($_GET['op']) {
    case 'terminarCompra':
        // Datos simples
        $totalVenta = isset($_POST['total_venta']) ? limpiarCadena($_POST['total_venta']) : "";

        // Arrays
        $id_producto = isset($_POST['id_producto']) ? $_POST['id_producto'] : "";
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
        $precio = isset($_POST['precio']) ? $_POST['precio'] : "";
        $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : "";
        $subtotal = isset($_POST['subtotal']) ? $_POST['subtotal'] : "";

 
        $respuesta = Ventas::terminarCompra($totalVenta, $id_producto, $nombre, $precio, $cantidad, $subtotal);
        
        echo json_encode([
            'message' => $respuesta ? "¡Compra generada con exito, nos comunicaremos con usted para que pueda realizar el pago!" : "¡Ocurrió un problema y no se pudo generar la compra!",
            'status' => $respuesta ? true : false
        ]);
    break;



}