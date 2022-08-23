<?php

require '../config/connection.php';

class Usuario
{
    public function __construct()
    {

    }

   
    public static function iniciar_sesion ($usuario,$clave){
        $sql = "SELECT * from usuarios_web where usuario = '$usuario' and clave = '$clave'";
        return ejecutarConsultaSimpleFila($sql);

    }



    public static function enviarDatos ($dni,$nombre,$domicilio,$email,$localidad,$provincia,$telefono,$usuario,$clave){
        // Creamos venta
        $sql = "INSERT INTO clientes (dni,nombre,domicilio,email,localidad,provincia,telefono_celular,estado) values ($dni,'$nombre','$domicilio','$email','$localidad','$provincia','$telefono','ACTIVO')";
        $idCliente = ejecutarConsulta_retornarID($sql);
        $sql = "INSERT INTO usuarios_web (usuario,clave,id_clientes) values ('$usuario','$clave',$idCliente)";
        ejecutarConsulta($sql);
        
        
        return true;

    }

}