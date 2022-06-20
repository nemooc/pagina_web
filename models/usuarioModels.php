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



    
}